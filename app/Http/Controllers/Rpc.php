<?php

namespace App\Http\Controllers;

use App\Services\CustomizationRpcHandler;
use Laravel\Lumen\Routing\Controller as BaseController;
use Velmie\Wallet\Customization\CustomizationHandlerServer;
use Psr\Http\Message\ServerRequestInterface;

class Rpc extends BaseController
{
    protected $request;
    protected $rpcServer;

    function __construct(ServerRequestInterface $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $server = new \Twirp\Server();
        $handler = new CustomizationHandlerServer(new CustomizationRpcHandler());
        $server->registerServer(CustomizationHandlerServer::PATH_PREFIX, $handler);
        $response = $server->handle($this->request);
        if (!headers_sent()) {
            header(sprintf('HTTP/%s %s %s', $response->getProtocolVersion(), $response->getStatusCode(), $response->getReasonPhrase()), true, $response->getStatusCode());
            foreach ($response->getHeaders() as $header => $values) {
                foreach ($values as $value) {
                    header($header.': '.$value, false, $response->getStatusCode());
                }
            }
        }
        echo $response->getBody();
        exit;
    }
}
