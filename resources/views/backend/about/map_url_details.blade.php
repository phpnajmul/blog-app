@extends('backend.layouts.master_admin')
@section('content')
    <div class="bg-blue-50 text-xl text-gray-500 p-4 mb-4 rounded-md">
        <h1>Section Menu<span> > </span>About</h1>
    </div>
    <div class="bg-white shadow-md py-6 px-6 rounded-md">
        <div class="flex justify-between items-center mb-2">
            <div>
                <h2 class="text-base font-semibold leading-6 text-gray-900">Map URL Information</h2>
                <p class="mt-1 text-sm leading-5 text-gray-600 mb-4">You can change your website everything.</p>
            </div>
        </div>

        <table class="md:min-w-full md:w-3/4 w-full divide-y divide-gray-200 my-2">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase tracking-wider">
                    Map URL
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-wrap text-left text-sm text-blue-500">
                       {{ $get_map_url->map_url }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
