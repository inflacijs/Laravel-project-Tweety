<div class="border border-blue-400 rounded-lg py-6 px-8">
    <form method="POST" action="/tweety/public/tweets" enctype="multipart/form-data">
        @csrf
       

        @livewire('charater-counter')
        
        <div class="mb-6">
            
                <input class="border border-gray-400 p-2 w-full"
                       type="file"
                       name="image"
                       id="image"         
                >
                @error('image')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
           
        </div>

  

      

        <hr class="my-4">
         
        <footer class="flex justify-between">
            <img 
                 src="{{auth()->user()->avatar}}"
                 alt="avatar"
                 class="rounded-full mr-3"
                 width="50"
                 height="50"
             >

            <button 
                type="submit" 
                class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm py-2 px-2 text-white"
                >Tweet-a-roo!
            </button>

        </footer>  
    </form>

    

    @error( 'body')
        <p class="text-red-500 text-sm">{{$message}}</p>
    @enderror
</div>




