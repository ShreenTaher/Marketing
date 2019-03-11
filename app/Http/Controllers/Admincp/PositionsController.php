<?php

namespace App\Http\Controllers\Admincp;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class PositionsController extends Controller
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
        $url = app('shared')->get('base_url').'/position/';
        
        $client = new Client(['headers' => ['Authorization' => $access_token]]);
        $response = $client->request('GET', $url );
        $response_body = json_decode($response->getBody());
        $positions = $response_body ? $response_body->response : [];
        return view('admin.positions.index', compact('positions', 'access_token'));
    }
}
