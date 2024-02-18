@extends('frontend.layouts.master_frontend')

@section('content')

    <!-- All Post View Start-->
    <section class="bg-[#EEF5FF] p-20">
        <div class="text-center">
            <p class="text-primary font-bold mb-2">Category wise post</p>
        </div>
        @if(count($cat_wise_post) > 0)
            <div class="container mx-auto grid grid-cols-1 gap-y-8 gap-x-8 sm:grid-cols-2 md:grid-cols-3 bg-white p-20">
                @foreach($cat_wise_post as $value)
                    <a href="{{ route('post.view.details',$value->id) }}">
                        <div class="text-center flex flex-col p-4 rounded-md gap-4 shadow-md border border-gray-100">
                            <img src="{{  (!empty($value->image))? url('upload/backend/post/'.$value->image):url('upload/no_image.jpg') }}" alt="" class="mx-auto rounded-md h-[150px] w-[200px]"/>
                            <h1 class="font-bold text-xl">{{ $value->headline }}</h1>
                            <p>{{ $value->description }}</p>
                            <p class="text-sm text-gray-400 text-center">Posted on: {{ \Carbon\Carbon::parse($value->created_at)->diffForHumans() }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="container mx-auto grid grid-cols-1 gap-y-8 gap-x-8 sm:grid-cols-2 md:grid-cols-1 bg-white p-20">
                <p class="text-center text-red-600 font-semibold">Post Not Found</p>
            </div>
        @endif

    </section>
    <!--All Post View END-->

@endsection
