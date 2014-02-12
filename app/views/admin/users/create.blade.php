@extends('layouts.admin')
@section('breadcrumbs', Breadcrumbs::render('admin.users.create'))

@section('main')
	{{ Form::open(array('route'	=> 'admin.users.store', 'class'	=>	'form-horizontal', 'role'	=>	'form')) }}
		<div class="form-group">
			{{ Form::label('username', '帳號', array('class'	=>	'col-sm-3 control-label no-padding-right')) }}
			<div class="col-sm-9">
				{{ Form::text('username', Input::old('username') ,array('class'	=>	'col-xs-10 col-sm-5', 'placeholder'	=>	'請輸入帳號')) }}
			</div>
		</div>

		<div class="space-4"></div>

		<div class="form-group">
			{{ Form::label('password', '密碼', array('class'	=>	'col-sm-3 control-label no-padding-right')) }}
			<div class="col-sm-9">
				{{ Form::password('password', null ,array('class'	=>	'col-xs-10 col-sm-5', 'placeholder'	=>	'請輸入密碼')) }}
			</div>
		</div>

		<div class="space-4"></div>

		<div class="form-group">
			{{ Form::label('password_confirmation', '確認密碼', array('class'	=>	'col-sm-3 control-label no-padding-right')) }}
			<div class="col-sm-9">
				{{ Form::password('password_confirmation',null ,array('class'	=>	'col-xs-10 col-sm-5', 'placeholder'	=>	'請輸入確認密碼')) }}
			</div>
		</div>

		<div class="space-4"></div>

		<div class="form-group">
			{{ Form::label('name', '名稱', array('class'	=>	'col-sm-3 control-label no-padding-right')) }}
			<div class="col-sm-9">
				{{ Form::text('name', Input::old('name') ,array('class'	=>	'col-xs-10 col-sm-5', 'placeholder'	=>	'請輸入名稱')) }}
			</div>
		</div>

		<div class="space-4"></div>

		<div class="form-group">
			{{ Form::label('email', 'Email', array('class'	=>	'col-sm-3 control-label no-padding-right')) }}
			<div class="col-sm-9">
				{{ Form::text('email', Input::old('email') ,array('class'	=>	'col-xs-10 col-sm-5', 'placeholder'	=>	'請輸入Email')) }}
			</div>
		</div>

		<div class="space-4"></div>

		<div class="form-group">
			{{ Form::label('verified', '認證狀態', array('class'	=>	'col-sm-3 control-label no-padding-right')) }}
			<div class="col-sm-9">
				<label>
					{{ Form::checkbox('verified', '1', Input::old('verified'), array('class'	=>	'ace ace-switch ace-switch-2')) }}
					<span class="lbl"></span>
				</label>
			</div>
		</div>

		<div class="space-4"></div>

		<div class="form-group">
			{{ Form::label('disabled', '不允許登入', array('class'	=>	'col-sm-3 control-label no-padding-right')) }}
			<div class="col-sm-9">
				<label>
					{{ Form::checkbox('disabled', '1', Input::old('disabled'), array('class'	=>	'ace ace-switch ace-switch-2')) }}
					<span class="lbl"></span>
				</label>
			</div>
		</div>

		@if($errors->any())
			<div class="space-4"></div>
			<div class="alert alert-danger">
				<ul>
					{{ implode('', $errors->all('<li>:message</li>'))}}
				</ul>
			</div>
		@endif

		<div class="clearfix form-actions">
			<div class="col-md-offset-3 col-md-9">
				{{ HTML::ButtonWithIcon('<i class="icon-ok bigger-110"></i>儲存', array('class'	=>	'btn btn-info', 'type'	=>	'submit')) }}

				&nbsp; &nbsp; &nbsp;

				{{ HTML::decode(link_to_route('admin.users.index', '<i class="icon-remove bigger-110"></i>取消', null, array('class' => 'btn'))) }}
			</div>
		</div>
	{{ Form::close() }}
@stop