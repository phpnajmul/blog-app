@extends('frontend.layouts.master_frontend')

@section('content')

<!--Hero Section Start-->
<section class="container mx-auto px-16 py-20 flex flex-col md:flex-row gap-6 justify-between items-center">
    <div>
{{--        //@dd($countSetting)--}}
        <h1 class="text-md sm:text-md md:text-5xl font-bold pb-6"><span class="text-primary">{{ ($countSetting != 0) ? $settings_value->heading : 'Software not Setup' }}</span></h1>
        <h2 class="text-xl sm:text-xl md:text-7xl font-bold text-secondary pb-6">{{ ($countSetting != 0) ? $settings_value->title : 'Software not Setup' }}</h2>
        <p class="font-bold">{{ ($countSetting != 0) ? $settings_value->cholak : 'Software not Setup' }}</p>
        <div class="flex gap-6 items-center pt-8">
            <button class="btn-secondary">Get Token</button>
            <div class="flex gap-2 items-center">
                <span class=font-bold>White paper</span>
                <img src="./assets/play.png" alt="play"/>
            </div>
        </div>
    </div>
    <div>
        <img src="{{  (!empty($settings_value->image))? url('upload/backend/settings/'.$settings_value->image):url('upload/no_image.jpg') }}" alt="Najmul Hossain" class="w-80 h-80 rounded-full border-4 border-primary"/>
    </div>
</section>
<!--Hero Section END-->

<!--Category Section Start-->
<section class="bg-[#EEF5FF] p-20">
    <div class="text-center">
        <p class="text-primary font-bold">Post Category</p>
        <h1 class="pb-8">All Category List</h1>
        <img src="./assets/down.png" alt="" class="mx-auto"/>
    </div>
    <div class="container mx-auto grid grid-cols-1 gap-y-8 sm:grid-cols-2 md:grid-cols-3 bg-white p-20">

        @foreach($allData as $value)
            <div class="text-center flex flex-col gap-4">
                <img src="{{  (!empty($value->logo))? url('upload/backend/category/'.$value->logo):url('upload/no_image.jpg') }}" alt="" class="mx-auto"/>
                <h1 class="font-bold text-xl">{{ $value->headline }}</h1>
                <p>{{ $value->description }}</p>
                <a href="{{ route('cat.wise.post.view',$value->id) }}" class="text-primary font-bold">
                    see more <span>></span>
                </a>
            </div>
        @endforeach
    </div>

    <div class="max-w-5xl mx-auto my-6 grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-primary">254</h1>
            <p class="text-gray-400">Successful Project</p>
        </div>

        <div class="text-center">
            <h1 class="text-3xl font-bold text-primary">3783</h1>
            <p class="text-gray-400">People Impacted</p>
        </div>

        <div class="text-center">
            <h1 class="text-3xl font-bold text-primary">8M</h1>
            <p class="text-gray-400">Money Donated</p>
        </div>

        <div class="text-center">
            <h1 class="text-3xl font-bold text-primary">60+</h1>
            <p class="text-gray-400">Volunteer Involved</p>
        </div>
    </div>
</section>
<!--Category Section END-->

<!--States Section Start-->
<section>
    <div class="max-w-5xl mx-auto text-center py-20">

        @if($count_about > 0 && $get_about->map_title != null)
            <h1 class="pb-6 text-3xl">{{ $get_about->map_title }}</h1>
        @else
            <h1 class="pb-6 text-3xl">Those states we provide donation</h1>
        @endif

        @if($count_about > 0 && $get_about->address != null)
            <P class="pb-10">{{ $get_about->address }}</P>
        @else
            <P class="pb-10">We are organizing a program on January 20, 2019 to help the homeless people. Our aim is to provide them a specific place to live.</P>
        @endif

        @if($count_about > 0 && $get_about->map_url != null)
            <iframe src="{{ $get_about->map_url }}" class="w-full h-[450px]" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        @else
            <img src="./assets/states.png" alt="" />
        @endif
    </div>
    <div></div>
</section>
<!--States Section END-->

<!--Calling Section Start-->
<section class="container mx-auto py-20 text-center">
    <h1 class="font-bold text-xl pb-6">Introducing video calling support</h1>
    <p class="pb-6">Every email, web page, and social media post makes an impression on your customers. With our software you can be confident it's impression.</p>
    <button class="text-primary font-bold capitalize">
        Explore details <span>></span>
    </button>

    <div class="relative">
        <img src="./assets/meeting.png" alt="" class="mx-auto" />

        <div class="md:absolute w-full top-40 left-36 md:w-[280px] bg-[#FABF62] p-10 rounded-tl-[20px] rounded-tr-[20px] rounded-bl-[20px] text-white font-bold text-left shadow-lg">
            <p>Hi, I’m Andry. Let me know what can I do for you</p>
        </div>

        <div class="md:absolute w-full bottom-40 right-36 md:w-[280px] bg-white p-10 rounded-tl-[20px] rounded-tr-[20px] rounded-br-[20px] font-bold text-left shadow-lg text-[#FABF62]">
            <p>your personal support assistance</p>
        </div>

    </div>
</section>
<!--Calling Section END-->

<!--Contact Us Section Start-->
<section class="container mx-auto py-20">
    <div>
        <img src="./assets/team.png" alt="" class="mx-auto">
        <div class="relative bg-secondary max-w-6xl mx-auto flex flex-col md:flex-row justify-between gap-4 text-white p-16 rounded-lg items-center overflow-hidden">
            <h1 class="text-2xl font-bold text-center md:text-left">Do you have any question? Feel free to contact us</h1>
            <div></div>
            <button class="bg-white text-secondary font-bold rounded-md px-16 py-3 z-10">
                CONTACT US NOW
            </button>
            <img src="./assets/shape.png" alt="" class="absolute left-10 md:left-1/2">
        </div>
    </div>
</section>
<!--Contact Us Section END-->
@endsection
