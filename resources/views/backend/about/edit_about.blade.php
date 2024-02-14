@extends('backend.layouts.master_admin')
@section('content')
    @if($count_about > 0)
        <form action="{{ route('update.about',$get_about->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="bg-blue-50 text-xl text-gray-500 p-4 mb-4 rounded-md">
                <h1>Section Menu<span> > </span>About</h1>
            </div>
            <div class="bg-white shadow-md py-6 px-10 rounded-md">
                <div class="border-b border-gray-900/10">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">About Information</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">You can change your website everything.</p>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-2">
                            <label for="map_title" class="block text-sm font-medium leading-6 text-gray-900">Map Title</label>
                            <div class="mt-2">
                                <input type="text" name="map_title" id="map_title" value="{{ $get_about->map_title }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Your title here">
                            </div>
                            @error('map_title')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                            <div class="mt-2">
                                <input type="text" name="address" id="address" value="{{ $get_about->address }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Address">
                            </div>
                            @error('address')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="map_url" class="block text-sm font-medium leading-6 text-gray-900">Map Embed URL</label>
                            <div class="mt-2 mb-10">
                                <input type="text" name="map_url" id="map_url" value="{{ $get_about->map_url }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="https/example.com">
                            </div>
                            @error('map_url')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                </div>
            </div>
        </form>
    @else
        <span class="rounded-md px-3 py-2 text-sm text-green-500">Already about created, you can make changes to find the <span class="font-bold">'Edit'</span> menu.</span>
    @endif
@endsection
