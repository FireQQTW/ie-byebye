@extends('layouts.admin')
@section('breadcrumbs', Breadcrumbs::render('admin.roles.create'))

@section('main')
	{{ Form::open(array('route'	=> 'admin.roles.store', 'class'	=>	'form-horizontal', 'role'	=>	'form')) }}
		<div class="form-group">
			{{ Form::label('name', '名稱', array('class' => 'col-sm-3 control-label no-padding-right')) }}
			<div class="col-sm-9">
				{{ Form::text('name', Input::old('name') ,array('class' => 'col-xs-10 col-sm-5', 'placeholder' => '請輸入名稱')) }}
			</div>
		</div>

		<div class="space-4"></div>

		<div class="form-group">
			{{ Form::label('description', '敘述', array('class' => 'col-sm-3 control-label no-padding-right')) }}
			<div class="col-sm-9">
				{{ Form::text('description', Input::old('description') ,array('class' => 'col-xs-10 col-sm-5', 'placeholder' => '請輸入敘述')) }}
			</div>
		</div>

		<div class="space-4"></div>

		<div class="form-group">
			{{ Form::label('level', '等級', array('class' => 'col-sm-3 control-label no-padding-right')) }}
			<div class="col-xs-8 col-sm-4">
				{{ Form::select('level', $levels, Input::old('level'), array('class' => 'form-control'))}}
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
				{{ HTML::ButtonWithIcon('<i class="icon-ok bigger-110"></i>儲存', array('class' => 'btn btn-info', 'type' => 'submit')) }}

				&nbsp; &nbsp; &nbsp;

				{{ HTML::decode(link_to_route('admin.roles.index', '<i class="icon-remove bigger-110"></i>取消', null, array('class' => 'btn'))) }}
			</div>
		</div>
	{{ Form::close() }}
@stop