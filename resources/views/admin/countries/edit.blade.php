@extends('admin.layouts.app')

@section('title')
    تعديل :
@endsection
@section('topBar')
    <li class="m-menu__item">
        <a href="{{url('admincp')}}" class="m-menu__link">
            <span class="m-menu__link-text">الرئيسية</span>
            <i class="m-menu__hor-arrow la la-angle-left"></i>
        </a>
    </li>
    <li class="m-menu__item">
        <a href="{{url('admincp/countries')}}" class="m-menu__link">
            <span class="m-menu__link-text">التحكم </span>
            <i class="m-menu__hor-arrow la la-angle-left"></i>
        </a>
    </li>
    <li class="m-menu__item" style="background: #e0deff;">
        <a href="javascript:;" class="m-menu__link">
            <span class="m-menu__link-text">تعديل : </span>
            <i class="m-menu__hor-arrow la la-angle-down"></i>
        </a>
    </li>
@endsection

@section('header')
@endsection

@section('content')

    <!--begin::Portlet-->
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
					<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
					</span>
                    <h3 class="m-portlet__head-text">
                        تعديل بيانات
                    </h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        {!! Form::model($country,['route' => ['countries.update' , $country->country_id],'method'=> 'PATCH','class'=>'m-form m-form--fit m-form--label-align-right']) !!}
        <div class="m-portlet__body">
            @include('admin.countries.form')
        </div>
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-success">تعديل</button>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    <!--end::Form-->
    </div>
    <!--end::Portlet-->
@endsection
@section('footer')
    <script type="text/javascript">

    </script>
@endsection

