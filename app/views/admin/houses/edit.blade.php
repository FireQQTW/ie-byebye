@extends('layouts.admin')
@section('breadcrumbs', Breadcrumbs::render('admin.houses.edit', $landlord))
@section('asset-js')
	{{HTML::script('/admin/js/landlord/form.js')}}
@stop
@section('main')
	{{ Form::model($house, array('method'   =>  'PATCH', 'route' => array('admin.houses.update', $house->sn), 'class' => 'form-horizontal', 'role' => 'form')) }}
		@include('admin/houses/_partials/_form', ['submit_text' => '儲存', 'county'  =>  $house->county, 'district'   =>  $house->district, 'zipcode'  =>  $house->zipcode])
	{{ Form::close() }}
@stop