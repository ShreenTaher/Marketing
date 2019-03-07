<?php

namespace App\Http\Controllers\Admincp;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PositionsController extends Controller
{
    public $token;

    public function __construct(){
        $this->token = 'bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6OTAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU1MTg1OTUwNywiZXhwIjoxNTUxOTQ1OTA3LCJuYmYiOjE1NTE4NTk1MDcsImp0aSI6Ik1QSWJQWXk1eU9rSlNUS0IiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEiLCJpZCI6MSwibmFtZSI6bnVsbCwiZW1haWwiOiJhZG1pbkBzaGFyaW5nZ3JvdXAuY28iLCJyb2xlcyI6WyJhZG1pbiJdLCJwZXJtaXNzaW9ucyI6W3siaWQiOjEsIm5hbWUiOiJ1c2VyX3VzZXJfY3JlYXRlIiwiZ3VhcmRfbmFtZSI6ImFwaSJ9LHsiaWQiOjIsIm5hbWUiOiJ1c2VyX3VzZXJfZWRpdCIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjozLCJuYW1lIjoidXNlcl91c2VyX2RlbGV0ZSIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjo0LCJuYW1lIjoidXNlcl9yb2xlX2NyZWF0ZSIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjo1LCJuYW1lIjoidXNlcl9yb2xlX2VkaXQiLCJndWFyZF9uYW1lIjoiYXBpIn0seyJpZCI6NiwibmFtZSI6InVzZXJfcm9sZV9kZWxldGUiLCJndWFyZF9uYW1lIjoiYXBpIn1dLCJicmFuY2hlcyI6W119.cY_5wjlYHPqlTj0lnBvfCAKAPJVTiqGM-2l65wh6AXE';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = [];
        $client = new Client(['headers' => ['Authorization' => $this->token]]);
        $response = $client->request('GET','http://localhost:9000/api/position/');
        $response_body = json_decode($response->getBody());
        $positions = $response_body ? $response_body->response : [];
        return view('admin.positions.index', compact('positions'));
    }
}
