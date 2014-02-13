@extends('layouts.admin')
@section('breadcrumbs', Breadcrumbs::render('admin.landlords.create'))
@section('asset-js')
	{{HTML::script('/admin/js/landlord/form.js')}}
@stop
@section('main')
	{{ Form::model($landlord, array('route' => array('admin.landlords.update', $landlord->key), 'class' => 'form-horizontal', 'role' => 'form')) }}
		@include('admin/landlords/_partials/_form', ['submit_text' => '儲存'])
	{{ Form::close() }}
@stop