<x-layout>
    <x-setting :heading="'Edit Post : ' .$post->title">
        <form method="post" action="{{route('admin.update', ['post' => $post->id])}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="title" value="{{ old('title', $post->title) }}" />
            <x-form.input name="slug" value="{{ old('slug', $post->slug) }}" />
            <div class="flex mt-6">
                <div class="flex-1">

                    <x-form.input name="thumbnail" type="file" value="{{ old('thumbnail', $post->thumbnail) }}" width="100" />
                    <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="" class="rounded-xl" />
                </div>
            </div>
            <x-form.textarea name="excerpt" >{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body" >{{ old('body', $post->body) }}</x-form.textarea>

            <div class="mb-6">
                <x-form.label name="category" />

                <select class="border border-gray-400 p-2 w-full"
                        name="category_id"
                        id="category_id"
                        required>
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp
                    <option value="">Choose a category</option>
                    @foreach ($categories as $category)
                        <option
                        value="{{ $category->id }}"
                        {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach

                </select>

                <x-form.error name="category" />
            </div>

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>

</x-layout>
