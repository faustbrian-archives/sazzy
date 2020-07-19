<x-layouts.app>
    <x-slot name="header">
        <h1 class="text-3xl font-bold leading-9 text-white">Team Activity</h1>
    </x-slot>

    <div class="flex flex-col bg-white rounded-lg shadow">
        <div class="sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 py-2 -my-2 overflow-x-auto">
            <div class="sm:rounded-lg inline-block min-w-full overflow-hidden align-middle border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="bg-gray-50 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">
                                Causer
                            </th>
                            <th class="bg-gray-50 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">
                                Description
                            </th>
                            <th class="bg-gray-50 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">
                                Date &amp; Time
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($currentTeam->activities as $activity)
                            @if($activity->causer)
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                <img class="w-10 h-10 rounded-full" src="{{ $activity->causer->photo }}" alt="{{ $activity->causer->name }}" />
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium leading-5 text-gray-900">{{ $activity->causer->name }}</div>
                                                <div class="text-sm leading-5 text-gray-500">{{ $activity->causer->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap">
                                        {{ $activity->description }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap">
                                        {{ $activity->created_at->toDayDateTimeString() }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- <ul>
            @foreach($currentTeam->activities as $activity)
                <li>
                    <a href="#" class="hover:bg-gray-50 focus:outline-none focus:bg-gray-50 block transition duration-150 ease-in-out">
                        <div class="sm:px-6 flex items-center px-4 py-4">
                            <div class="flex items-center flex-1 min-w-0">
                                <div class="flex-shrink-0">
                                    <img class="w-12 h-12 rounded-full" src="{{ $activity->causer->photo }}" alt="{{ $activity->causer->name }}" />
                                </div>
                                <div class="md:grid md:grid-cols-2 md:gap-4 flex-1 min-w-0 px-4">
                                    <div>
                                        <div class="text-sm font-medium leading-5 text-teal-600 truncate">{{ $activity->causer->name }}</div>
                                        <div class="flex items-center mt-2 text-sm leading-5 text-gray-500">
                                            <span class="truncate">{{ $activity->causer->email }}</span>
                                        </div>
                                    </div>
                                    <div class="md:block hidden">
                                        <div>
                                            <div class="text-sm leading-5 text-gray-900">
                                                Caused on
                                                <time datetime="2020-01-07">{{ $activity->created_at->toFormattedDateString() }}</time>
                                            </div>
                                            <div class="flex items-center mt-2 text-sm leading-5 text-gray-500">
                                                {{ $activity->description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul> --}}
    </div>
</x-layouts.app>
