@extends('backend.layouts.app')

@section('title', __('Account Management'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Account Management')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.account.create')" :text="__('Create Account')" />
    </x-slot>

    <x-slot name="body">
        <div class="container-fluid p-0">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                <div class="d-flex align-items-center">
                                    <span>Name</span>
                                </div>
                            </th>
                            <th>
                                <div class="d-flex align-items-center">
                                    <span>Mobile</span>
                                </div>
                            </th>
                            <th>
                                <div class="d-flex align-items-center">
                                    <span>Birthday</span>
                                </div>
                            </th>
                            <th>
                                <div class="d-flex align-items-center">
                                    <span>Address</span>
                                </div>
                            </th>
                            <th>
                                <div class="d-flex align-items-center">
                                    <span>Mail Flag</span>
                                </div>
                            </th>
                            <th class="">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Test 1</td>
                            <td>0912345678</td>
                            <td>2022/01/01</td>
                            <td><a href="{{ route('admin.account.address') }}" class="btn btn-info">Detail</a></td>
                            <td><span class="badge badge-success">Yes</span></td>
                            <td>
                                <a href="{{ route('admin.account.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Test 1</td>
                            <td>0912345678</td>
                            <td>2022/01/01</td>
                            <td><a href="{{ route('admin.account.address') }}" class="btn btn-info">Detail</a></td>
                            <td> <span class="badge badge-danger">No</span></td>
                            <td>
                                <a href="{{ route('admin.account.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </x-slot>
</x-backend.card>
@endsection