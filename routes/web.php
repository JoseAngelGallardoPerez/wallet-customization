<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get("/customization/health-check", function(){
    return \App\Http\Responses\Json::ok();
});

$router->group(['prefix' => 'customization/private/v1', 'middleware' => [\App\Http\Middleware\Authenticate::class]], function () use ($router) {
    $router->put('gdpr', 'GdprController@update');
    $router->put('site-texts', 'SiteTextsController@update');

    $router->post('color-schemes', 'ColorSchemesController@create');
    $router->get('color-schemes', 'ColorSchemesController@getAll');
    $router->get('color-schemes/{id:[0-9]+}', 'ColorSchemesController@get');
    $router->put('color-schemes/{id:[0-9]+}', 'ColorSchemesController@update');
    $router->put('color-schemes/set-as-active/{id:[0-9]+}', 'ColorSchemesController@setActive');
    $router->delete('color-schemes/{id:[0-9]+}', 'ColorSchemesController@delete');

    $router->post('logo', 'ImagesController@uploadLogo');
    $router->post('favicon', 'ImagesController@uploadFavicon');
    $router->put('logo-settings', 'ImagesController@saveLogoSettings');
});

$router->group(['prefix' => 'customization/public/v1'], function () use ($router) {
    $router->get('gdpr', 'GdprController@get');
    $router->get('site-texts', 'SiteTextsController@get');
    $router->get('color-schemes/get-active', 'ColorSchemesController@getActive');
    $router->get('logo-settings', 'ImagesController@logoSettings');
});

$router->get('customization/assets/{path:[0-9A-Za-z./]+}', 'ImagesController@getImage');
