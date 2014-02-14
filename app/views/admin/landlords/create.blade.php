@extends('layouts.admin')
@section('breadcrumbs', Breadcrumbs::render('admin.landlords.create'))
@section('asset-js')
	{{HTML::script('/admin/js/landlord/form.js')}}
@stop
@section('main')
	{{ Form::model(new \Landlord, array('route' => array('admin.landlords.store'), 'class' => 'form-horizontal', 'role' => 'form')) }}
		@include('admin/landlords/_partials/_form', ['submit_text' => '新增'])
	{{ Form::close() }}
@stop