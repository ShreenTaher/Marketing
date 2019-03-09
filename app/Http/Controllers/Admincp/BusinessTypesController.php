<?php

namespace App\Http\Controllers\Admincp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class BusinessTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get access token from app service provider
        $access_token = app('shared')->get('access_token');
        // get base url from app service provider
        $url = app('shared')->get('base_url').'/managment/business-types/';
        
        $client = new Client(['headers' => ['Authorization' => $access_token]]);
        $response = $client->request('GET', $url );
        $response_body = json_decode($response->getBody());
        $business_types = $response_body ? $response_body->response : [];
        return view('admin.business-types.index', compact('business_types', 'access_token'));
    }

}
