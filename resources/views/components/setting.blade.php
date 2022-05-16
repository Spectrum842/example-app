@props(['heading'])
<section class="py-8 max-w-4xl mx-auto">
    <h2 class="text-lg font-bold mb-8 pb-2 border-n">
        {{ ucwords($heading) }}
    </h2>
    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4>Links</h4>
            <ul>
                <li>
                    <a href="{{ route('admin.create') }}" class="{{request()->is('admin/posts/create') ? 'text-blue-500' : ''}}">New Post</a>
                </li>

                <li>
                    <a href="{{ route('admin.posts') }}" class="{{request()->is('admin/posts') ? 'text-blue-500' : ''}}">All posts</a>
                </li>

            </ul>
        </aside>
        <main class="flex-1">
            <x-panel class="max-w-sm mx-auto ">
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
