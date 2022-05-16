<x-layout>
    <x-setting heading="Publish new Post">
        <form method="post" action="{{route('admin.store')}}" enctype="multipart/form-data">
            @csrf
           <x-form.input name="title" />
           <x-form.input name="slug" />
           <x-form.input name="thumbnail" type="file" />
           <x-form.textarea name="excerpt" />
           <x-form.textarea name="body" />

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
                        {{old('category_id') == $category->id ? 'selected' : ''}}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach

                </select>

                <x-form.error name="category" />
            </div>

            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>

</x-layout>
