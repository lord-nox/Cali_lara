@extends('layouts.app')

@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profile') }}
            </h2>
        </div>
    </header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Update Profile Information -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Birthday -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PATCH')

                        <div>
                            <x-input-label for="birthday" :value="__('Birthday')" />
                            <x-text-input id="birthday" name="birthday" type="date" class="mt-1 block w-full" :value="old('birthday', $user->birthday)" />
                            <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Update Birthday') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Update About Me -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PATCH')

                        <div>
                            <x-input-label for="about_me" :value="__('About Me')" />
                            <textarea id="about_me" name="about_me" rows="4" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('about_me', $user->about_me) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('about_me')" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Update About Me') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Update Profile Picture -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <!-- Profile Picture -->
                        <div>
                            <x-input-label for="profile_picture" :value="__('Profile Picture')" />
                            <input id="profile_picture" name="profile_picture" type="file" class="mt-1 block w-full">
                            <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
                        </div>

                        <!-- Show current profile picture -->
                        @if ($user->profile_picture)
                            <div class="mt-4">
                                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="w-24 h-24 rounded-full">
                            </div>
                        @endif

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Update Profile Picture') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete User -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
