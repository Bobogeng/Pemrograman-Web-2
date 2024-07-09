<x-layout>
    <x-slot:card_title>Dashboard</x-slot>
    <h3>Selamat Datang Dashboard {{ ucfirst(Auth::user()->name) ?? '' }}!</h3>
    <p>Ini adalah halaman Dashboard</p>
</x-layout>
