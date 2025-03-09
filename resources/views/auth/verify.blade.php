@extends('layouts.public')

@section('title', 'Verify your email address')

@section('content')
    <div class="flex min-h-full">
        <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <img class="h-10 w-auto" src="/assets/clicksight-logo.svg" alt="Clicksight">
                    <h2 class="mt-8 text-2xl/9 font-roboto-regular tracking-tight text-gray-600">Verify your email</h2>
                </div>

                <div class="mt-4">
                    <div class="text-md font-roboto-regular text-gray-600">

                        @if (session('resent'))

                            <div class="rounded-md bg-green-50 p-4 mb-4">
                                <div class="flex">
                                    <div class="shrink-0">
                                        <svg class="size-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-green-800">Success!</h3>
                                        <div class="mt-2 text-sm text-green-700">
                                            <p>A fresh verification link has been sent.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="text-orange-600 font-roboto-semibold">{{ __('click here to request another') }}</button>.
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
