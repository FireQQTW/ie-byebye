<div class="form-group">
    {{ Form::label('username', '帳號', array('class' => 'col-sm-3 control-label no-padding-right')) }}
    <div class="col-sm-9">
        {{ Form::text('username', Input::old('username') ,array('class' => 'col-xs-10 col-sm-5', 'placeholder' => '請輸入帳號')) }}
    </div>
</div>

<div class="space-4"></div>

<div class="form-group">
    {{ Form::label('password', '密碼', array('class' => 'col-sm-3 control-label no-padding-right')) }}
    <div class="col-sm-9">
        {{ Form::password('password', null ,array('class'   =>  'col-xs-10 col-sm-5', 'placeholder' =>  '請輸入密碼')) }}
    </div>
</div>

<div class="space-4"></div>

<div class="form-group">
    {{ Form::label('password_confirmation', '確認密碼', array('class'   =>  'col-sm-3 control-label no-padding-right')) }}
    <div class="col-sm-9">
        {{ Form::password('password_confirmation',null ,array('class'   =>  'col-xs-10 col-sm-5', 'placeholder' =>  '請輸入確認密碼')) }}
    </div>
</div>

<div class="space-4"></div>

<div class="form-group">
    {{ Form::label('name', '房東姓名', array('class' => 'col-sm-3 control-label no-padding-right')) }}
    <div class="col-sm-9">
        {{ Form::text('name', Input::old('name') ,array('class' => 'col-xs-10 col-sm-5', 'placeholder' => '請輸入房東姓名')) }}
    </div>
</div>

<div class="space-4"></div>

<div class="form-group">
    {{ Form::label('address', '地址', array('class' => 'col-sm-3 control-label no-padding-right')) }}
    <div class="col-sm-9">
        <div id="jq_twzip" class="help-margin-bottom-2">
            <div data-role="county" class="help-inline" data-value="{{Input::old('county')}}"></div>
            <div data-role="district" class="help-inline" data-value="{{Input::old('district')}}"></div>
            <div data-role="zipcode" data-style="hide" data-value="{{Input::old('zipcode')}}"></div>
        </div>
        {{ Form::text('address', Input::old('address') ,array('class' => 'col-xs-10 col-sm-5', 'placeholder' => '請輸入地址')) }}
    </div>
</div>

<div class="space-4"></div>

<div class="form-group">
    {{ Form::label('isEnabled', '狀態', array('class' =>  'col-sm-3 control-label no-padding-right')) }}
    <div class="col-sm-9">
        <label>
            {{ Form::checkbox('isEnabled', '1', Input::old('isEnabled'), array('class'  =>  'ace ace-switch ace-switch-2')) }}
            <span class="lbl"></span>
        </label>
    </div>
</div>


@include('_partials/_form_error', ['errors'  =>  $errors])

<div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
        {{ HTML::ButtonWithIcon('<i class="icon-ok bigger-110"></i>'.$submit_text, array('class' => 'btn btn-info', 'type' => 'submit')) }}

        &nbsp; &nbsp; &nbsp;

        {{ HTML::decode(link_to_route('admin.landlords.index', '<i class="icon-remove bigger-110"></i>取消', null, array('class' => 'btn'))) }}
    </div>
</div>