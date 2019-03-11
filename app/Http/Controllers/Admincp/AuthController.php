<?php

namespace App\Http\Controllers\Admincp;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Validator;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    /**
     * Show the form for login.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        if(isset($_COOKIE['access_token'])){
            return redirect('/admincp/positions');
        } else
            return view('admin.auth.login');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Cookie::queue($name, $value, $minutes);
        // $value = Cookie::get('name');
        $hour = time() + 3600 * 24 * 30;
        Cookie::queue('access_token', 'bearer '.$request->access_token, $hour);
        $value = Cookie::get('access_token');
        return response()->json($value);
    }

    //  /**
    //  * Log the user out (Invalidate the token)
    //  *
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function logout()
    // {
    //     Cookie::forget('access_token');
    //     $this->guard()->logout();
    //     return $this->sendJson(null);
    // }

    public function logout()
    {
        Cookie::forget('myCookie');
    }

}
