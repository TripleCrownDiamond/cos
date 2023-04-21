@extends('layouts.template')

@section('content')
@if (Route::has('login'))
<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
    @auth
        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Tableau de bord</a>
    @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Connexion</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Inscription</a>
        @endif
    @endauth
</div>
<div class="row" >
    <div class="col-12" >
        <div class="mt-8" >
            <h1 class="">Bienvenu sur Canal Plus Operator System...</h1>
        </div>
    </div>
</div>
@endif
@endsection

