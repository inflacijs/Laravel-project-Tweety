<x-app>
    <header class="mb-6" style="position:relative;">
       <div class="relative">
       
            <img 
                src="{{$user->banner}}" 
                alt=""
                width="700"
                height="223"
                class="rounded-lg mb-2"
                
            >
    
            <img 
                src="{{$user->avatar}}" 
                alt="avatar"
                class="rounded-full mr-3 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                width="150"
                style="left:50%"
            >
       </div>

        <div class="flex justify-between items-center">
            <div style="max-width:270px">
                <h2 class="font-bold text-2xl">{{$user->name}}</h2>
                <p class="text-sm">Joined {{$user->created_at->diffForhumans() }}</p>
            </div>
            <div class="flex">
                @can ('edit', $user)
                    <a
                        href="{{$user->path('edit')}}" 
                        class="rounded-full py-2 px-2 text-black border border-gray-300 text-xs px-4 mx-2"
                        >Edit Profile
                    </a>
                @endcan
                <x-follow-button :user="$user"></x-follow-button>
                {{-- Tiek padots follow button components un user mainīgais uz follow buttonu--}}
                
            </div>
        </div>

     

        <p class="text-sm mt-6">
           {{$user->description}}
        </p>
                    
    </header>

@include ('_timeline', [
    'tweets' => $user->tweets
    ])


</x-app>