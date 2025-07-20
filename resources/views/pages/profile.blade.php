@extends('layouts.default')
@section('content')
    <x-container>
        <div class="max-w-md mx-auto mt-10 bg-gray-800 shadow-lg rounded-lg p-8 space-y-6">
            <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST" class="space-y-6">
                @method('PUT')
                @csrf
                <h2 class="text-2xl font-bold text-center text-primary">Profile</h2>
                <div>
                    <label for="user_name" class="block text-sm font-medium text-primary mb-1">Username</label>
                    <input value="{{ $user->user_name ?? old('user_name') }}" type="text" id="user_name" name="user_name"
                        placeholder="Your username"
                        class="w-full text-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    @error('user_name')
                        <div>
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-primary mb-1">Email</label>
                    <input value="{{ $user->email ?? old('email') }}" type="email" id="email" name="email"
                        placeholder="you@example.com"
                        class="w-full text-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    @error('email')
                        <div>
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit"
                        class="w-full text-white bg-blue-600  font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
                        Change
                    </button>
                    {{-- <button x-show="form.loading" type="submit"
                        class="w-full flex items-center justify-center gap-2 bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
                        <svg class="w-5 h-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                        </svg>
                        Processing…
                    </button> --}}
                </div>
            </form>
            <form action="{{ route('password.change.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <p class="text-lg font-medium text-primary mb-1"></p>
                    <label for="current_password" class="block text-sm font-medium text-primary mb-1">Digite sua senha
                        atual</label>
                    <input type="password" id="current_password" name="current_password" placeholder="********"
                        class="w-full text-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div>
                    <label for="new_password" class="block text-sm font-medium text-primary mb-1">Digite sua
                        nova senha</label>
                    <input type="password" id="new_password" name="new_password" placeholder="********"
                        class="w-full text-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div>
                    <label for="new_password_confirmation" class="block text-sm font-medium text-primary mb-1">Confirme sua
                        nova senha</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" placeholder="********"
                        class="w-full text-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                </div>
                @if(session('status'))
                    <div class="text-green-500 bg-green-100 border border-green-300 rounded-md p-4">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class=" text-red-500 bg-red-100 border border-red-300 rounded-md p-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div>
                    <button type="submit"
                        class="w-full text-white bg-blue-600  font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
                        Change Password
                    </button>
                    {{-- <button type="submit"
                        class="w-full flex items-center justify-center gap-2 bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
                        <svg class="w-5 h-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                        </svg>
                        Processing…
                    </button> --}}
                </div>
            </form>
        </div>
    </x-container>
@endsection
