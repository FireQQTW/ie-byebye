@extends('layouts.admin')
@section('breadcrumbs', Breadcrumbs::render('admin.landlords.houses.edit', $landlord))
@section('asset-js')
	{{HTML::script('/js/landlord/form.js')}}
@stop
@section('main')
	{{ Form::model($house, array('method'   =>  'PATCH', 'route' => array('admin.landlords.houses.update', $landlord->sn, $house->sn), 'class' => 'form-horizontal', 'role' => 'form')) }}
		@include('admin/houses/_partials/_form', ['submit_text' => '儲存', 'county'  =>  $house->county, 'district'   =>  $house->district, 'zipcode'  =>  $house->zipcode])
	{{ Form::close() }}
@stop