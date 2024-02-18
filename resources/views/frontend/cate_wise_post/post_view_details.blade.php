@extends('frontend.layouts.master_frontend')
@section('content')

    <!-- All Post View Start-->
    <section class="bg-[#EEF5FF] p-20">
        <div class="text-left">
            <p class="text-black font-bold mb-2">Post View Details</p>
        </div>
            <div class="container mx-auto flex gap-4 px-10 py-4 bg-white">
                <div class="w-[250px] h-[250px] p-4">
                    <label class="text-gray-400 font-semibold">Posted Image</label>
                    <img src="{{  (!empty($view_post_details->image))? url('upload/backend/post/'.$view_post_details->image):url('upload/no_image.jpg') }}" alt="" class="shadow-md rounded-md"/>
                </div>
                <div class="p-4 w-full h-full">
                    <h1 class="font-bold text-xl text-left">Headline: {{ $view_post_details->headline }}</h1>
                    <p class="text-gray-600 font-semibold mb-4 text-left">Description: {{ $view_post_details->description }}</p>
                    <p class="text-justify">{{ $view_post_details->full_content }}</p>
                    <p class="text-sm text-gray-400 text-left mt-10 mb-0">Posted on: {{ \Carbon\Carbon::parse($view_post_details->created_at)->diffForHumans() }}</p>
                </div>
            </div>
    </section>
    <!--All Post View END-->

@endsection
