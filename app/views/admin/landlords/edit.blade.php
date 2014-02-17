@extends('layouts.admin')
@section('breadcrumbs', Breadcrumbs::render('admin.landlords.edit'))
@section('asset-js')
	{{HTML::script('/admin/js/landlord/form.js')}}
@stop
@section('main')
	{{ Form::model($landlord, array('method'   =>  'PATCH', 'route' => array('admin.landlords.update', $landlord->sn), 'class' => 'form-horizontal', 'role' => 'form')) }}
		@include('admin/landlords/_partials/_form', ['submit_text' => '儲存', 'county'  =>  $landlord->county, 'district'   =>  $landlord->district, 'zipcode'  =>  $landlord->zipcode])
	{{ Form::close() }}
@stop