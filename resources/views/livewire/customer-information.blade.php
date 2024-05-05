<div class="flex flex-col h-full py-5 overflow-y-scroll bg-white border-l shadow-lg border-neutral-100/70">
    @if ($customer)

        <div class="px-4 sm:px-5 ">
            <div class="flex items-start justify-between pb-1 ">
                <h2 class="text-base  leading-6 text-gray-900" id="slide-over-title"><span class="font-semibold">Account:</span> {{$customer->account_reference}}
                    , <span
                        class="font-semibold">Customer:</span> {{ $customer->first_name }} {{ $customer->last_name }}
                </h2>
                <div class="flex items-center h-auto ml-3">
                    <button @click="slideOverOpen = false; $dispatch('reset-tabs')"
                            class="absolute top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-4 mr-5 space-x-1 text-xs font-medium uppercase border rounded-md border-neutral-200 text-neutral-600 hover:bg-neutral-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        <span>Close</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="relative flex-1 px-4 mt-5 sm:px-5">
            <div class="absolute inset-0 px-4 sm:px-5">
                <div class="relative h-full overflow-hidden">

                    <div
                        class="container mx-auto grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 pt-6 gap-8">
                        <!-- Remove class [ h-24 ] when adding a card block -->
                        <!-- Remove class [ border-gray-300  dark:border-gray-700 border-dashed border-2 ] to remove dotted border -->

                        <div class="rounded border-gray-300 dark:border-gray-700 border-dashed border-2 ">


                            <div
                                x-ref="tabComponent"
                                @reset-tabs.window="resetTabs()"
                                x-data="{
                                tabSelected: 1,
                                tabId: $id('tabs'),
                                tabButtonClicked(tabButton){
                                    this.tabSelected = tabButton.id.replace(this.tabId + '-', '');
                                    this.tabRepositionMarker(tabButton);
                                },
                                tabRepositionMarker(tabButton){
                                    this.$refs.tabMarker.style.width=tabButton.offsetWidth + 'px';
                                    this.$refs.tabMarker.style.height=tabButton.offsetHeight + 'px';
                                    this.$refs.tabMarker.style.left=tabButton.offsetLeft + 'px';
                                },
                                tabContentActive(tabContent){
                                    return this.tabSelected == tabContent.id.replace(this.tabId + '-content-', '');
                                },
                                tabButtonActive(tabContent){
                                    const tabId = tabContent.id.split('-').slice(-1);
                                    return this.tabSelected == tabId;
                                },
                                 resetTabs() {
                                        this.tabSelected = 1;
                                        this.tabRepositionMarker(this.$refs.tabButtons.firstElementChild);
                                    },
                            }"

                                x-init="tabRepositionMarker($refs.tabButtons.firstElementChild);" class="relative ">

                                <div x-ref="tabButtons"
                                     class="relative inline-grid items-center justify-start w-full h-10  grid-cols-3 p-1 text-gray-500 bg-white border border-gray-100 rounded-lg select-none max-w-lg">
                                    <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button"
                                            :class="{ ' text-indigo-700' : tabButtonActive($el) }"
                                            class="relative z-20 col-span-1 inline-flex items-center justify-center w-full h-8 px-6  text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">
                                       Customer Details
                                    </button>
                                    <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button"
                                            :class="{ 'bg-gray-100 text-gray-700' : tabButtonActive($el) }"
                                            class="relative z-20 col-span-1 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">
                                        Billing Information
                                    </button>
                                    <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button"
                                            :class="{ 'bg-gray-100 text-gray-700' : tabButtonActive($el) }"
                                            class="relative col-span-1 z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">
                                        Delivery Address
                                    </button>
                                    <div x-ref="tabMarker" class="absolute left-0 z-10 w-1/2 h-full duration-300 ease-out"
                                         x-cloak>
                                        <div class="w-full h-full bg-gray-100 rounded-md shadow-sm"></div>
                                    </div>
                                </div>
                                <div class="relative flex items-center justify-center md:justify-start w-full p-5 mt-2 text-md text-gray-800 border rounded-md  border-gray-200/70">

                                    <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative">
                                        <h1>Customer Details</h1>
                                        <ul>
                                            <li><strong>Name:</strong> {{ $customer->first_name }} {{ $customer->last_name }}</li>
                                            <li><strong>Email:</strong> {{ $customer->email }}</li>
                                            <li>
                                                <strong>Address:</strong> {{ $customer->address_line1 }} @if($customer->address_line2)
                                                    , {{ $customer->address_line2 }}
                                                @endif</li>
                                            <li><strong>City:</strong> {{ $customer->city }}</li>
                                            <li><strong>Country:</strong> {{ $customer->country }}</li>
                                            <li><strong>Phone:</strong> {{ $customer->phone }}</li>
                                        </ul>
                                    </div>

                                    <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative"
                                         x-cloak>
                                        And, this is the content for Tab2
                                    </div>

                                    <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative"
                                         x-cloak>
                                        Finally, this is the content for Tab3
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!-- Remove class [ h-24 ] when adding a card block -->
                        <!-- Remove class [ border-gray-300  dark:border-gray-700 border-dashed border-2 ] to remove dotted border -->
                        <div class="rounded border-gray-300 dark:border-gray-700 border-dashed border-2 ">

                            <h1>Current Order</h1>
                            <ul>
                                <li><strong>Name:</strong> {{ $customer->first_name }} {{ $customer->last_name }}</li>
                                <li><strong>Email:</strong> {{ $customer->email }}</li>
                                <li>
                                    <strong>Address:</strong> {{ $customer->address_line1 }} @if($customer->address_line2)
                                        , {{ $customer->address_line2 }}
                                    @endif</li>
                                <li><strong>City:</strong> {{ $customer->city }}</li>
                                <li><strong>Country:</strong> {{ $customer->country }}</li>
                                <li><strong>Phone:</strong> {{ $customer->phone }}</li>
                            </ul>
                        </div>


                    </div>

                    <div class="container mx-auto rounded  my-2">
                        <div
                            x-ref="tabComponent"
                            @reset-tabs.window="resetTabs()"
                            x-data="{
                                tabSelected: 1,
                                tabId: $id('tabs'),
                                tabButtonClicked(tabButton){
                                    this.tabSelected = tabButton.id.replace(this.tabId + '-', '');
                                    this.tabRepositionMarker(tabButton);
                                },
                                tabRepositionMarker(tabButton){
                                    console.log(tabButton.offsetWidth, tabButton.offsetLeft); // Add this line for debugging

                                    this.$refs.tabMarker.style.width=tabButton.offsetWidth + 'px';
                                    this.$refs.tabMarker.style.height=tabButton.offsetHeight + 'px';
                                    this.$refs.tabMarker.style.left=tabButton.offsetLeft + 'px';
                                },
                                tabContentActive(tabContent){
                                    return this.tabSelected == tabContent.id.replace(this.tabId + '-content-', '');
                                },
                                tabButtonActive(tabContent){
                                    const tabId = tabContent.id.split('-').slice(-1);
                                    return this.tabSelected == tabId;
                                } ,
                                 resetTabs() {
                                        this.tabSelected = 1;
                                        this.tabRepositionMarker(this.$refs.tabButtons.firstElementChild);
                                    },
                            }"

                            x-init="$nextTick(() => { requestAnimationFrame(() => resetTabs(); })"

                            class="relative w-full">

                            <div x-ref="tabButtons"  class="relative inline-grid items-center justify-center w-full h-10 grid-cols-3 p-1 text-gray-500 bg-white border border-gray-100 rounded-lg select-none max-w-2xl">
                                <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button"
                                        :class="{ 'bg-gray-100 text-gray-700' : tabButtonActive($el) }"
                                        class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">
                                   Current Order Payment Schedule
                                </button>
                                <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button"
                                        :class="{ 'bg-gray-100 text-gray-700' : tabButtonActive($el) }"
                                        class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">
                                    Tab2
                                </button>
                                <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button"
                                        :class="{ 'bg-gray-100 text-gray-700' : tabButtonActive($el) }"
                                        class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">
                                    Tab3
                                </button>
                                <div x-ref="tabMarker" class="absolute left-0 z-10 w-1/2 h-full duration-300 ease-out"
                                     x-cloak>
                                    <div class="w-full h-full bg-gray-100 rounded-md shadow-sm"></div>
                                </div>
                            </div>
                            <div
                                class="relative flex items-center justify-center w-full p-5 mt-2 text-xs text-gray-400 border rounded-md content border-gray-200/70">

                                <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative">
                                    This is the content shown for Tab1
                                </div>

                                <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative"
                                     x-cloak>
                                    And, this is the content for Tab2
                                </div>

                                <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative"
                                     x-cloak>
                                    Finally, this is the content for Tab3
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    @else
        <p>No customer details available.</p>
    @endif

</div>
