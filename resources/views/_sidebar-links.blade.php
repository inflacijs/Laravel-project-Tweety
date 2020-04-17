<ul>
    <li><a
            class="font-bold text-lg mb-4 block"
            href="{{route('home')}}"
        >Home</a></li>
    <li><a
            class="font-bold text-lg mb-4 block"
            href="{{route('explore')}}"
        >Explore</a></li>
    
    <li><a
            class="font-bold text-lg mb-4 block"
            href="{{current_user()->path()}}"
        >Profile</a></li>
    <li><a
            class="font-bold text-lg block"
            href="{{route('logout')}}"
        >Log Out</a></li>
</ul>
