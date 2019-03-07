<?php

namespace App\Http\Controllers\Admincp;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Exception;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\services\SharingService;

class CitiesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

       
        $countries = [];
        $cities = [];
        $access_token = app('shared')->get('access_token');
        $url = app('shared')->get('base_url').'/setting/countries/';
        $cities_url = app('shared')->get('base_url').'/setting/cities/';
        $client = new Client(['headers' => ['Authorization' => $access_token]]);
        try {
            $response = $client->request('GET', $url );
            
                $response_body = json_decode($response->getBody());
                $countries = $response_body ? $response_body->response : [];
                $r = 0;

                $cities_response = $client->request('GET', $cities_url );
                $cities_response_body = json_decode($cities_response->getBody());
                $cities = $cities_response_body ? $cities_response_body->response : [];

            }
            //catch (Guzzle\Http\Exception\ClientErrorResponseException $e) {
            catch(GuzzleException $e){
                $req = $e->getRequest();
                $response =$e->getResponse();
                //dd($e);
               // $r = json_decode($response->getStatusCode());

            }
            
            // if($r != 0){
            //     dd($r);
            // }
        return view('admin.cities.index',compact('countries','access_token','cities'));
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
