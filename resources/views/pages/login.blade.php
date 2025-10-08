@extends("layouts.unauthenticated")
@section("content")
    <x-container class="grow">
        <x-form
            action="{{ route('auth.login.store') }}"
            method="POST"
            class="max-w-md mx-auto mt-10 bg-background shadow-lg rounded-lg p-8 space-y-6"
        >
            @csrf
            <h2 class="text-2xl font-bold text-center text-primary">Login</h2>
            <x-form.label for="email">
                {{ __("pages.login.labels.email") }}
            </x-form.label>
            <x-form.input
                value="{{ old('email') }}"
                type="email"
                name="email"
                placeholder="you@example.com"
                required
            />
            <x-form.label
                for="password"
                class="block text-sm font-medium text-primary mb-1"
            >
                {{ __("pages.login.labels.password") }}
            </x-form.label>
            <x-form.input
                type="password"
                id="password"
                name="password"
                placeholder="********"
                required
            />
            @if ($errors->any())
                <div class="space-y-2">
                    @foreach ($errors->all() as $error)
                        <x-form.error>
                            {{ $error }}
                        </x-form.error>
                    @endforeach
                </div>
            @endif
            <div class="flex">
                <input type="checkbox" name="remember" class="h-4 w-4" />
                <x-form.label for="remember" class="ml-2">
                    {{ __("pages.login.labels.remember") }}
                </x-form.label>
            </div>
            <div class="flex flex-col gap-4">
                <a
                    href="{{ route("password.request") }}"
                    class="text-sm text-primary hover:underline"
                >
                    {{ __("pages.login.forgot_password") }}
                </a>
                <a
                    href="{{ route("auth.register.show") }}"
                    class="text-sm text-primary hover:underline"
                >
                    {{ __("pages.login.dont_have_account") }}
                </a>
            </div>
            <div>
                <x-form.button
                    x-show="!form.loading"
                    type="submit"
                    class="w-full text-white bg-primary font-semibold py-2 px-4 rounded-md hover:bg-background-hover transition duration-200"
                >
                    {{ __("pages.login.log_in") }}
                </x-form.button>
            </div>
        </x-form>
    </x-container>
@endsection
