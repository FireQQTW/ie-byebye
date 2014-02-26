@extends('layouts.admin')
@section('breadcrumbs', Breadcrumbs::render('admin.landlords.houses.create', $landlord))
@section('asset-js')
	{{HTML::script('/js/houses/form.js')}}
@stop
@section('main')
	{{ Form::model(new \House, array('route' => array('admin.landlords.houses.store', $landlord->sn), 'class' => 'form-horizontal', 'role' => 'form')) }}
        @include('admin/houses/_partials/_form', ['submit_text' => '儲存', 'county'  => Input::old('county'), 'district'   =>  Input::old('district'), 'zipcode'  => Input::old('zipcode')])
	{{ Form::close() }}
@stop