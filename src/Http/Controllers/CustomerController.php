<?php

namespace Apydevs\Customers\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{


    public function index(){

        return view('customers::index');
    }


}
