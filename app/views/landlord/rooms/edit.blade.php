@extends('layouts.landlord')

@section('breadcrumbs', Breadcrumbs::render('landlord.rooms.edit', $room))
@section('main')
    {{ Form::model($room, array('method'   =>  'POST', 'route' => array('landlord.rooms.update', $room->house->sn, $room->sn), 'class' => 'form-horizontal', 'role' => 'form')) }}
         <div class="form-group">
            {{ Form::label('username', '密碼', array('class' => 'col-sm-3 control-label no-padding-right')) }}
            <div class="col-sm-9">
                {{ Form::text('username', null ,array('class'   =>  'col-xs-10 col-sm-5', 'placeholder' =>  '請輸入帳號')) }}
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
                {{ Form::password('password_confirmation', null, array('class'   =>  'col-xs-10 col-sm-5', 'placeholder' =>  '請輸入確認密碼')) }}
            </div>
        </div>

        <div class="space-4"></div>
        @include('_partials/_form_error', ['errors'  =>  $errors])
        <div class="clearfix form-actions">
            <div class="col-md-offset-3 col-md-9">
                {{ HTML::ButtonWithIcon('<i class="icon-ok bigger-110"></i>儲存', array('class' => 'btn btn-info', 'type' => 'submit')) }}

                &nbsp; &nbsp; &nbsp;

                {{ HTML::decode(link_to_route('landlord.rooms', '<i class="icon-remove bigger-110"></i>取消', array($room->house->sn), array('class' => 'btn'))) }}
            </div>
        </div>
    {{ Form::close() }}
@stop