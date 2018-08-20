<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    private static $LOGIN_ACTION = 'LOGIN_ACTION';
    private static $REGISTER_ACTION = 'REGISTER_ACTION';
    private static $RECOVER_ACTION = 'RECOVER_ACTION';


    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * All requests will come here. and we will figure out where to hit
     *
     * @return \Illuminate\Http\Response
     */
    public function index($action)
    {
        // /auth/:action
        switch ($action){

            //here we can call the right method based on the param

        }
    }

    //Both login and register has a type:
    //can be phone, social, email or password
    // we delegate to the right command that is responsible
    public function login(){
    }

    public function register(){}




}
