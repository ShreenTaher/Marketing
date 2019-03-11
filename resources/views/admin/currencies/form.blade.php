<div class="form-group m-form__group row">
    <label class="col-lg-1 col-form-label">اسم الدوله بالعربيه: </label>
    <div class="col-lg-4{{ $errors->has('country_name_ar') ? ' has-danger' : '' }}">
        {!! Form::text('country_name_ar',null,['class'=>'form-control m-input','autofocus','placeholder'=>"اسم الدوله بالعربيه"]) !!}
        @if ($errors->has('country_name_ar'))
            <span class="form-control-feedback" role="alert">
                <strong>{{ $errors->first('country_name_ar') }}</strong>
            </span>
        @endif
    </div>
    <label class="col-lg-2 col-form-label">اسم الدوله بالانجليزيه : </label>
    <div class="col-lg-5{{ $errors->has('country_name_en') ? ' has-danger' : '' }}">
        {!! Form::text('country_name_en',null,['class'=>'form-control m-input','placeholder'=>"اسم الدوله بالانجليزيه"]) !!}
        @if ($errors->has('country_name_en'))
            <span class="form-control-feedback" role="alert">
                <strong>{{ $errors->first('country_name_en') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group m-form__group row">
    <label class="col-lg-1 col-form-label">رمز الدوله : </label>
    <div class="col-lg-3{{ $errors->has('country_code') ? ' has-danger' : '' }}">
        {!! Form::text('country_code',null,['class'=>'form-control m-input','placeholder'=>"رمز الدوله مثلا SA"]) !!}
        @if ($errors->has('country_code'))
            <span class="form-control-feedback" role="alert">
                <strong>{{ $errors->first('country_code') }}</strong>
            </span>
        @endif
    </div>
    <label class="col-lg-1 col-form-label">كود الدوله : </label>
    <div class="col-lg-3{{ $errors->has('country_phone_code') ? ' has-danger' : '' }}">
        {!! Form::text('country_phone_code',null,['class'=>'form-control m-input','placeholder'=>"كود الدوله مثلا 00966"]) !!}
        @if ($errors->has('country_phone_code'))
            <span class="form-control-feedback" role="alert">
                <strong>{{ $errors->first('country_phone_code') }}</strong>
            </span>
        @endif
    </div>
    <label class="col-lg-1 col-form-label">اللغه : </label>
    <div class="col-lg-3{{ $errors->has('lang_id') ? ' has-danger' : '' }}">
        {!! Form::select('lang_id',array_pluck($languages,'lang_name_ar', 'lang_id'), old('lang_id'),['class'=>'form-control m-input']) !!}
{{--        {!! Form::select('governorate_id', $governorates, old('governorate_id') ,['class' => 'custom-select custom-select-sm', 'id' => 'patientSelectGoverntor', 'required' => true]) !!}--}}

    @if ($errors->has('lang_id'))
            <span class="form-control-feedback" role="alert">
                <strong>{{ $errors->first('lang_id') }}</strong>
            </span>
        @endif
    </div>
</div>


{{--<div class="m-form__seperator m-form__seperator--dashed"></div>--}}

{{--<div class="form-group m-form__group">--}}
    {{--<div class="m-form__heading">--}}
        {{--<h3 class="m-form__heading-title">تغيير كلمة المرور</h3>--}}
    {{--</div>--}}
{{--</div>--}}

{{--<div class="form-group m-form__group row m-form__section--last">--}}
    {{--<label class="col-lg-1 col-form-label">الحاليه : </label>--}}
    {{--<div class="col-lg-3{{ $errors->has('curPassword') ? ' has-danger' : '' }}">--}}
        {{--{!! Form::password('curPassword',['class'=>'form-control m-input','placeholder'=>"كلمة المرور الحاليه"]) !!}--}}
        {{--@if ($errors->has('curPassword'))--}}
            {{--<span class="form-control-feedback" role="alert">--}}
                {{--<strong>{{ $errors->first('curPassword') }}</strong>--}}
            {{--</span>--}}
        {{--@endif--}}
    {{--</div>--}}
    {{--<label class="col-lg-1 col-form-label">الجديده : </label>--}}
    {{--<div class="col-lg-3{{ $errors->has('password') ? ' has-danger' : '' }}">--}}
        {{--{!! Form::password('password',['class'=>'form-control m-input','placeholder'=>"كلمة المرور الجديده"]) !!}--}}
        {{--@if ($errors->has('password'))--}}
            {{--<span class="form-control-feedback" role="alert">--}}
                {{--<strong>{{ $errors->first('password') }}</strong>--}}
            {{--</span>--}}
        {{--@endif--}}
    {{--</div>--}}
    {{--<label class="col-lg-1 col-form-label">التأكيد : </label>--}}
    {{--<div class="col-lg-3{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">--}}
        {{--{!! Form::password('password_confirmation',['class'=>'form-control m-input','placeholder'=>"تأكيد كلمة المرور"]) !!}--}}
        {{--@if ($errors->has('password_confirmation'))--}}
            {{--<span class="form-control-feedback" role="alert">--}}
                {{--<strong>{{ $errors->first('password_confirmation') }}</strong>--}}
            {{--</span>--}}
        {{--@endif--}}
    {{--</div>--}}
{{--</div>--}}
