@extends('layouts.admin')
@section('breadcrumbs', Breadcrumbs::render('admin.rooms.pmus.edit', $room))
@section('asset-js')

@stop
@section('main')
	{{ Form::model($pmu, array('method'   =>  'PATCH', 'route' => array('admin.rooms.pmus.update', $room->sn, $pmu->sn), 'class' => 'form-horizontal', 'role' => 'form')) }}
		@include('admin/pmus/_partials/_form', ['submit_text' => '儲存'])
	{{ Form::close() }}
@stop