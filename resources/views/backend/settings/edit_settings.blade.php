@extends('backend.layouts.master_admin')
@section('content')
{{--    @if($settings_count == 0)--}}
        <form action="{{ route('all.setting.update',$editData->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="border-b border-gray-900/10">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Update Settings</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">You can change your website everything.</p>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Logo</label>
                        <div class="mt-2">
                            <input
                                name="logo"
                                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                                type="file"
                                id="formFile" />
                            <img src="{{  (!empty($editData->logo))? url('upload/backend/settings/'.$editData->logo):url('upload/no_image.jpg') }}" class="w-16 h-16 border border-white shadow-md mt-1 rounded-md">
                            @error('logo')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="heading" class="block text-sm font-medium leading-6 text-gray-900">Heading</label>
                        <div class="mt-2">
                            <input type="text" name="heading" id="heading" value="{{ $editData->heading }}" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('heading')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title" value="{{ $editData->title }}" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('title')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label for="cholak" class="block text-sm font-medium leading-6 text-gray-900">Cholak</label>
                        <div class="mt-2">
                            <input type="text" name="cholak" id="cholak" value="{{ $editData->cholak }}" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Display Image</label>
                        <div class="mt-2">
                            <input
                                name="image"
                                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                                type="file"
                                id="formFile" />
                            <img src="{{  (!empty($editData->image))? url('upload/backend/settings/'.$editData->image):url('upload/no_image.jpg') }}" class="w-16 h-16 border border-white shadow-md mt-1 rounded-md">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="footer_logo" class="block text-sm font-medium leading-6 text-gray-900">Footer Logo</label>
                        <div class="mt-2">
                            <input
                                name="footer_logo"
                                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                                type="file"
                                id="formFile" />
                            <img src="{{  (!empty($editData->footer_logo))? url('upload/backend/settings/'.$editData->footer_logo):url('upload/no_image.jpg') }}" class="w-16 h-16 border border-white shadow-md mt-1 rounded-md">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="footer_logo_title" class="block text-sm font-medium leading-6 text-gray-900">Footer Logo Title</label>
                        <div class="mt-2">
                            <input type="text" name="footer_logo_title" id="footer_logo_title" value="{{ $editData->footer_logo_title }}" autocomplete="family-name" class="mb-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
        </form>
{{--        @else--}}
{{--            <span class="rounded-md px-3 py-2 text-sm text-green-500 font-bold">Already Setuped, You can change any to search the edit menu.</span>--}}
{{--    @endif--}}

@endsection