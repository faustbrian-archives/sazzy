<form wire:submit.prevent="subscribe" class="overflow-hidden bg-white rounded-lg shadow-lg">
    <div x-data="{ selectedPlan: 'yearly' }" class="md:flex-row sm:px-10 flex flex-col items-stretch justify-between px-3">
        <div class="sm:py-6 md:pr-4 flex-1 py-4 overflow-hidden">
            <div wire:click="$set('plan', 'monthly')" @click="selectedPlan = 'monthly'" :class="{ 'border-teal-100': selectedPlan === 'yearly', 'border-teal-400': selectedPlan === 'monthly' }" class="relative h-full p-4 transition duration-200 ease-in border-2 rounded-lg shadow cursor-pointer">
                <span class="inline-flex px-4 py-1 text-sm font-semibold leading-5 tracking-wide text-teal-600 uppercase bg-teal-100 rounded-full">monthly</span>

                <div class="flex items-baseline mt-4 text-6xl font-bold leading-none">
                    <span class="font-display">${{ $this->getPlan('monthly')->price }}</span>
                    <span class="text-2xl font-medium leading-8 text-gray-500">/mo</span>
                    @if($isEuropean)
                        <span class="font-display ml-1 text-lg font-medium leading-8 text-gray-500">+ VAT</span>
                    @endif
                </div>

                <p class="mt-5 text-lg leading-7 text-gray-500">Simple monthly pricing. Cancel at any time.</p>

                <div x-show="selectedPlan === 'monthly'" class="absolute top-0 right-0 m-2">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6 text-teal-400">
                        <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="sm:py-6 md:pl-4 flex-1 py-4 overflow-hidden">
            <div wire:click="$set('plan', 'yearly')" @click="selectedPlan = 'yearly'" :class="{ 'border-teal-100': selectedPlan === 'monthly', 'border-teal-400': selectedPlan === 'yearly' }" class="relative h-full p-4 transition duration-200 ease-in border-2 rounded-lg shadow cursor-pointer">
                <span class="inline-flex px-4 py-1 text-sm font-semibold leading-5 tracking-wide text-teal-600 uppercase bg-teal-100 rounded-full">yearly</span>

                <div class="flex items-baseline mt-4 text-6xl font-bold leading-none">
                    <span class="font-display">${{ $this->getPlan('yearly')->price }}</span>
                    <span class="text-2xl font-medium leading-8 text-gray-500">/yr</span>
                    @if($isEuropean)
                        <span class="font-display ml-1 text-lg font-medium leading-8 text-gray-500">+ VAT</span>
                    @endif
                </div>

                <p class="mt-5 text-lg leading-7 text-gray-500">Save ~{{ $this->getPlan('yearly')->discount }}% by paying annually.</p>

                <div x-show="selectedPlan === 'yearly'" class="absolute top-0 right-0 m-2">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6 text-teal-400">
                        <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    @if($isEuropean)
        <div class="sm:px-10 px-3 mb-4">
            <div>
                <label for="vat_id" class="block text-sm font-medium leading-5 text-gray-700">
                    VAT ID <span class="text-xs">(optional)</span>
                </label>
                <div class="relative mt-1 rounded-md shadow-sm">
                    <input type="text" id="vat_id" class="form-input sm:text-sm sm:leading-5 block w-full pr-10" wire:model="vatId" />
                </div>
            </div>
        </div>
    @endif

    <div class="sm:px-10 bg-gray-50 w-full px-3 py-8">
        <div class="rounded-md shadow">
            <button type="submit" class="focus:outline-none hover:bg-gray-800 focus:shadow-outline relative flex items-center justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-gray-900 border border-transparent rounded-md" type="submit">
                <span>Start your 7-day trial</span>
            </button>
        </div>
        {{-- <p class="mt-6 text-center text-gray-600">
            <span class="font-brown sm:inline hidden">* </span>We'll verify your card is valid by charging $1 and then immediately refunding it. <br class="sm:hidden"><br class="sm:hidden">If you cancel your account while on trial, you won't get billed.
        </p> --}}
    </div>
</form>

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            @this.on('checkoutSessionCreated', (sessionId) => {
                Stripe("{{ config('cashier.key') }}")
                    .redirectToCheckout({ sessionId })
                    .then((result) => console.log(result.error.message));
            })
        })
    </script>
@endpush
