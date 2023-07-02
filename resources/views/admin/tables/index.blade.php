<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{route("admin.tables.create")}}" class="px-4 py-2 dark:bg-gray-800 hover:bg-gray-700 rounded:lg dark:text-white text-sm font-semibold  bg-transparent rounded-lg dark:bg-transparent  ">New Table</a>
            </div>
            <div class="relative overflow-x-auto shadow-md rounded-lg">
                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap ">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-4 font-medium whitespace-nowrap">
                            Guest Number
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Location
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tables as $table)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium dark:bg-gray-900">
                                {{$table->name}}
                            </th>
                            <td class="px-6 py-4">
                                {{$table->guest_number}}
                            </td>
                            <td class="px-6 py-4">
                                {{$table->status->name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$table->location->name}}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('admin.tables.edit', $table->id) }}"
                                       class="inline-block mr-2 p-4 bg-gray-800 hover:bg-gray-900  font-medium rounded-lg text-sm">Edit</a>
                                    <form
                                        class="inline-block  p-4 bg-gray-800 hover:bg-gray-900  font-medium rounded-lg text-sm"
                                        method="POST"
                                        action="{{ route('admin.tables.destroy', $table->id) }}"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</x-admin-layout>
