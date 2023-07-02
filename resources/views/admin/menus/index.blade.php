<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{route("admin.menus.create")}}" class="px-4 py-2 dark:bg-gray-800 hover:bg-gray-700 rounded:lg dark:text-white text-sm font-semibold  bg-transparent rounded-lg dark:bg-transparent  ">New Menu</a>
            </div>
            <div class="relative overflow-x-auto shadow-md rounded-lg">
                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap ">
                            Menu name
                        </th>
                        <th scope="col" class="px-6 py-4 font-medium whitespace-nowrap">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Price
                        </th>
{{--                        <th scope="col" class="px-6 py-4">--}}
{{--                            Category--}}
{{--                        </th>--}}
                        <th scope="col" class="px-6 py-4">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menus as $menu)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium dark:text-gray-900 whitespace-nowrap ">
                                {{$menu->name}}
                            </th>
                            <td class="px-6 py-4">
                                {{$menu->description}}
                            </td>
                            <td class="px-6 py-4">
                                {{$menu->price}}
                            </td>
{{--                            <td class="px-6 py-4">--}}
{{--                                {{$menu->category->name}}--}}
{{--                            </td>--}}
                            <td
                                class="py-4 px-6 justify-center flex text-sm font-medium text-gray-900 whitespace-nowrap">
                                <a href="{{ asset('/storage/' . $menu->image)}}">
                                    <img src="{{ asset('/storage/' . $menu->image)}}"
                                         class="w-20 h-20 rounded">
                                </a>
                            </td>
                            <td class="px-6 py-4">
{{--                                <a href="{{route("admin.menus.edit",$menu->id)}}" class="inline-block p-4 text-white bg-gray-800 hover:bg-gray-900  font-medium rounded-lg text-sm">Edit</a>--}}
{{--                                <a href="{{route("admin.menus.destroy",$menu->id)}}" class="inline-block p-4 text-white bg-gray-800 hover:bg-gray-900  font-medium rounded-lg text-sm">Delete</a>--}}

                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('admin.menus.edit', $menu->id) }}"
                                       class="inline-block mr-2 p-4  bg-gray-800 hover:bg-gray-900  font-medium rounded-lg text-sm">Edit</a>
                                    <form
                                        class="inline-block  p-4  bg-gray-800 hover:bg-gray-900  font-medium rounded-lg text-sm"
                                        method="POST"
                                        action="{{ route('admin.menus.destroy', $menu->id) }}"
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
