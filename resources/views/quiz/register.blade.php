<x-user-layout>
    <div class="min-h-screen relative sm:flex sm:justify-center sm:items-center">
    <form action="" method="post" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow" style="min-width: 640px">
    @csrf
        <div class="flex justify-center mb-3">
            <img src="{{asset('images/logo.png')}}" alt="">
        </div>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">Information Protection Department</h5>
        <h3 class="mb-3 font-bold text-gray-700 dark:text-gray-400 text-center" style="font-size: 22pt">Welcome to the cybersecurity challenge</h3>
        <p class="mb-3 text-center font-bold">Please Enter Your Name and Mobile number for Registration</p>
        <hr class="w-48 h-1 mx-auto my-5 bg-gray-100 border-0 rounded dark:bg-gray-700">

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <hr />
        <br>
        <div>
            <x-input-label for="phone" :value="__('Mobile number')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>


        <hr />
        <br>

        <div class="flex items-center justify-center mt-4">
{{--
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('player.login') }}">
                {{ __('Already Have Code ?') }}
            </a>
            --}}
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>

    </form>
    </div>
</x-user-layout>
