<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{route("admin.reservations.create")}}" class="px-4 py-2 dark:bg-gray-800 hover:bg-gray-700 rounded:lg dark:text-white text-sm font-semibold  bg-transparent rounded-lg dark:bg-transparent  ">New Reservation</a>
            </div>
            <div class="relative overflow-x-auto shadow-md rounded-lg">
                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap ">
                            Full Name
                        </th>
                        <th scope="col" class="px-6 py-4 font-medium whitespace-nowrap">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Phone
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Restaurant Date
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Table ID
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Guest Number
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reservations as $reservation)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium dark:bg-gray-900">
                                {{$reservation->first_name}} {{$reservation->last_name}}
                            </th>

                            <td class="px-6 py-4">
                                {{$reservation->email}}
                            </td>
                            <td class="px-6 py-4">
                                {{$reservation->phone}}
                            </td>
                            <td class="px-6 py-4">
                                {{$reservation->res_date}}
                            </td>
                            <td class="px-6 py-4">

                                {{$reservation->table->name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$reservation->guest_number}}
                            </td>

                            <td class="px-6 py-4">
{{--                                <a href="{{route("admin.reservations.edit",$reservation->id)}}" class="block text-center  p-4 text-white bg-gray-800 hover:bg-gray-900  font-medium rounded-lg text-sm">Edit</a>--}}
{{--                                <a href="{{route("admin.reservations.destroy",$reservation->id)}}" class="block p-4 mt-1 text-white bg-gray-800 hover:bg-gray-900  font-medium rounded-lg text-sm">Delete</a>--}}

                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('admin.reservations.edit', $reservation->id) }}"
                                       class="inline-block mr-2 p-4 bg-gray-800 hover:bg-gray-900  font-medium rounded-lg text-sm">Edit</a>
                                    <form
                                        class="inline-block  p-4 bg-gray-800 hover:bg-gray-900  font-medium rounded-lg text-sm"
                                        method="POST"
                                        action="{{ route('admin.reservations.destroy', $reservation->id) }}"
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
