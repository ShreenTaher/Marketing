<?php

namespace App\Http\Controllers\Admincp;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Validator;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){

        $url = app('shared')->get('base_url').'/auth/login/';

        //$client = new Client(['headers' => ['Authorization' => $this->token]]);
        $client = new Client();
        try {
        
            $response = $client->post($url, [
              'form_params' => [
                  'email' => $cat,
                  'password' =>''
              ]
              
            ]); 
                //dd($response->getBody());
                $response_body = json_decode($response->getBody());
                $token = $response_body ? $response_body->response : '';
                $access_token = 'bearer '.$token;
                $sharingService->share('access_token', $access_token);
                dd($access_token);
                $r = 0;

            }
            //catch (Guzzle\Http\Exception\ClientErrorResponseException $e) {
            catch(GuzzleException $e){
                $req = $e->getRequest();
                $response =$e->getResponse();
                $r = json_decode($response->getStatusCode());

            }
            
            if($r != 0){
                dd($r);
            }

        return view('admin.countries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountriesRequest $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
