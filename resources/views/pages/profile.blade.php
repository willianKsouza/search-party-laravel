@extends("layouts.default")
@section("content")
    <x-container>
        <div
            class="max-w-md mx-auto mt-10 bg-background shadow-lg rounded-lg p-8 space-y-6"
        >
            @if (session("success"))
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-init="setTimeout(() => (show = false), 4000)"
                    class="text-green-500 bg-green-100 border border-green-300 rounded-md p-4"
                >
                    {{ session("success") }}
                </div>
            @endif

            <x-form
                action="{{ route('user.update', ['id' => $user->id]) }}"
                method="POST"
                class="space-y-6"
            >
                @method("PUT")
                @csrf
                <h2 class="text-2xl font-bold text-center text-primary">
                    {{ __("pages.my_profile.title") }}
                </h2>
                <div>
                    <x-form.label for="user_name">
                        {{ __("pages.my_profile.labels.user_name") }}
                    </x-form.label>
                    <x-form.input
                        value="{{ $user->user_name ?? old('user_name') }}"
                        type="text"
                        id="user_name"
                        name="user_name"
                    />
                    @error("user_name")
                        <x-form.error>
                            {{ $message }}
                        </x-form.error>
                    @enderror
                </div>
                <div>
                    <x-form.label for="email">
                        {{ __("pages.my_profile.labels.email") }}
                    </x-form.label>
                    <x-form.input
                        value="{{ $user->email ?? old('email') }}"
                        type="email"
                        id="email"
                        name="email"
                    />
                    @error("email")
                        <x-form.error>
                            {{ $message }}
                        </x-form.error>
                    @enderror
                </div>
                <div>
                    <x-form.button
                        type="submit"
                        class="w-full bg-primary text-white"
                    >
                        {{ __("pages.my_profile.buttons.change") }}
                    </x-form.button>
                </div>
            </x-form>
            <x-form
                action="{{ route('password.change.store') }}"
                method="POST"
                class="space-y-6"
            >
                @csrf
                <div>
                    <x-form.label
                        for="current_password"
                        class="block text-sm font-medium text-primary mb-1"
                    >
                        {{ __("pages.my_profile.labels.current_password") }}
                    </x-form.label>
                    <x-form.input
                        type="password"
                        id="current_password"
                        name="current_password"
                        placeholder="********"
                    />
                </div>
                <div>
                    <x-form.label for="new_password">
                        {{ __("pages.my_profile.labels.new_password") }}
                    </x-form.label>
                    <x-form.input
                        type="password"
                        id="new_password"
                        name="new_password"
                        placeholder="********"
                    />
                </div>
                <div>
                    <x-form.label for="new_password_confirmation">
                        {{ __("pages.my_profile.labels.confirm_new_password") }}
                    </x-form.label>
                    <x-form.input
                        type="password"
                        id="new_password_confirmation"
                        name="new_password_confirmation"
                        placeholder="********"
                    />
                </div>
                @if (session("status"))
                    <div
                        class="text-green-500 bg-green-100 border border-green-300 rounded-md p-4"
                    >
                        {{ session("status") }}
                    </div>
                @endif

                @if ($errors->any())
                    <div
                        class="text-red-500 bg-red-100 border border-red-300 rounded-md p-4"
                    >
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div>
                    <x-form.button
                        type="submit"
                        class="w-full bg-primary text-white"
                    >
                        {{ __("pages.my_profile.buttons.change_password") }}
                    </x-form.button>
                </div>
            </x-form>
        </div>
    </x-container>
@endsection
