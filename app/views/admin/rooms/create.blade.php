@extends('layouts.admin')
@section('breadcrumbs', Breadcrumbs::render('admin.houses.rooms.create', $house))
@section('asset-js')
	{{HTML::script('/admin/js/houses/form.js')}}
@stop
@section('main')
	{{ Form::model(new \Room, array('route' => array('admin.houses.rooms.store', $house->sn), 'class' => 'form-horizontal', 'role' => 'form')) }}
        @include('admin/rooms/_partials/_form', ['submit_text' => '儲存'])
	{{ Form::close() }}
@stop