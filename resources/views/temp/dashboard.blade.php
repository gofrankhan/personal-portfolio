<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table>
                        <tr>
                            <td>{{ __("User") }}</td>
                            <td>:</td>
                            <td style="padding:2px">{{ Auth::user()->name; }}</td>
                        </tr>
                        <tr>
                            <td>{{ __("Email") }}</td>
                            <td>:</td>
                            <td style="padding:2px">{{ Auth::user()->email; }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
