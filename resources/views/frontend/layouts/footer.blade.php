<!--Footer Section Start-->
<footer class="bg-[#EEF5FF] p-16">
    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-6">
        <div>
            <div class="flex items-center gap-2 pb-6">
                <img src="{{  (!empty($settings_value->footer_logo))? url('upload/backend/settings/'.$settings_value->footer_logo):url('upload/no_image.jpg') }}" alt="" class="w-[20px] h-[20px]"/>
                <h1 class="font-bold">{{ ($countSetting != 0) ? $settings_value->footer_logo_title : 'Software not Setup' }}</h1>
            </div>
            <div class="flex flex-col gap-2">
                <p>Terms of use   |   Privacy</p>
                <p>Copyright by 2008 - {{ date('Y') }} <a href="https://easyfashion.com.bd/" target="_blank" class="text-blue-500 font-bold">Easy IT</a></p>
            </div>
        </div>

        <div>
            <div class="pb-6">
                <h1 class="font-bold">About Us</h1>
            </div>
            <div class="flex flex-col gap-2">
                <p>Support Center</p>
                <p>Customer Support</p>
                <p>About Us</p>
                <p>Copyright</p>
            </div>
        </div>

        <div>
            <div class="pb-6">
                <h1 class="font-bold">Our Information</h1>
            </div>
            <div class="flex flex-col gap-2">
                <p>Return Policy</p>
                <p>Privacy Policy</p>
                <p>Terms & Conditions</p>
                <p>Site Map</p>
            </div>
        </div>

        <div>
            <div class="pb-6">
                <h1 class="font-bold">My Account</h1>
            </div>
            <div class="flex flex-col gap-2">
                <p>Press inquiries</p>
                <p>Social media</p>
                <p>directories</p>
                <p>Images & B-roll</p>
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <div class="pb-6">
                <h1 class="font-bold">Connect</h1>
            </div>
            <div class="flex items-center gap-2">
                <img src="{{ url('./assets/facebook.png') }}" alt="">
{{--                @dd($countSetting)--}}
                <a href="{{ ($countSetting > 0 && $settings_value->facebook != null) ? $settings_value->facebook : '#' }}" {{ ($countSetting > 0 && $settings_value->facebook != null) ? 'target="_blank"' : '#' }}>Facebook</a>
            </div>
            <div class="flex items-center gap-2">
                <img src="{{ url('./assets/twitter.png') }}" alt="">
                <a href="{{ ($countSetting > 0 && $settings_value->twitter != null) ? $settings_value->twitter : '#' }}" {{ ($countSetting > 0 && $settings_value->twitter != null) ? 'target="_blank"' : '#' }}>Twitter</a>
            </div>
            <div class="flex items-center gap-2">
                <img src="{{ url('./assets/github.png') }}" alt="">
                <a href="{{ ($countSetting > 0 &&  $settings_value->github != null) ? $settings_value->github : '#' }}" {{ ($countSetting > 0 &&  $settings_value->github != null) ? 'target="_blank"' : '#' }}>GitHub</a>
            </div>
            <div class="flex items-center gap-2">
                <img src="{{ url('./assets/dribble.png') }}" alt="">
                <a href="{{ ($countSetting > 0 && $settings_value->dribble != null) ? $settings_value->dribble : '#' }}" {{ ($countSetting > 0 && $settings_value->dribble != null) ? 'target="_blank"' : '#' }}>Dribble</a>
            </div>
        </div>

    </div>
</footer>
<!--Footer Section END-->
