<x-app-layout>

    <x-slot name="header">
        <div class="bg-rose-800 pt-8 pb-16 relative ">
            <div class="container px-6 mx-auto flex flex-col lg:flex-row items-start lg:items-center justify-between">
                <div class="flex-col flex lg:flex-row items-start lg:items-center">
                    <div class="ml-0 lg:ml-0 my-6 lg:my-0">
                        <h4 class="text-2xl font-bold leading-tight text-white mb-2 capitalize">{{ __('Customers') }} {{$customer->full_name}}</h4>
                        <p class="flex items-center text-gray-300 text-xs">
                            <a href="{{route('dashboard')}}">
                                <span class="cursor-pointer">CRM</span>
                            </a>
                            <span class="mx-2">&gt;</span>
                            <a href="{{route('customers.index')}}" >
                                <span class="cursor-pointer {{request()->routeIs('customers.index') ? 'font-semibold':''}}">Customer         <span class="mx-2">&gt;</span> {{$customer->full_name}}</span>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="flex flex-row">
                    <div>
                     </div>
                </div>
            </div>
        </div>

    </x-slot>

    <div class="pb-12"  x-data="{ customerEdit: false }">

        <div>
            <!-- Page title starts -->
            <!-- Page title ends -->
            <div class="container px-6 mx-auto">
                <!-- Remove class [ h-64 ] when adding a card block -->

                <div class="rounded shadow relative bg-white z-10 -mt-8 mb-8 w-full  p-4">


                    <div class="container pt-6 mx-auto mb-10">
                        <div class="flex flex-wrap">
                            <div class="md:w-2/5 w-full pb-6 md:pb-0 md:pr-6">
                                <!-- Remove class [ h-24 ] when adding a card block -->
                                <!-- Remove class [ border-gray-300  dark:border-gray-700 border-dashed border-2 ] to remove dotted border -->
                                <div class="rounded border-gray-300  border  mb-10">

                                    <div class="rounded ">



                                        <div class="sm:hidden relative w-11/12 mx-auto rounded">
                                            <div class="absolute inset-0 m-auto mr-4 z-0 w-6 h-6">
                                                <img class="icon icon-tabler icon-tabler-selector" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/active-inigo-svg1.svg" alt="selector" />
                                            </div>
                                            <select aria-label="Selected tab" class="form-select block w-full p-3 border border-gray-300 dark:border-gray-700 rounded text-gray-600 dark:text-gray-200 appearance-none bg-transparent relative z-10">
                                                <option class="text-sm text-gray-600">Customer</option>
                                                <option class="text-sm text-gray-600">Payment</option>
                                                <option class="text-sm text-gray-600">Notes</option>
                                            </select>
                                        </div>
                                        <div class="xl:w-full xl:mx-0 h-12 hidden sm:block bg-white dark:bg-gray-800 rounded shadow">
                                            <div class="flex border-b px-5">
                                                <button data-tab="tab1" onclick="activeTab(this)" class="hover:text-indigo-700 focus:text-indigo-700 focus:outline-none text-sm text-indigo-700 flex flex-col justify-between border-indigo-700 pt-3 rounded-t mr-8 font-normal cursor-pointer">
                                                    <span class="mb-3 dark:text-white ">Customer</span>
                                                    <div class="w-full h-1 bg-indigo-700 rounded-t-md"></div>
                                                </button>
{{--                                                <button data-tab="tab4" onclick="activeTab(this)" class="hover:text-indigo-700 focus:text-indigo-700 focus:outline-none text-sm text-gray-600 flex flex-col justify-between border-indigo-700 pt-3 rounded-t mr-8 font-normal cursor-pointer">--}}
{{--                                                    <span class="mb-3 dark:text-white ">Payment</span>--}}
{{--                                                    <div class="w-full h-1 bg-indigo-700 rounded-t-md hidden"></div>--}}
{{--                                                </button>--}}
                                                <button data-tab="tab5" onclick="activeTab(this)" class="hover:text-indigo-700 focus:text-indigo-700 focus:outline-none text-sm text-gray-600 flex flex-col justify-between border-indigo-700 pt-3 rounded-t mr-8 font-normal cursor-pointer">
                                                    <span class="mb-3 dark:text-white ">Notes</span>
                                                    <div class="w-full h-1 bg-indigo-700 rounded-t-md hidden"></div>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Tab Contents -->
                                        <div id="tab1" class="tab-content bg-white/50 p-2 mb-5">

                                            <div class="w-full max-w-2xl px-4">
                                                <div class="">
                                                    <div class="px-1 pt-6 overflow-x-auto">
                                                        <table class="w-full whitespace-nowrap">
                                                            <tbody>
                                                            <tr tabindex="0" class="focus:outline-none">
                                                                <td>
                                                                    <div class="flex items-center">
                                                                        <div class="pl-3">
                                                                            <div class="flex items-center text-sm leading-none">
                                                                                <p class="text-gray-800 dark:text-white ">Customer Number:</p>
                                                                                <p class="text-black capitalize font-semibold  ml-3">{{$customer->account_reference}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr tabindex="0" class="focus:outline-none">
                                                                <td class="pt-6">
                                                                    <div class="flex items-center">
                                                                        <div class="pl-3">
                                                                            <div class="flex items-center text-sm leading-none">
                                                                                <p class="text-gray-800 dark:text-white ">Full Name:</p>
                                                                                <p class="text-black capitalize font-semibold  ml-3">{{$customer->full_name}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr tabindex="0" class="focus:outline-none">
                                                                <td class="pt-6">
                                                                    <div class="flex items-center">
                                                                        <div class="pl-3">
                                                                            <div class="flex items-center text-sm leading-none">
                                                                                <p class="text-gray-800 dark:text-white ">DOB:</p>
                                                                                <p class="text-black capitalize font-semibold  ml-3">{{\Carbon\Carbon::createFromFormat('Y-m-d',$customer->date_of_birth)->format('d M Y')}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr tabindex="0" class="focus:outline-none">
                                                                <td class="pt-6">
                                                                    <div class="flex items-center">
                                                                        <div class="pl-3">
                                                                            <div class="flex items-center text-sm leading-none">
                                                                                <p class="text-gray-800 dark:text-white ">Email:</p>
                                                                                <p class="text-black lowercase font-semibold  ml-3">{{$customer->email}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr tabindex="0" class="focus:outline-none">
                                                                <td class="pt-6">
                                                                    <div class="flex items-center">
                                                                        <div class="pl-3">
                                                                            <div class="flex items-center text-sm leading-none">
                                                                                <p class="text-gray-800 dark:text-white ">Contact Number:</p>
                                                                                <p class="text-black lowercase font-semibold  ml-3">{{$customer->phone}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr tabindex="0" class="focus:outline-none">
                                                                <td class="pt-6">
                                                                    <div class="flex items-center">
                                                                        <div class="pl-3">
                                                                            <div class="flex items-center text-sm leading-none">
                                                                                <p class="text-gray-800 dark:text-white ">Address:</p>
                                                                                <p class="text-black lowercase font-semibold  ml-3">{{$customer->address_line1}} {{$customer->city}} {{$customer->postal_code}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr tabindex="0" class="focus:outline-none">
                                                                <td class="pt-6">
                                                                    <div class="flex items-center">
                                                                        <div class="pl-3">
                                                                            <div class="flex items-center text-sm leading-none">
                                                                                <p class="text-gray-800 dark:text-white ">Pricing Tier:</p>
                                                                                <p class="text-black lowercase font-semibold  ml-3">{{$customer->price_tier}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <button  @click="customerEdit=true" type="button" class="rounded-md mr-auto my-5 bg-green-700 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-green-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</button>

                                            </div>


                                        </div>

                                        <div id="tab4" class="tab-content hidden bg-white/50 ">
                                            <div class="w-full max-w-2xl px-4">
                                                <div class="">
                                                    <div class="px-1 py-6 overflow-x-auto">
                                               Payment
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div id="tab5" class="tab-content hidden bg-white/50 p-4 pb-16">
                                            <livewire:notes usage="Customer" :ref="$customer"/>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="md:w-3/5 w-full">
                                <!-- Remove class [ h-24 ] when adding a card block -->
                                <!-- Remove class [ border-gray-300  dark:border-gray-700 border-dashed border-2 ] to remove dotted border -->
                                <div class="rounded border-gray-300  ">
                                    <div class="mb-5">
                                        <dl class="mt-0 grid grid-cols-1 divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow md:grid-cols-3 md:divide-x md:divide-y-0">
                                            <div class="px-4 py-5 sm:p-6">
                                                <dt class="text-base font-normal text-gray-900">Total Orders</dt>
                                                <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                                                    <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                                                      {{$total}}
                                                    </div>
                                                </dd>
                                            </div>
                                            <div class="px-4 py-5 sm:p-6">
                                                <dt class="text-base font-normal text-gray-900">Last Order Value</dt>
                                                <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                                                    <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                                                        £{{$latest ? $latest->total_price : 0.00}}

                                                    </div>
                                                </dd>
                                            </div>
                                            <div class="px-4 py-5 sm:p-6">
                                                <dt class="text-base font-normal text-gray-900">Last Order Status</dt>
                                                <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                                                    <div class="flex items-baseline text-2xl font-semibold text-indigo-600">

                                                        @isset($latest)
                                                            @if($latest->status != 'completed')
                                                                <div class="flex flex-col">
                                                                    <span class="capitalize"> {{$latest->status}}</span>
                                                                    <span class="text-sm text-red-500"> Order In Progress</span>
                                                                </div>


                                                                @else

                                                            @endif

                                                        @endisset
                                                    </div>

                                                </dd>
                                            </div>
                                        </dl>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <livewire:orders::orders-table :customer_id="$customer->id"/>
                    </div>


                </div>
            </div>

        </div>

        <div  @keydown.escape.window="customerEdit = false" class="relative z-50 w-auto h-auto">
            <template x-teleport="body">
                <div x-show="customerEdit" class="fixed top-0 left-0 z-[99] flex items-start py-16  justify-center w-screen h-screen bg-gray-800/75" x-cloak>
                    <div x-show="customerEdit"
                         x-transition:enter="ease-out duration-300"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="ease-in duration-300"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         @click="customerEdit=false" class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
                    <div x-show="customerEdit"
                         x-trap.inert.noscroll="customerEdit"
                         x-transition:enter="ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                         x-transition:leave="ease-in duration-200"
                         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                         class="relative w-full py-6 bg-white px-7 sm:max-w-2xl sm:rounded-lg">
                        <div class="flex items-center justify-between pb-2">
                            <h3 class="text-lg font-semibold capitalize">Edit: {{$customer->full_name}}</h3>
                            <button @click="customerEdit=false" class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                            </button>
                        </div>
                        <div class="relative w-auto">
                            {{--Billing Address--}}
                            <div  class="col-span-6 lg:col-span-3 bg-white p-6 rounded-2xl mb-3">
                                <div class="pb-12">



                                <livewire:forms.address :customer="$customer"/>


                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </template>
        </div>

        <script type="text/javascript">
            function activeTab(element) {
                let siblings = element.parentNode.querySelectorAll("button");
                let tabContents = document.querySelectorAll(".tab-content");

                for (let item of siblings) {
                    //item.children[0].innerHTML = "Inactive";
                    item.children[1].classList.add("hidden");
                    item.classList.add("text-gray-600");
                    item.classList.remove("text-indigo-700");
                }

                // element.children[0].innerHTML = "Active";
                element.children[1].classList.remove("hidden");
                element.classList.remove("text-gray-600");
                element.classList.add("text-indigo-700");

                let activeTabId = element.getAttribute("data-tab");

                for (let content of tabContents) {
                    if (content.id === activeTabId) {
                        content.classList.remove("hidden");
                    } else {
                        content.classList.add("hidden");
                    }
                }
            }

        </script>

    </div>
</x-app-layout>
