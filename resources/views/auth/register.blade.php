<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="w-20 h-20 mb-3 rounded-full shadow-lg">
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <div>
                <x-label for="roll_no" value="{{ __('Roll No') }}" />
                <x-input id="roll_no" class="block mt-1 w-full" type="text" name="roll_no" :value="old('roll_no')" required />
            </div>
            
            <div>
                <x-label for="pr_no" value="{{ __('PR No') }}" />
                <x-input id="pr_no" class="block mt-1 w-full" type="text" name="pr_no" :value="old('pr_no')" required />
            </div>
            
            <div>
                <x-label for="ph_no" value="{{ __('Phone No') }}" />
                <x-input id="ph_no" class="block mt-1 w-full" type="text" name="ph_no" :value="old('ph_no')" required />
            </div>
            
            <div>
                <x-label for="address" value="{{ __('Address') }}" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            </div>
            
            <div>
                <x-label for="school_10th_name" value="{{ __('School 10th Name') }}" />
                <x-input id="school_10th_name" class="block mt-1 w-full" type="text" name="school_10th_name" :value="old('school_10th_name')" required />
            </div>
            
            <div>
                <x-label for="school_10th_address" value="{{ __('School 10th Address') }}" />
                <x-input id="school_10th_address" class="block mt-1 w-full" type="text" name="school_10th_address" :value="old('school_10th_address')" required />
            </div>
            
            <div>
                <x-label for="school_10th_percentage" value="{{ __('School 10th Percentage') }}" />
                <x-input id="school_10th_percentage" class="block mt-1 w-full" type="text" name="school_10th_percentage" :value="old('school_10th_percentage')" required />
            </div>
            
            <div>
                <x-label for="school_12th_name" value="{{ __('School 12th Name') }}" />
                <x-input id="school_12th_name" class="block mt-1 w-full" type="text" name="school_12th_name" :value="old('school_12th_name')" required />
            </div>
            
            <div>
                <x-label for="school_12th_address" value="{{ __('School 12th Address') }}" />
                <x-input id="school_12th_address" class="block mt-1 w-full" type="text" name="school_12th_address" :value="old('school_12th_address')" required />
            </div>
            
            <div>
                <x-label for="school_12th_percentage" value="{{ __('School 12th Percentage') }}" />
                <x-input id="school_12th_percentage" class="block mt-1 w-full" type="text" name="school_12th_percentage" :value="old('school_12th_percentage')" required />
            </div>
            
            <div>
                <x-label for="bachelor_college_name" value="{{ __('Bachelor College Name') }}" />
                <x-input id="bachelor_college_name" class="block mt-1 w-full" type="text" name="bachelor_college_name" :value="old('bachelor_college_name')" required />
            </div>
            
            <div>
                <x-label for="bachelor_college_address" value="{{ __('Bachelor College Address') }}" />
                <x-input id="bachelor_college_address" class="block mt-1 w-full" type="text" name="bachelor_college_address" :value="old('bachelor_college_address')" required />
            </div>
            
            <div>
                <x-label for="bachelor_percentage" value="{{ __('Bachelor Percentage') }}" />
                <x-input id="bachelor_percentage" class="block mt-1 w-full" type="text" name="bachelor_percentage" :value="old('bachelor_percentage')" required />
            </div>
            
            <div>
                <x-label for="current_course" value="{{ __('Current Course') }}" />
                <x-input id="current_course" class="block mt-1 w-full" type="text" name="current_course" :value="old('current_course')" required />
            </div>
            
            <div>
                <x-label for="current_status" value="{{ __('Current Status') }}" />
                <x-input id="current_status" class="block mt-1 w-full" type="text" name="current_status" :value="old('current_status')" required />
            </div>
            
            <div>
                <x-label for="final_year_passed" value="{{ __('Final Year Passed') }}" />
                <x-input id="final_year_passed" class="block mt-1 w-full" type="text" name="final_year_passed" :value="old('final_year_passed')" required />
            </div>
            
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
