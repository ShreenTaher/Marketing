@extends('admin.layouts.app')
@section('title')
صفحة عرض الدول
@endsection

@section('header')
    {!! Html::style('admin/vendors/custom/datatables/datatables.bundle.rtl.css') !!}
@endsection

@section('topBar')
    <li class="m-menu__item">
        <a href="" class="m-menu__link">
            <span class="m-menu__link-text">الرئيسية</span>
            <i class="m-menu__hor-arrow la la-angle-left"></i>
        </a>
    </li>
    <li class="m-menu__item active-top-bar">
        <a href="javascript:;" class="m-menu__link">
            <span class="m-menu__link-text">صفحة عرض الدول</span>
            <i class="m-menu__hor-arrow la la-angle-down"></i>
        </a>
    </li>
    <li class="m-menu__item">
        <a href="" class="m-menu__link">
            <span class="m-menu__link-text">صفحة إضافة دوله</span>
            <i class="m-menu__hor-arrow la la-angle-down"></i>
        </a>
    </li>
@endsection

@section('content')
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        التحكم بالدول
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_country">
                <thead>
                <tr>
                    <th>#</th>
                    <th> الإسم باللغه العربيه</th>
                    <th> الإسم باللغه الانجليزيه</th>
                    <th> رمز الدوله</th>
                    <th>اللغه</th>
                    <th>علم الدوله</th>
                    <th>كود الدوله</th>
                    <th>الأدوات</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer')
    {!! Html::script('admin/vendors/custom/datatables/datatables.bundle.js') !!}
    {!! Html::script('admin/custom/js/countries.js') !!}
@endsection
