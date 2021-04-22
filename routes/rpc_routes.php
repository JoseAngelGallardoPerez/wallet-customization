<?php
/** @var \Laravel\Lumen\Routing\Router $router */
$router->post('/{any:.*}', ['uses' => 'Rpc@index']);
