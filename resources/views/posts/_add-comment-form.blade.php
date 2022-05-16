@auth
    <x-panel>
        <form method="post" action="/posts/{{ $post->slug}}/comments" class="">
            @csrf
            <header class="flex item-center">
                <img src="{{ asset('storage/'.$post->thumbnail) }}"
                    alt=""
                    width="40"
                    height="40"
                    class="rounded-full"/>
                <h2 class="ml-4">Wanna participate ? </h2>
            </header>
            <div class="mt-6">
                <x-form.textarea name="body" />
                <x-form.error name="body" />
                </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-form.button>Post</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p>
        <a href="{{ route('register')}}" class="hover:underline">Register</a>
        or
        <a href="{{ route('login')}}">login</a>to leave a comment.
    </p>
@endauth
