<x-layout>
    <x-slot:title></x-slot:title>
    {{ Auth::user()->role == 'superadmin' }}
</x-layout>
