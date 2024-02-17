@extends('backend.layouts.master_admin')
@section('content')
    <div class="bg-blue-50 text-xl text-gray-500 p-4 mb-4 rounded-md">
        <h1>Post Menu<span> > </span>Post List</h1>
    </div>
    <div class="bg-white shadow-md py-6 px-6 rounded-md">
        <div class="flex justify-between items-center mb-2">
            <div>
                <h2 class="text-base font-semibold leading-6 text-gray-900">Category Information</h2>
                <p class="mt-1 text-sm leading-5 text-gray-600 mb-4">You can change your website everything.</p>
            </div>
            <div>
                <a href="{{ route('create.post') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Create</a>
            </div>
        </div>

        <table class="md:min-w-full md:w-3/4 w-full divide-y divide-gray-200 my-2">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase tracking-wider">
                    SL
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Category
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Image
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Headline
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Description
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Full Content
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
                        {{ $value['category']['category_name'] }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm text-gray-500">
                        <img src="{{ (!empty($value->image)? url('upload/backend/post',$value->image) : url('upload/no_image.jpg')) }}" class="w-14 h-10 border border-white shadow-md mt-1 rounded-md">
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-wrap text-left text-sm text-gray-500">
                        {{ $value->headline }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-wrap text-left text-sm text-gray-500">
                        {{ $value->description }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm text-gray-500">
                        @if(count($allData) > 0 && $value->full_content != null)
                            <a href="#" class="text-blue-700 font-semibold py-2 px-4 ">See details</a>
                        @else
                            <span class="text-red-600 font-semibold">Not Found</span>
                        @endif
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <a href="{{ route('edit.post',$value->id) }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Edit</a>
                        <a href="{{ route('delete.post',$value->id) }}" class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection
