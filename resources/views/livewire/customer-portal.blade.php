<div class="mb-8 bg-white rounded-lg shadow">
    <div class="sm:p-6 md:flex-row flex flex-col items-center justify-between px-4 py-5">
        <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">
                Customer Portal
            </h3>
            <div class="max-w-xl2 mt-2 text-sm leading-5 text-gray-600">
                <p>Access the customer portal to update your payment method, manage your subscription and download your invoices.</p>
            </div>
        </div>
        <div class="md:mt-0 md:w-auto w-full mt-4">
            <div class="md:w-auto w-full">
                @if($isSubscribed)
                    <a href="{{ $this->team->billingPortalUrl(route('team')) }}" class="focus:outline-none sm:w-auto sm:text-sm sm:leading-5 hover:bg-gray-700 focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700 relative inline-flex items-center justify-center w-full px-4 py-2 font-medium text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md">
                        <span>Open</span>
                    </a>
                @else
                    <a href="{{ route('subscribe') }}" class="focus:outline-none sm:w-auto sm:text-sm sm:leading-5 hover:bg-gray-700 focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700 relative inline-flex items-center justify-center w-full px-4 py-2 font-medium text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md">
                        <span>Open</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
