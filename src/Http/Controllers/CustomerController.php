<?php

namespace Apydevs\Customers\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Apydevs\Customers\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{


    public function index(){

        $cusotmers = Customer::query();
        return view('customers::index',[
            'count'=>$cusotmers->count(),
        ]);
    }


}
