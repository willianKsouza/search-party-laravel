@extends("layouts.unauthenticated")
@section("content")
    <x-container>
        <x-form
            action="{{ route('auth.register.store') }}"
            method="POST"
            class="max-w-md mx-auto mt-10 bg-background shadow-lg rounded-lg p-8 space-y-6"
        >
            @csrf
            <h2 class="text-2xl font-bold text-center text-primary">
                {{ __("pages.register.register") }}
            </h2>

            <x-form.label for="user_name">
                {{ __("pages.register.labels.user_name") }}
            </x-form.label>
            <x-form.input
                value="{{ old('user_name') }}"
                name="user_name"
                placeholder="Example007"
                required
            />
            <x-form.label for="email">
                {{ __("pages.register.labels.email") }}
            </x-form.label>
            <x-form.input
                value="{{ old('email') }}"
                name="email"
                placeholder="you@example.com"
                required
            />
            <x-form.label for="password">
                {{ __("pages.register.labels.password") }}
            </x-form.label>
            <x-form.input
                name="password"
                type="password"
                placeholder="*********"
                required
            />
            <x-form.label for="password_confirmation">
                {{ __("pages.register.labels.confirm_password") }}
            </x-form.label>
            <x-form.input
                name="password_confirmation"
                type="password"
                placeholder="*********"
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
            <div>
                <a
                    href="{{ route("login") }}"
                  class="text-sm text-primary hover:underline"
                >
                     {{ __("pages.register.already_have_account") }}
                </a>
            </div>
            <x-form.button
                type="submit"
                class="w-full text-white bg-primary font-semibold py-2 px-4 rounded-md hover:bg-background-hover transition duration-200"
            >
                {{ __("pages.login.log_in") }}
            </x-form.button>
        </x-form>
    </x-container>
@endsection
