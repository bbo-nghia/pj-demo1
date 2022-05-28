@extends('backend.layouts.app')

@section('title', __('Address Detail'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Address Detail')
    </x-slot>

    <x-slot name="body">
        <div class="container-fluid p-0">
            @include('backend.account.includes.form')
        </div>
    </x-slot>
</x-backend.card>
@endsection