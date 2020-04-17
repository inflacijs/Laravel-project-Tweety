<div class="bg-gray-200 border border-gray-300 rounded-lg py-4 px-6">
    <h3 class="font-bold text-xl mb-4 lg:px-6">Following</h3>

    <ul>
        
        @forelse (current_user()->follows as $user)

        
    <li class="{{$loop->last ? '' : 'mb-4'}}">
                <div >
                    <a href="{{route('profile', $user)}}" class="flex items-center text-sm">
                        <img 
                            src="{{$user->avatar}}" 
                            alt="avatar"
                            class="rounded-full mr-3"
                            width="40"
                            height="40"
                        >
                        {{$user->name}}
                    </a>
                </div>
            </li>
            @empty
                <p class="p-4">No friends yet.</p>
        @endforelse
    </ul>
</div>