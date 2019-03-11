<?php

namespace App\Http\Controllers\Admincp;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class PaymentMethodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get access token from cookie
        $access_token = Cookie::get('access_token');
        // get base url from app service provider
        $url = app('shared')->get('base_url').'/managment/payment-methods/';

        $client = new Client(['headers' => ['Authorization' => $access_token]]);
        $response = $client->request('GET', $url );
        $response_body = json_decode($response->getBody());

        // $methods = [];

        // for ($i = 1; $i < 810; $i++) {
        //     $methods = array_merge($methods, $response_body->response);
        // }
        
        $methods = $response_body ? $response_body->response : [];
        return view('admin.payment-methods.index', compact('methods', 'access_token'));
    }

}
