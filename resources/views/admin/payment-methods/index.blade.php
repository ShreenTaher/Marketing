@extends('admin.layouts.app')
@section('title')
Payment Methods
@endsection

@section('topBar')
    <li class="m-menu__item">
        <a href="" class="m-menu__link">
            <span class="m-menu__link-text">Home</span>
            <i class="m-menu__hor-arrow la la-angle-left"></i>
        </a>
    </li>
    <li class="m-menu__item active-top-bar">
        <a href="javascript:;" class="m-menu__link">
            <span class="m-menu__link-text">Payment Methods</span>
            <i class="m-menu__hor-arrow la la-angle-down"></i>
        </a>
    </li>
    <li class="m-menu__item">
        <a href="" class="m-menu__link" data-toggle="modal" data-target="#PaymentMethodModal">
            <span class="m-menu__link-text">add new payment method</span>
            <i class="m-menu__hor-arrow la la-angle-down"></i>
        </a>
    </li>
@endsection

@section('content')
    <!-- modal create payment-methods -->
        @include('admin.payment-methods.create')
    <!-- modal create payment-methods -->
    <!-- modal create payment-methods -->
        @include('admin.payment-methods.edit')
    <!-- modal create payment-methods -->
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Payment Methods
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Arabic Name</th>
                    <th>English Name</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id='payment-methods'>
                @forelse($methods as $method)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $method->ar ? $method->ar->name : ''}}</td>
                    <td>{{ $method->en ? $method->en->name : ''}}</td>
                    <td>
                        <img class="img-responsive" src="{{substr(app('shared')->get('base_url'), 0, -4).''.$method->icon}}" width="50" height="50">
                    </td>
                    <td><span class="badge {{ $method->is_active == 1 ? 'badge-success' : 'badge-warning'}}">{{ $method->is_active == 1 ? 'فعال' : 'غير فعال' }}</span></td>
                    <td>
                        <a href="" class="btn {{ $method->is_active == 1 ? 'btn-warning' : 'btn-success' }} m-btn activate-alert" data-id="{{$method->id}}" activate_url="{{app('shared')->get('base_url')}}/managment/payment-methods/"><i class="fa {{ $method->is_active == 1 ? 'fa-times-circle' : 'fa-check-circle' }}"></i></a>
                        <a href="" class="btn btn-brand m-btn update-alert" data-id="{{$method->id}}" update_url="{{app('shared')->get('base_url')}}/managment/payment-methods/"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger m-btn delete-alert" data-id="{{$method->id}}" delete_url="{{app('shared')->get('base_url')}}/managment/payment-methods/" access_token="{{$access_token}}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                <td colspan="6" class="text-center">No Data</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer')
    @include('admin.payment-methods.script')
@endsection
