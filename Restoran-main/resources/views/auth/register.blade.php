<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <h1 class="text-xl font-bold text-yellow-500 m-0 flex items-center">
                <i class="fa fa-utensils me-3"></i>Register
            </h1>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" class="text-yellow-500" />
                <x-input id="name" class="block mt-1 w-full rounded-md focus:ring-2 focus:ring-yellow-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" class="text-yellow-500" />
                <x-input id="email" class="block mt-1 w-full rounded-md focus:ring-2 focus:ring-yellow-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" class="text-yellow-500" />
                <x-input id="password" class="block mt-1 w-full rounded-md focus:ring-2 focus:ring-yellow-500" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-yellow-500" />
                <x-input id="password_confirmation" class="block mt-1 w-full rounded-md focus:ring-2 focus:ring-yellow-500" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-label for="terms" class="text-yellow-500">
                    <div class="flex items-center">
                        <x-checkbox name="terms" id="terms" required class="rounded border-yellow-300 text-yellow-600 shadow-sm focus:ring-yellow-500" />

                        <div class="ms-2 text-sm text-gray-600">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-yellow-500 hover:text-yellow-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">'.__('Terms of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-yellow-500 hover:text-yellow-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-label>
            </div>
            @endif

            <div class="flex items-center justify-end mt-4 gap-1">
                <a class="underline text-sm text-yellow-500 hover:text-yellow-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4 bg-yellow-500 hover:bg-yellow-600 focus:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-500">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
