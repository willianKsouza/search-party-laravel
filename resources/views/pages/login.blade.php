@extends("layouts.unauthenticated")
@section("content")
    <x-container class="grow">
        <x-form
            action="{{ route('auth.login.store') }}"
            method="POST"
            class="max-w-md mx-auto mt-10 bg-background shadow-lg rounded-lg p-8 space-y-6"
        >
            @csrf
            <h2 class="text-2xl font-bold text-center text-orange-500">
                Login
            </h2>
            <x-form.label for="email">Email</x-form.label>
            <x-form.input
                value="{{ old('email') }}"
                type="email"
                id="email"
                name="email"
                placeholder="you@example.com"
            />
            <x-form.label
                for="password"
                class="block text-sm font-medium text-orange-500 mb-1"
            >
                Password
            </x-form.label>
            <x-form.input
                type="password"
                id="password"
                name="password"
                placeholder="********"
            />
            @error("error")
                <x-form.error>
                    {{ $message }}
                </x-form.error>
            @enderror
            <div class="flex items-center">
                <input
                    type="checkbox"
                    name="remember"
                    class="text-blue-600 focus:ring-blue-500 border-gray-300 rounded h-4 w-4"
                />
                <x-form.label for="remember" class="ml-2">
                    Lembrar-me
                </x-form.label>
            </div>
            <div class="flex flex-col gap-4">
                <a
                    href="{{ route("password.request") }}"
                    class="text-sm text-primary hover:underline"
                >
                    Esqueceu a senha?
                </a>
                <a
                    href="{{ route("auth.register.show") }}"
                    class="text-sm text-primary hover:underline"
                >
                    Não possui conta?
                </a>
            </div>
            <div>
                <x-form.button
                    x-show="!form.loading"
                    type="submit"
                    class="w-full text-white bg-primary font-semibold py-2 px-4 rounded-md hover:bg-background-hover transition duration-200"
                >
                    Entrar
                </x-form.button>
            </div>
        </x-form>
    </x-container>
@endsection
