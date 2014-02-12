@extends('layouts.admin')
@section('breadcrumbs', Breadcrumbs::render('admin.users.assign', $user))

@section('asset-css')
	{{HTML::style('/admin/css/chosen.css')}}
@stop

@section('asset-js')
	{{HTML::script('/admin/js/chosen/chosen.select.js')}}
@stop

@section('main')
	{{ Form::open(array('route'	=> 'admin.users.assign.store', 'class'	=>	'form-horizontal', 'role'	=>	'form')) }}
		<div class="form-group">
			{{ Form::label('name', '管理者名稱', array('class' => 'col-sm-3 control-label no-padding-right')) }}
			<div class="col-sm-9">
				<span class="help-block">{{$user->name}}</span>
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('roles', '群組', array('class' => 'col-sm-3 control-label no-padding-right')) }}
			<div class="col-sm-9">
				{{ Form::select('roles[]', $roleOptions, $user->roles()->lists('id'), array('class' => 'width-80 chosen-select', 'data-placeholder' => '請選擇群組', 'multiple', 'id' => 'roles'))}}
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
				{{ Form::hidden('user-id', $user->id) }}
				{{ HTML::ButtonWithIcon('<i class="icon-ok bigger-110"></i>儲存', array('class' => 'btn btn-info', 'type' => 'submit')) }}

				&nbsp; &nbsp; &nbsp;

				{{ HTML::decode(link_to_route('admin.users.index', '<i class="icon-remove bigger-110"></i>取消', null, array('class' => 'btn'))) }}
			</div>
		</div>
	{{ Form::close() }}
@stop