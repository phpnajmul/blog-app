@extends('backend.layouts.master_admin')
@section('content')
    <div class="bg-blue-50 text-xl text-gray-500 p-4 mb-4 rounded-md">
        <h1>Section Menu<span> > </span>About</h1>
    </div>
    <div class="bg-white shadow-md py-6 px-6 rounded-md">
        <div class="flex justify-between items-center mb-2">
            <div>
                <h2 class="text-base font-semibold leading-6 text-gray-900">About Information</h2>
                <p class="mt-1 text-sm leading-5 text-gray-600 mb-4">You can change your website everything.</p>
            </div>
            <div>
                <a href="{{ route('create.about') }}" class="{{ ($count_about > 0) ? 'hidden' : '' }} bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Create</a>
                <a href="{{ route('edit.about') }}" class="{{ ($count_about == 0) ? 'hidden' : '' }} bg-transparent hover:bg-sky-500 text-sky-600 font-semibold hover:text-white py-2 px-4 border border-sky-500 hover:border-transparent rounded">Edit</a>
            </div>
        </div>

        <table class="md:min-w-full md:w-3/4 w-full divide-y divide-gray-200 my-2">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase tracking-wider">
                    SL
                </th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Title
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Address
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Map Url
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Added By
                </th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Action
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">

            @foreach($allData as $key => $value)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm text-gray-500">
                        {{ $key+1 }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm text-gray-500">
                        {{ $value->map_title }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm text-gray-500">
                        {{ $value->address }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm text-gray-500">
                        @if($count_about > 0 && $value->map_url != null)
                            <a href="{{ route('map.details.about',['id' => $value->id]) }}" class="text-blue-700 font-semibold py-2 px-4 ">See details</a>
                        @else
                            <span class="text-red-600 font-semibold">Not Found</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                        {{ $value['users']['name'] }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <a href="{{ route('active.about',['id'=>$value->id,'active_value'=> '1']) }}" class="{{ ($get_status == 1) ? 'hidden' : '' }} bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Active</a>
                        <a href="{{ route('inactive.about',['id'=>$value->id,'inactive_value'=> '0']) }}" class="{{ ($get_status == 0) ? 'hidden' : '' }} bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Inactive</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>

@endsection
