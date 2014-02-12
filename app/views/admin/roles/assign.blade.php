@extends('layouts.admin')
@section('breadcrumbs', Breadcrumbs::render('admin.roles.assign', $role))

@section('asset-css')
	{{HTML::style('/admin/css/chosen.css')}}
@stop

@section('asset-js')
	{{HTML::script('/admin/js/chosen/chosen.select.js')}}
@stop

@section('main')
	{{ Form::open(array('route'	=> 'admin.roles.assign.store', 'class'	=>	'form-horizontal', 'role'	=>	'form')) }}
		<div class="form-group">
			{{ Form::label('name', '群組名稱', array('class' => 'col-sm-3 control-label no-padding-right')) }}
			<div class="col-sm-9">
				<span class="help-block">{{$role->description}}</span>
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('permissions', '權限', array('class' => 'col-sm-3 control-label no-padding-right')) }}
			<div class="col-sm-9">
				{{ Form::select('permissions[]', $permissionOpeions, $role->permissions()->lists('id'), array('class' => 'width-80 chosen-select', 'data-placeholder' => '請選擇權限', 'multiple', 'id' => 'permissions'))}}
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
				{{ Form::hidden('role-id', $role->id) }}
				{{ HTML::ButtonWithIcon('<i class="icon-ok bigger-110"></i>儲存', array('class' => 'btn btn-info', 'type' => 'submit')) }}

				&nbsp; &nbsp; &nbsp;

				{{ HTML::decode(link_to_route('admin.roles.index', '<i class="icon-remove bigger-110"></i>取消', null, array('class' => 'btn'))) }}
			</div>
		</div>
	{{ Form::close() }}
@stop