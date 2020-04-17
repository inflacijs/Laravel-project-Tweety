@if(current_user()->isNot($user))
    <form method="POST" action="{{ route('follow', $user->username)}}">
        @csrf

        <button 
            type="submit"
            class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white text-xs px-4"
        >    
            {{ current_user()->following($user) ? 'Unfollow Me' : 'Follow Me'}}
        </button>

    </form>
@endif