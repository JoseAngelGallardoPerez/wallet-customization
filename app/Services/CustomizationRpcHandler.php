<?php

namespace App\Services;

use App\Models\Customization;
use Velmie\Wallet\Customization\Request;
use Velmie\Wallet\Customization\Response;
use Velmie\Wallet\Customization\Error;
use Velmie\Wallet\Customization\Customization as PbCustomization;
use Velmie\Wallet\Customization\CustomizationHandler;

/**
 * Class RpcHandler
 * @package App\Services
 */
class CustomizationRpcHandler implements CustomizationHandler
{
    /**
     * @param array $ctx
     * @param Request $request
     * @return Response
     */
    public function GetByKey(array $ctx, Request $request): Response
    {
        $response = new Response();
        try {
            $item = Customization::findOrFailByKey($request->getKey());
        } catch (\Exception $e) {
            $error = new Error();
            $error->setTitle($e->getMessage());
            return $response->setError($error);
        }

        $customization = new PbCustomization();
        $customization->setId($item->id)
            ->setKey($item->key)
            ->setLabel($item->label)
            ->setValue($item->value);
        return $response->setCustomization($customization);
    }
}
