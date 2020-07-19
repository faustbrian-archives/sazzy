<x-layouts.app>
    <x-slot name="header">
        <h1 class="text-3xl font-bold leading-9 text-white">Affiliate Program</h1>
        <p class="text-xl leading-9 text-gray-300">Invite others to try {{ config('app.name') }} and earn a 20% commission of their payments every month.</p>
    </x-slot>

    <div class="flex-1 h-full">
        <div class="mb-8 overflow-hidden bg-white rounded-lg shadow">
            <div class="sm:px-6 px-4 py-5 bg-white border-b border-gray-200">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                    Affiliate Statistics
                </h3>
            </div>

            <div class="sm:grid-cols-4 grid grid-cols-1 gap-5">
                <div class="overflow-hidden border-r border-gray-200">
                    <div class="sm:p-6 px-4 py-5">
                        <dl>
                            <dt class="text-sm font-medium leading-5 text-gray-500 truncate">
                                Referalls
                            </dt>
                            <dd class="mt-1 text-3xl font-semibold leading-9 text-gray-900">
                                {{ Auth::user()->referrals()->count() }}
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="overflow-hidden border-r border-gray-200">
                    <div class="sm:p-6 px-4 py-5">
                        <dl>
                            <dt class="text-sm font-medium leading-5 text-gray-500 truncate">
                                Balance
                            </dt>
                            <dd class="mt-1 text-3xl font-semibold leading-9 text-gray-900">
                                ${{ Auth::user()->getReferralBalance() }}
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="overflow-hidden border-r border-gray-200">
                    <div class="sm:p-6 px-4 py-5">
                        <dl>
                            <dt class="text-sm font-medium leading-5 text-gray-500 truncate">
                                Total Earnings
                            </dt>
                            <dd class="mt-1 text-3xl font-semibold leading-9 text-gray-900">
                                ${{ Auth::user()->getTotalReferralBalance() }}
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="overflow-hidden">
                    <div class="sm:p-6 px-4 py-5">
                        <dl>
                            <dt class="text-sm font-medium leading-5 text-gray-500 truncate">
                                Last Payment
                            </dt>
                            <dd class="mt-1 text-3xl font-semibold leading-9 text-gray-900">
                                {{ Auth::user()->cashed_out_at ? Auth::user()->cashed_out_at : "Never" }}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <form class="mb-8 overflow-hidden bg-white rounded-lg shadow">
            <div class="sm:px-6 px-4 py-5 bg-white border-b border-gray-200">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                    <span>{{ config('app.name') }} Affiliate Program</span>
                </h3>
            </div>
            <div class="sm:p-6 md:flex-row flex flex-col items-center justify-between px-4 py-5">
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        Affiliate tag
                    </h3>
                    <div class="md:pr-4 max-w-xl mt-2 text-sm leading-5 text-gray-600">
                        <p>Link to any page on {{ config('app.host') }} by adding <code class="inline-block px-1 font-mono text-sm font-normal leading-6 text-teal-600 whitespace-no-wrap align-baseline bg-teal-100 rounded">?via=</code> to the end of the URL, and any users who register through your link will earn you a comission.</p>
                    </div>
                </div>
                <div class="md:mt-0 md:w-auto flex-1 w-full mt-4">
                    <div class="md:flex-row flex flex-col items-center">
                        <div class="md:max-w-xs w-full ml-auto">
                            <label for="tag" class="sr-only">Tag</label>
                            <div class="relative rounded-md shadow-sm">
                                <input id="tag" class="form-input sm:text-sm sm:leading-5 block w-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sm:p-6 md:flex-row flex flex-col items-center justify-between px-4 py-5 border-b border-gray-200">
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        PayPal email
                    </h3>
                    <div class="md:pr-4 max-w-xl mt-2 text-sm leading-5 text-gray-600">
                        <p>We'll send your earnings to your account at the end of each month if your balance exceeds $20.</p>
                    </div>
                </div>
                <div class="md:mt-0 md:w-auto flex-1 w-full mt-4">
                    <div class="md:flex-row flex flex-col items-center">
                        <div class="md:max-w-xs w-full ml-auto">
                            <label for="paypal" class="sr-only">PayPal Email</label>
                            <div class="relative rounded-md shadow-sm">
                                <input id="paypal" type="email" class="form-input sm:text-sm sm:leading-5 block w-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:flex-row bg-gray-50 flex flex-col items-center justify-end px-6 py-3">
                <span class="sm:mt-0 sm:ml-3 sm:w-auto inline-flex w-full rounded-md shadow-sm">
                    <button class="hover:bg-gray-700 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700 sm:w-auto sm:text-sm sm:leading-5 relative inline-flex items-center justify-center w-full px-4 py-2 font-medium text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md" type="submit">
                        <span>Save Changes</span>
                    </button>
                </span>
            </div>
        </form>
    </div>
</x-layouts.app>
