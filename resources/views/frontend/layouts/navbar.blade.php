<!--Navigation Start-->
<nav class="container mx-auto flex gap-4 items-center py-2 flex-col md:flex-row">
    <img src="{{  (!empty($settings_value->logo))? url('upload/backend/settings/'.$settings_value->logo):url('upload/no_image.jpg') }}" alt="Logo" class="w-[60px] h-[60px] rounded-full border-2 border-primary" />
    <div class="w-full flex justify-between gap-6 items-center flex-col md:flex-row">
        <div class="flex items-center gap-4 flex-col md:flex-row">
            <a href="{{ route('/') }}">Home</a>
            <a href="#">Channel</a>
            <a href="#">Supports</a>
            <a href="#">About</a>
            <img src="{{ url('./assets/search.png') }}" alt="Search" />
        </div>

        <div class="flex gap-4 items-center">
            <div class="flex items-center gap-2">
                <img src="{{ url('./assets/lock.png') }}" alt="lock" />
                <span>Login</span>
            </div>
            <button class="bg-primary px-8 py-3 rounded-md text-white">Donate Now</button>
        </div>
    </div>
</nav>
<!--Navigation END-->
