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
                    <form method="POST" action="{{ route('admin.reservations.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="sm:col-span-6">
                            <label for="fname" class="block text-sm font-medium text-gray-700"> First Name </label>
                            <div class="mt-1">
                                <input type="text" id="fname" name="fname"
                                       class="block w-full dark:bg-gray-700 text-white appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('fname') border-red-400 @enderror" required/>
                            </div>
                            @error('fname')
                            <div class="text-sm bg-red-500 inline text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="lname" class="block text-sm font-medium text-gray-700"> Last Name </label>
                            <div class="mt-1">
                                <input type="text" id="lname" name="lname"
                                       class="block w-full dark:bg-gray-700 text-white appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('lname') border-red-400 @enderror" required/>
                            </div>
                            @error('lname')
                            <div class="text-sm bg-red-500 inline text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <div class="mt-1">
                                <input type="email" id="email" name="email"
                                       class="block w-full dark:bg-gray-700 text-white appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-400 @enderror" required/>
                            </div>
                            @error('email')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <div class="mt-1">
                                <input type="text" id="phone" name="phone"
                                       class="block w-full dark:bg-gray-700 text-white appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('phone') border-red-400 @enderror" required/>
                            </div>
                            @error('phone')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="date" class="block text-sm font-medium text-gray-700"> Restaurant Date </label>
                            <div class="mt-1">
                                <input type="datetime-local" id="date" name="date"
                                       class="block w-full appearance-none dark:bg-gray-700 text-white bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('date') border-red-400 @enderror" required/>
                            </div>
                            @error('date')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="table_id" class="block text-sm font-medium text-gray-700"> Table ID </label>
                            <div class="mt-1">
                                <select id="table_id" name="table_id" class="form-multiselect block w-full mt-1 @error('table_id') border-red-400 @enderror" >
                                    @foreach($tables as $table)
                                        <option value="{{$table->id}}">
                                            {{$table->name}} ({{$table->guest_number}} Guests)
                                        </option>
                                    @endforeach

                                </select></div>
                            @error('table_id')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="guest_no" class="block text-sm font-medium text-gray-700"> Guest Number </label>
                            <div class="mt-1">
                                <input type="number" min="1" id="guest_no" name="guest_no"
                                       class="block w-full appearance-none dark:bg-gray-700 text-white bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('guest_no') border-red-400 @enderror" required/>
                            </div>
                            @error('guest_no')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4 py-2">
                            <button type="submit"
                                    class="px-4 py-2 dark:bg-gray-800 hover:bg-gray-700 rounded:lg dark:text-white text-sm font-semibold  bg-transparent rounded-lg dark:bg-transparent  ">Store</button>
                            <a href="{{route("admin.reservations.index")}}" class="px-4 py-2 dark:bg-gray-800 hover:bg-gray-700 rounded:lg dark:text-white text-sm font-semibold  bg-transparent rounded-lg dark:bg-transparent">Reservations</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
