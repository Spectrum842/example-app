<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register ! </h1>
            <form method="POST" action="{{route('register')}}" class="mt-10">
                <!-- csrf expands to a hidden input to check behind the scenes -->
                @csrf
                <div class="mb-6">
                    <x-form.input name="name" />
                </div>

                <div class="mb-6">
                    <x-form.input name="username" />
                </div>

                <div class="mb-6">
                    <x-form.input name="email" type="email" autocomplete="username" />
                </div>

                <div class="mb-6">
                    <x-form.input name="password" type="password" autocomplete="new-password" />
                </div>

                <div class="mb-6">
                    <x-form.button>Register</x-form.button>
                </div>

            </form>
        </main>
    </section>
</x-layout>
