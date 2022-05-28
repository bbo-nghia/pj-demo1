@extends('backend.layouts.app')

@section('title', __('Account Create'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Account Create')
    </x-slot>

    <x-slot name="body">
        <div class="container-fluid p-0">
            @include('backend.account.includes.form')
        </div>
    </x-slot>
</x-backend.card>
@endsection