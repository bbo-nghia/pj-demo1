@extends('backend.layouts.app')

@section('title', __('Shipment Management'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Shipment Management')
    </x-slot>

    <x-slot name="headerActions">
    </x-slot>

    <x-slot name="body">
        <div class="container-fluid p-0">
            <div class="d-md-flex justify-content-between mb-3">
                <div class="d-md-flex">
                    <form class="form-inline">
                        <div class="form-group">
                            <label for="filter">Filter</label>
                            <input type="date" id="filter" class="form-control mx-sm-3">
                        </div>
                        <div class="form-group">
                            <label for="shipping_status">Shipping Status</label>
                            <select name="" id="shipping_status" class="form-control mx-sm-3">
                                <option value="">On going</option>
                                <option value="">Shipped</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
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
                            <th>
                                <div class="d-flex align-items-center">
                                    <span>Receiver Name</span>
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
                                    <span>Select</span>
                                </div>
                            </th>
                            <th>
                                <div class="d-flex align-items-center">
                                    <span>Label Print</span>
                                </div>
                            </th>
                            <th>
                                <div class="d-flex align-items-center">
                                    <span>Status</span>
                                </div>
                            </th>
                            <th>
                                <div class="d-flex align-items-center">
                                    <span>Shipped Date</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="2">Test 1</td>
                            <td rowspan="2">0912345678</td>
                            <td rowspan="2">2022/01/01</td>
                            <td rowspan="2">Adress 123 123 123 123</td>
                            <td rowspan="2"><span class="badge badge-success">Yes</span></td>
                            <td>Test 1</td>
                            <td>0912345678</td>
                            <td>2022/01/01</td>
                            <td>Adress 123 123 123 123</td>
                            <td><span class="badge badge-success">Selected</span></td>
                            <td><button>button</button></td>
                            <td>
                                <select name="" id="" class="form-control">
                                    <option value="">Shipped</option>
                                    <option value="">On Progress</option>
                                </select>
                            </td>
                            <td>2022/01/01</td>
                        </tr>
                        <tr>
                            <td>Test 1</td>
                            <td>0912345678</td>
                            <td>2022/01/01</td>
                            <td>Adress 123 123 123 123</td>
                            <td><span class="badge badge-danger">No</span></td>
                            <td><button>button</button></td>
                            <td>
                                <select name="" id="" class="form-control">
                                    <option value="">Shipped</option>
                                    <option value="">On Progress</option>
                                </select>
                            </td>
                            <td>2022/01/01</td>
                        </tr>
                        <tr>
                            <td rowspan="2">Test 1</td>
                            <td rowspan="2">0912345678</td>
                            <td rowspan="2">2022/01/01</td>
                            <td rowspan="2">Adress 123 123 123 123</td>
                            <td rowspan="2"><span class="badge badge-success">Yes</span></td>
                            <td>Test 1</td>
                            <td>0912345678</td>
                            <td>2022/01/01</td>
                            <td>Adress 123 123 123 123</td>
                            <td><span class="badge badge-success">Selected</span></td>
                            <td><button>button</button></td>
                            <td>
                                <select name="" id="" class="form-control">
                                    <option value="">Shipped</option>
                                    <option value="">On Progress</option>
                                </select>
                            </td>
                            <td>2022/01/01</td>
                        </tr>
                        <tr>
                            <td>Test 1</td>
                            <td>0912345678</td>
                            <td>2022/01/01</td>
                            <td>Adress 123 123 123 123</td>
                            <td><span class="badge badge-danger">No</span></td>
                            <td><button>button</button></td>
                            <td>
                                <select name="" id="" class="form-control">
                                    <option value="">Shipped</option>
                                    <option value="">On Progress</option>
                                </select>
                            </td>
                            <td>2022/01/01</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </x-slot>
</x-backend.card>
@endsection