<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <div class="container mx-auto flex items-center justify-center h-96">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Welcome, {{ Auth::user()->name }}
    </h2>
</div>

<!-- Create Page Button -->
<div class="p-6 flex items-center justify-center">
                    <a href="{{ route('books.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create Page
                    </a>
                </div>
    </x-slot>

    
</x-app-layout>
