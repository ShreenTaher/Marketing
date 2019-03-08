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
            <span class="m-menu__link-text">Positions</span>
            <i class="m-menu__hor-arrow la la-angle-down"></i>
        </a>
    </li>
    <li class="m-menu__item">
        <a href="" class="m-menu__link" data-toggle="modal" data-target="#PositionModal">
            <span class="m-menu__link-text">add new position</span>
            <i class="m-menu__hor-arrow la la-angle-down"></i>
        </a>
    </li>
@endsection

@section('content')
    <!-- modal create position -->
        @include('admin.positions.create')
    <!-- modal create position -->
    <!-- modal create position -->
        @include('admin.positions.edit')
    <!-- modal create position -->
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Positions
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
                <tbody id='positions'>
                @forelse($positions as $position)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $position->ar ? $position->ar->name : ''}}</td>
                    <td>{{ $position->en ? $position->en->name : ''}}</td>
                    <td><span class="badge {{ $position->is_active == 1 ? 'badge-success' : 'badge-warning'}}">{{ $position->is_active == 1 ? 'فعال' : 'غير فعال' }}</span></td>
                    <td>
                        <a href="" class="btn {{ $position->is_active == 1 ? 'btn-warning' : 'btn-success' }} m-btn activate-alert" data-id="{{$position->id}}" activate_url="{{app('shared')->get('base_url')}}/position/"><i class="fa {{ $position->is_active == 1 ? 'fa-times-circle' : 'fa-check-circle' }}"></i></a>
                        <a href="" class="btn btn-brand m-btn update-alert" data-id="{{$position->id}}" update_url="{{app('shared')->get('base_url')}}/position/"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger m-btn delete-alert" data-id="{{$position->id}}" delete_url="{{app('shared')->get('base_url')}}/position/" access_token="{{$access_token}}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                <td colspan="5">No Data</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer')
    @include('admin.positions.script')
@endsection
