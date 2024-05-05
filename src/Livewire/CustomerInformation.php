<?php

namespace Apydevs\Customers\Livewire;

use Apydevs\Customers\Models\Customer;
use Livewire\Component;

class CustomerInformation extends Component
{

    public $customer;
    public $tabCustomerSelected = 1;
    public  $tabCustomerOrdersSelected = 1;
    protected $listeners = ['customerSelected'=>'selectedCustomer','reset'=>'$refresh'];


    public function render()
    {

        return view('customers::livewire.customer-information');
    }

    public function selectedCustomer($id)
    {
        $this->dispatch('reset');
        $this->customer = Customer::findOrFail($id);
    }

}
