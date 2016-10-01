<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */

$app->get('/', function (Illuminate\Http\Request $request) use ($app) {
    $headers = $request->header();
    preg_match("/\(([^\)]*)\)/", $headers['user-agent'][0], $software);

    return [
        'ipaddress' => $request->ip(),
        'language'  => explode(',', $headers['accept-language'][0])[0],
        'software'  => $software[1],
    ];
});
