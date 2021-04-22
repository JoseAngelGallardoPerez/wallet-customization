<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Responses\Json as ResponsesJson;
use Velmie\Wallet\Permissions\PermissionCheckerClient;
use Velmie\Wallet\Users\UserHandlerClient;
use Illuminate\Http\Request;
use App\Errors\ApiClientBadRequest;
use App\Errors\ApiClientForbidden;

class Authenticate
{
    protected $permission = 'view_settings';
    protected $permissionsClient = '';
    protected $usersClient = '';
    static $loginUserID;

    public function __construct()
    {
        /* from discovery service */
        //$discoveryPath = __DIR__ . './../../../discovery';
        //$rpcPermission = `$discoveryPath permissions`;
        //$rpcUser = `$discoveryPath users`;

        $rpcPermission = env('SERVICE_PERMISSIONS');
        $rpcUser = env('SERVICE_USERS');

        $this->permissionsClient = new PermissionCheckerClient($rpcPermission);
        $this->usersClient = new UserHandlerClient($rpcUser);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try{
            $token = $request->header('Authorization');

            if($token){
                $requestRpc = new \Velmie\Wallet\Users\Request();
                $requestRpc->setAccessToken(str_replace('Bearer ', '', $token));

                $response = $this->usersClient->ValidateAccessToken([], $requestRpc);
                if($response->getUser()){
                    $userId = $response->getUser()->getUID();

                    self::$loginUserID = $userId;

                    if(empty($this->permission)) {
                        return $next($request);
                    }

                    $requestRpc = new \Velmie\Wallet\Permissions\PermissionReq();
                    $requestRpc->setUserId($userId);
                    $requestRpc->setActionKey($this->permission);
                    $response = $this->permissionsClient->Check([], $requestRpc);

                    if($response->getIsAllowed()){
                        return $next($request);
                    } else {
                        return ResponsesJson::error(new ApiClientBadRequest('No permission'));
                    }
                }
            }
            return ResponsesJson::error(new ApiClientBadRequest('No authorized'));

        } catch (\Velmie\Wallet\Permissions\TwirpError $e){
            return ResponsesJson::error(new ApiClientForbidden($e->getMessage()));
        } catch (\Velmie\Wallet\Users\TwirpError $e){
            return ResponsesJson::error(new ApiClientForbidden($e->getMessage()));
        } catch (\Throwable $e) {
            return ResponsesJson::error(new ApiClientBadRequest($e->getMessage()));
        }
    }

    /**
     * @return mixed
     */
    public static function getLoginUserId()
    {
        return static::$loginUserID;
    }
}
