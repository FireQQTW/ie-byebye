@extends('layouts.admin')
@section('breadcrumbs', Breadcrumbs::render('admin.rooms.pmus.create', $room))
@section('asset-js')
	
@stop
@section('main')
	{{ Form::model(new \Pmu, array('route' => array('admin.rooms.pmus.store', $room->sn), 'class' => 'form-horizontal', 'role' => 'form')) }}
        @include('admin/pmus/_partials/_form', ['submit_text' => '儲存'])
	{{ Form::close() }}
@stop