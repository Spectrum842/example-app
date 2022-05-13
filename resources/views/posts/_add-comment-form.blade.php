@auth
    <x-panel>
        <form method="post" action="/posts/{{ $post->slug}}/comments" class="">
            @csrf
            <header class="flex item-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" 
                    alt="" 
                    width="40" 
                    height="40" 
                    class="rounded-full"/>
                <h2 class="ml-4">Wanna participate ? </h2>
            </header>
            <div class="mt-6">
                <textarea 
                    name="body" 
                    class="w-full text-sm focus:outline-none focus:ring" 
                    rows="5" 
                    placeholder="Quick thing, something to say"
                    required></textarea>
                @error('body')
                    <span class="text-xs text-red-500">{{ $message }} </span>
                @enderror
                </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-submit-button>Post</x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p>
        <a href="/register" class="hover:underline">Register</a>
        or
        <a href="/login">login</a>to leave a comment.
    </p>
@endauth