@extends('layouts.public')

@section('title', 'Login to your account')

@section('content')
    <div class="flex min-h-full">
        <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <img class="h-10 w-auto" src="/assets/clicksight-logo.svg" alt="Clicksight">
                    <h2 class="mt-8 text-2xl/9 font-roboto-regular tracking-tight text-gray-600">Sign in to your account</h2>
                    <p class="mt-2 text-sm/6 text-gray-500">
                        Don't have one?
                        <a href="/register" class="font-semibold text-orange-600 hover:text-orange-500">Register for free</a>.
                    </p>
                </div>

                <div class="mt-10">
                    <div>
                        <form method="POST" action="{{ route('login') }}" class="space-y-6">
                            @csrf

                            <div>
                                <label for="email" class="block text-sm/6 font-roboto-regular text-gray-900">Email address</label>
                                <div class="mt-2">
                                    <input type="email" name="email" id="email" autocomplete="email" value="{{ old('email') }}" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-orange-600 sm:text-sm/6 @error('email') outline-red-600 @else outline-gray-300 @enderror">

                                    @error('email')
                                    <span class="text-red-600 font-roboto-regular text-xs mt-2" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror

                                </div>
                            </div>

                            <div>
                                <label for="password" class="block text-sm/6 font-roboto-regular text-gray-900">Password</label>
                                <div class="mt-2">
                                    <input type="password" name="password" id="password" autocomplete="new-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-orange-600 sm:text-sm/6 @error('password') outline-red-600 @else outline-gray-300 @enderror">

                                    @error('password')
                                    <span class="text-red-600 font-roboto-regular text-xs mt-2" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror

                                </div>
                            </div>

                            <div>
                                <button type="submit" class="flex w-full justify-center rounded-md bg-orange-600 px-3 py-1.5 text-sm/6 font-roboto-regular text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">Sign in</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="relative hidden w-0 flex-1 lg:block">
            <img class="absolute inset-0 size-full object-cover" src="https://images.unsplash.com/photo-1496917756835-20cb06e75b4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80" alt="">
        </div>
    </div>
@endsection
