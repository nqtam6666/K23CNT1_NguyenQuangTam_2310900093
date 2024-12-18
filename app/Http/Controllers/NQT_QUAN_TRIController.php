<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NQT_QUAN_TRIController extends Controller
{
    //get: login (auth)

    public function nqtlogin(){
        return view("nqtLogin.nqt-login");
    }
    //post: login (auth) 
    public function nqtloginSubmit(){
        return view("nqtLogin.nqt-login");
    }
}
