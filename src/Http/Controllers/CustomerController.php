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


    public function show(Customer $customer){


        return view('customers::show',[
           'customer'=> $customer,
            'total'=>$customer->orders()->count(),
            'latest'=>$customer->orders()->latest()->first()
        ]);
    }

    public function update(Request $request ,Customer $customer){


        $request->validate([
            "address" => "required",
            "address2" => "required",
            "city" => "required",
            "county" => "required",
            "country" => "required",
            "postal-code" => "required",
        ]);


        return view('customers::show',[
            'customer'=> $customer,
            'total'=>$customer->orders()->count(),
            'latest'=>$customer->orders()->latest()->first()
        ]);
    }



}
