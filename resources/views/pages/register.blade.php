@extends("layouts.unauthenticated")
@section("content")
    <x-container>
        <form
            action="{{ route("auth.register.store") }}"
            method="POST"
            class="max-w-md mx-auto mt-10 bg-gray-800 shadow-lg rounded-lg p-8 space-y-6"
        >
            @csrf
            <h2 class="text-2xl font-bold text-center text-orange-500">
                Register
            </h2>
            <div>
                <label
                    for="user_name"
                    class="block text-sm font-medium text-orange-500 mb-1"
                >
                    Username
                </label>
                <input
                    value="{{ old('user_name') ?? ''}}"
                    type="text"
                    id="user_name"
                    name="user_name"
                    placeholder="Your username"
                    class="w-full text-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
            </div>
            <div>
                <label
                    for="email"
                    class="block text-sm font-medium text-orange-500 mb-1"
                >
                    Email
                </label>
                <input
                    value="{{ old('email') ?? ''}}"
                    type="email"
                    id="email"
                    name="email"
                    placeholder="you@example.com"
                    class="w-full text-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
            </div>
            <div>
                <label
                    for="password"
                    class="block text-sm font-medium text-orange-500 mb-1"
                >
                    Password
                </label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="********"
                    class="w-full text-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
            </div>
            <div>
                <label
                    for="password_confirmation"
                    class="block text-sm font-medium text-orange-500 mb-1"
                >
                    Confirm Password
                </label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="********"
                    class="w-full text-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
            </div>
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
                 <a href="{{ route('login') }}" class="text-sm text-blue-400 hover:underline">
                    Já possui conta?
                </a>
            </div>
            <div>
                <button
                    type="submit"
                    class="w-full text-white bg-blue-600 font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200"
                >
                    Login
                </button>
            </div>
        </form>
    </x-container>
@endsection
