<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Employee Profile
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                               Employee Information
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Update employee information.") }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('employee.update',$employee->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <!-- Employee ID -->
                            <div>
                                <x-input-label for="employee_id" :value="__('Employee ID')" />
                                <x-text-input readonly id="employee_id" name="employee_id" type="text" class="mt-1 block w-full" :value="old('employee_id', $employee->employee_id)" required autofocus autocomplete="employee_id" />
                                <x-input-error class="mt-2" :messages="$errors->get('employee_id')" />
                            </div>

                            <!-- User Name -->
                            <div>
                                <x-input-label for="user_name" :value="__('User Name')" />
                                <x-text-input readonly id="user_name" name="user_name" type="text" class="mt-1 block w-full" :value="old('user_name', $employee->user_name)" required autofocus autocomplete="user_name" />
                                <x-input-error class="mt-2" :messages="$errors->get('user_name')" />
                            </div>

                            <!-- Name Prefix -->
                            <div>
                                <x-input-label for="name_prefix" :value="__('Name Prefix')" />
                                <x-text-input readonly id="name_prefix" name="name_prefix" type="text" class="mt-1 block w-full" :value="old('name_prefix', $employee->name_prefix)" required autofocus autocomplete="name_prefix" />
                                <x-input-error class="mt-2" :messages="$errors->get('name_prefix')" />
                            </div>

                            <!-- First Name -->
                            <div>
                                <x-input-label for="first_name" :value="__('First Name')" />
                                <x-text-input readonly id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $employee->first_name)" required autofocus autocomplete="first_name" />
                                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                            </div>

                            <!-- Middle Initial -->
                            <div>
                                <x-input-label for="middle_initial" :value="__('Middle Initial')" />
                                <x-text-input readonly id="middle_initial" name="middle_initial" type="text" class="mt-1 block w-full" :value="old('middle_initial', $employee->middle_initial)" required autofocus autocomplete="middle_initial" />
                                <x-input-error class="mt-2" :messages="$errors->get('middle_initial')" />
                            </div>

                            <!-- Last Name -->
                            <div>
                                <x-input-label for="last_name" :value="__('Last Name')" />
                                <x-text-input readonly id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $employee->last_name)" required autofocus autocomplete="last_name" />
                                <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                            </div>

                            <!-- Gender -->
                            <div>
                                <x-input-label for="gender" :value="__('Gender')" />
                                <x-text-input readonly id="gender" name="gender" type="text" class="mt-1 block w-full" :value="old('gender', $employee->gender)" required autofocus autocomplete="gender" />
                                <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                            </div>

                            <!-- E-Mail -->
                            <div>
                                <x-input-label for="email" :value="__('E-Mail')" />
                                <x-text-input readonly id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $employee->email)" required autofocus autocomplete="email" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <!-- Date of Birth -->
                            <div>
                                <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
                                <x-text-input readonly id="date_of_birth" name="date_of_birth" type="text" class="mt-1 block w-full" :value="old('date_of_birth', $employee->date_of_birth)" required autofocus autocomplete="date_of_birth" />
                                <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
                            </div>

                            <!-- Time of Birth -->
                            <div>
                                <x-input-label for="time_of_birth" :value="__('Time of Birth')" />
                                <x-text-input readonly id="time_of_birth" name="time_of_birth" type="text" class="mt-1 block w-full" :value="old('time_of_birth', $employee->time_of_birth)" required autofocus autocomplete="time_of_birth" />
                                <x-input-error class="mt-2" :messages="$errors->get('time_of_birth')" />
                            </div>

                            <!-- Age in Years -->
                            <div>
                                <x-input-label for="age_in_years" :value="__('Age in Years')" />
                                <x-text-input readonly id="age_in_years" name="age_in_years" type="text" class="mt-1 block w-full" :value="old('age_in_years', $employee->age_in_years)" required autofocus autocomplete="age_in_years" />
                                <x-input-error class="mt-2" :messages="$errors->get('age_in_years')" />
                            </div>

                            <!-- Date of Joining -->
                            <div>
                                <x-input-label for="date_of_joining" :value="__('Date of Joining')" />
                                <x-text-input readonly id="date_of_joining" name="date_of_joining" type="text" class="mt-1 block w-full" :value="old('date_of_joining', $employee->date_of_joining)" required autofocus autocomplete="date_of_joining" />
                                <x-input-error class="mt-2" :messages="$errors->get('date_of_joining')" />
                            </div>

                            <!-- Age in Company (Years) -->
                            <div>
                                <x-input-label for="age_in_company_years" :value="__('Age in Company (Years)')" />
                                <x-text-input readonly id="age_in_company_years" name="age_in_company_years" type="text" class="mt-1 block w-full" :value="old('age_in_company_years', $employee->age_in_company_years)" required autofocus autocomplete="age_in_company_years" />
                                <x-input-error class="mt-2" :messages="$errors->get('age_in_company_years')" />
                            </div>

                            <!-- Phone Number -->
                            <div>
                                <x-input-label for="phone_number" :value="__('Phone Number')" />
                                <x-text-input readonly id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="old('phone_number', $employee->phone_number)" required autofocus autocomplete="phone_number" />
                                <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                            </div>

                            <!-- Place Name -->
                            <div>
                                <x-input-label for="place_name" :value="__('Place Name')" />
                                <x-text-input readonly id="place_name" name="place_name" type="text" class="mt-1 block w-full" :value="old('place_name', $employee->place_name)" required autofocus autocomplete="place_name" />
                                <x-input-error class="mt-2" :messages="$errors->get('place_name')" />
                            </div>

                            <!-- Country -->
                            <div>
                                <x-input-label for="country" :value="__('Country')" />
                                <x-text-input readonly id="country" name="country" type="text" class="mt-1 block w-full" :value="old('country', $employee->country)" required autofocus autocomplete="country" />
                                <x-input-error class="mt-2" :messages="$errors->get('country')" />
                            </div>

                            <!-- City -->
                            <div>
                                <x-input-label for="city" :value="__('City')" />
                                <x-text-input readonly id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $employee->city)" required autofocus autocomplete="city" />
                                <x-input-error class="mt-2" :messages="$errors->get('city')" />
                            </div>

                            <!-- Zip -->
                            <div>
                                <x-input-label for="zip" :value="__('Zip')" />
                                <x-text-input readonly id="zip" name="zip" type="text" class="mt-1 block w-full" :value="old('zip', $employee->zip)" required autofocus autocomplete="zip" />
                                <x-input-error class="mt-2" :messages="$errors->get('zip')" />
                            </div>

                            <!-- Region -->
                            <div>
                                <x-input-label for="region" :value="__('Region')" />
                                <x-text-input readonly id="region" name="region" type="text" class="mt-1 block w-full" :value="old('region', $employee->region)" required autofocus autocomplete="region" />
                                <x-input-error class="mt-2" :messages="$errors->get('region')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                @if (session('status') === 'profile-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
