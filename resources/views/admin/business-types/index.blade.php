@extends('admin.layouts.app')
@section('title')
Position 
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
            <span class="m-menu__link-text">Business Types</span>
            <i class="m-menu__hor-arrow la la-angle-down"></i>
        </a>
    </li>
    <li class="m-menu__item">
        <a href="" class="m-menu__link" data-toggle="modal" data-target="#BusinessTypeModal">
            <span class="m-menu__link-text">add new business type</span>
            <i class="m-menu__hor-arrow la la-angle-down"></i>
        </a>
    </li>
@endsection

@section('content')
    <!-- modal create position -->
        @include('admin.business-types.create')
    <!-- modal create position -->
    <!-- modal create position -->
        @include('admin.business-types.edit')
    <!-- modal create position -->
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Business Types
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
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id='business-types'>
                @forelse($business_types as $business_type)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $business_type->ar ? $business_type->ar->name : ''}}</td>
                    <td>{{ $business_type->en ? $business_type->en->name : ''}}</td>
                    <td><span class="badge {{ $business_type->is_active == 1 ? 'badge-success' : 'badge-warning'}}">{{ $business_type->is_active == 1 ? 'فعال' : 'غير فعال' }}</span></td>
                    <td>
                        <a href="" class="btn {{ $business_type->is_active == 1 ? 'btn-warning' : 'btn-success' }} m-btn activate-alert" data-id="{{$business_type->id}}" activate_url="{{app('shared')->get('base_url')}}/managment/business-types/"><i class="fa {{ $business_type->is_active == 1 ? 'fa-times-circle' : 'fa-check-circle' }}"></i></a>
                        <a href="" class="btn btn-brand m-btn update-alert" data-id="{{$business_type->id}}" update_url="{{app('shared')->get('base_url')}}/managment/business-types/"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger m-btn delete-alert" data-id="{{$business_type->id}}" delete_url="{{app('shared')->get('base_url')}}/managment/business-types/" access_token="{{$access_token}}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                <td colspan="5" class="text-center">No Data</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer')
    @include('admin.business-types.script')
@endsection
