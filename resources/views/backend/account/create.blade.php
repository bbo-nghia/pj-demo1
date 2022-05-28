@extends('backend.layouts.app')

@section('title', __('Address Create'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Address Create')
    </x-slot>

    <x-slot name="body">
        <div class="container-fluid p-0">
            @include('backend.account.includes.account_form')
        </div>
    </x-slot>
</x-backend.card>
@endsection