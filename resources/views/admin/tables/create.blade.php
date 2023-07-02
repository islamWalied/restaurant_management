<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="m-2 p-2 bg-slate-100 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form method="POST" action="{{ route('admin.tables.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                            <div class="mt-1">
                                <input type="text" id="name" name="name"
                                       class="block w-full dark:bg-gray-700 text-white appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" required/>
                            </div>
                            @error('name')
                            <div class="text-sm bg-red-500 inline text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="guest_number" class="block text-sm font-medium text-gray-700">Guest Number</label>
                            <div class="mt-1">
                                <input type="number" id="guest_number" name="guest_number"
                                       class="block w-full dark:bg-gray-700 text-white appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" required/>
                            </div>
                            @error('description')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-1">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select id="status" name="status" class="form-multiselect block w-full mt-1">
                                @foreach(App\Enums\TableStatus::cases() as $status)
                                    <option value="{{$status->value}}">
                                        {{$status->name}}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mt-1">
                            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                            <select id="location" name="location" class="form-multiselect block w-full mt-1">
                                @foreach(App\Enums\TableLocation::cases() as $location)
                                    <option value="{{$location->value}}">
                                        {{$location->name}}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mt-4 py-2">
                            <button type="submit"
                                    class="px-4 py-2 dark:bg-gray-800 hover:bg-gray-700 rounded:lg dark:text-white text-sm font-semibold  bg-transparent rounded-lg dark:bg-transparent  ">Store</button>
                            <a href="{{route("admin.tables.index")}}" class="px-4 py-2 dark:bg-gray-800 hover:bg-gray-700 rounded:lg dark:text-white text-sm font-semibold  bg-transparent rounded-lg dark:bg-transparent">Table</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
