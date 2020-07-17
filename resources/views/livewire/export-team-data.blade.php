<div class="mb-8 overflow-hidden bg-white rounded-lg shadow">
    <div class="sm:p-6 md:flex-row flex flex-col items-center justify-between px-4 py-5">
        <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">
                General Data Protection Regulation (GDPR)
            </h3>
            <div class="max-w-xl2 mt-2 text-sm leading-5 text-gray-600">
                <p>This will will create a zip containing all personal data to respect your right to data portability.</p>
            </div>
        </div>

        <div class="md:w-auto w-full">
            <button wire:click="export" type="button" class="md:mt-0 md:w-auto focus:outline-none sm:text-sm sm:leading-5 focus:border-teal-300 focus:shadow-outline-teal active:bg-teal-200 hover:bg-teal-50 relative inline-flex items-center justify-center w-full px-4 py-2 mt-4 font-medium text-teal-700 transition duration-150 ease-in-out bg-teal-100 border border-transparent rounded-md">
                <span>Export Personal Data</span>
            </button>
        </div>
    </div>
</div>
