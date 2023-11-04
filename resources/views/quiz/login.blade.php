<x-user-layout>
    <div class="min-h-screen relative sm:flex sm:justify-center sm:items-center">
    <form action="" method="post" class="block max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow" style="min-width: 640px">
        @csrf
        <div class="flex justify-center mb-3">
            <img src="{{asset('images/logo.png')}}" alt="">
        </div>

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">Information Protection Department</h5>
        <h3 class="mb-3 font-bold text-gray-700 dark:text-gray-400 text-center" style="font-size: 22pt">Welcome to the cybersecurity challenge</h3>
        <p class="mb-3 text-center font-bold">Navigate and interact with the web pages to find cybersecurity observations</p>
        <p class="text-center font-bold">Don’t forget to be fast!</p>
        <hr class="w-48 h-1 mx-auto my-5 bg-gray-100 border-0 rounded dark:bg-gray-700">

        <div>
            <x-input-label for="user_id" :value="__('To start, enter your code')" />
            <x-text-input id="user_id" class="block mt-1 w-full" type="text" name="user_id" :value="old('user_id')" required autofocus autocomplete="user_id" />
            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
        </div>


        <hr />


        <div class="flex items-center justify-center mt-4">
{{--
            <a class="text-left underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('player.register') }}">
                {{ __('Don\'t have Code ?') }}
            </a>
            --}}
            <x-primary-button class="ml-4">
                {{ __('Start') }}
            </x-primary-button>
        </div>

    </form>
    </div>
</x-user-layout>
