@extends('backend.layouts.master_admin')
@section('content')
    @if($count_service != 6)
        <form action="{{ route('store.service') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="bg-blue-50 text-xl text-gray-500 p-4 mb-4 rounded-md">
                <h1>Section Menu<span> > </span>Services</h1>
            </div>
            <div class="bg-white shadow-md py-6 px-10 rounded-md">
                <div class="border-b border-gray-900/10">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Service Information</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">You can change your website everything.</p>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-2">
                            <label for="logo" class="block text-sm font-medium leading-6 text-gray-900">Logo/Icon</label>
                            <div class="mt-2">
                                <input
                                    name="logo"
                                    class="relative name m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                                    type="file"
                                    id="formFile" />
                            </div>
                            @error('logo')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="headline" class="block text-sm font-medium leading-6 text-gray-900">Headline</label>
                            <div class="mt-2">
                                <input type="text" name="headline" id="headline" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Type your headline here">
                            </div>
                            @error('headline')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="sm:col-span-2 mb-10">
                            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <input type="text" name="description" id="description" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Type your description">
                            </div>
                            @error('description')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </div>
        </form>
    @else
        <span class="rounded-md px-3 py-2 text-sm text-red-600">Ops! You already added 6 services, you can not create more than. Please <span class="font-bold">'Edit or Delete'</span> then create new</span>
    @endif
@endsection
