<?php

namespace App\Http\Controllers\Admincp;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Exception;
use Illuminate\Support\Facades\Cookie;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\services\SharingService;

class CurrenciesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = [];
        $r = 0;
       // $access_token = app('shared')->get('access_token');
        $access_token = Cookie::get('access_token');
        $currencies_url = app('shared')->get('base_url').'/setting/currencies/';
        $client = new Client(['headers' => ['Authorization' => $access_token]]);
        try {
                
                $currencies_response = $client->request('GET', $currencies_url );
                $currencies_response_body = json_decode($currencies_response->getBody());
                $currencies = $currencies_response_body ? $currencies_response_body->response : [];
                //dd($currencies_response_body);

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
           // dd($currencies_url);

        return view('admin.currencies.index',compact('access_token','currencies','currencies_url'));
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
