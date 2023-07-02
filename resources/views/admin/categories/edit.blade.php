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
                    <form
                        method="POST"
                        action="{{ route('admin.categories.update',$category->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                            <div class="mt-1">
                                <input type="text" id="name" name="name" value="{{$category->name}}"
                                       class="block w-full dark:bg-gray-700 text-white appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" required/>
                            </div>
                            @error('name')
                            <div class="text-sm bg-red-500 inline text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <div class="mt-1">
                                <textarea id="description" rows="3" name="description"
                                          class="shadow-sm dark:bg-gray-700 text-white focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('description') border-red-400 @enderror" required>{{$category->description}}</textarea>
                            </div>
                            @error('description')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="image" class="block text-sm font-medium text-gray-700"> Image </label>
                            <div >
                                <label>Category image :</label>
                                <a href="{{ asset('/storage/' . $category->image)}}"><img class="img w-20 h-20 rounded" src="{{ asset('/storage/' . $category->image)}}"></a>
                            </div>
                            <div class="mt-1">
                                <input type="file" id="image" name="image"
                                       class="block w-full appearance-none dark:bg-gray-700 text-white bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('image') border-red-400 @enderror"/>
                            </div>
                            @error('image')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4 py-2">
                            <button type="submit"
                                    class="px-4 py-2 dark:bg-gray-800 hover:bg-gray-700 rounded:lg dark:text-white text-sm font-semibold  bg-transparent rounded-lg dark:bg-transparent  ">Update</button>
                            <a href="{{route("admin.categories.index")}}" class="px-4 py-2 dark:bg-gray-800 hover:bg-gray-700 rounded:lg dark:text-white text-sm font-semibold  bg-transparent rounded-lg dark:bg-transparent">Category</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
