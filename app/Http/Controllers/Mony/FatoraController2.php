<?php

namespace App\Http\Controllers\Mony;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Checkout\CheckoutApiException;
use Checkout\CheckoutAuthorizationException;
use Checkout\CheckoutSdk;
use Checkout\Environment;
use Checkout\OAuthScope;

class FatoraController2 extends Controller
{

//For more information please refer to https://github.com/checkout/checkout-sdk-php



//API Keys
public function payorder(){
    $api = CheckoutSdk::builder()->staticKeys()
    ->environment(Environment::sandbox())
    ->secretKey("secret_key")
    ->build();

    //OAuth
    $api = CheckoutSdk::builder()->oAuth()
        ->clientCredentials("client_id", "client_secret")
        ->scopes([OAuthScope::$Flow])
        ->environment(Environment::sandbox())
        ->build();


    try {
        $response = $api->getWorkflowsClient()->getWorkflows();
    } catch (CheckoutApiException $e) {
        // API error
        $error_details = $e->error_details;
        $http_status_code = isset($e->http_metadata) ? $e->http_metadata->getStatusCode() : null;
    } catch (CheckoutAuthorizationException $e) {
        // Bad Invalid authorization
    }
}
}
