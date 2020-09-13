<form wire:submit.prevent="submit">
    <div class="bg-teal-50 p-4 rounded-md">
        <div class="md:justify-between">
            <p class="text-sm leading-5 text-teal-700">
                You can now close this tab and carry on with your day, but we'd appreciate if you stayed and gave us some feedback about the service. <span class="font-semibold">It won't take you more than a minute but will help us a lot.</span>
            </p>
        </div>
    </div>

    <div class="mt-6">
        <label for="reason" class="block text-sm font-medium leading-5 text-gray-700">Reason</label>
        <select wire:model="reason" id="reason" class="form-select focus:outline-none focus:shadow-outline-teal focus:border-teal-300 sm:text-sm sm:leading-5 block w-full py-2 pl-3 pr-10 mt-1 text-base leading-6 border-gray-300">
            <option>I was just checking out the service</option>
            <option>I thought the service did something different</option>
            <option>{{ config('app.name') }} did not work with my use-case</option>
            <option>{{ config('app.name') }} doesn't include a feature that I require</option>
        </select>
    </div>

    <div class="mt-6">
        <x-input.group type="textarea" name="feedback" label="Additional Feedback" />
    </div>

    <div class="mt-6">
        <span class="block w-full rounded-md shadow-sm">
            <button type="submit" class="group hover:bg-gray-700 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700 relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md">
                Send Feedback
            </button>
        </span>
    </div>
</form>
