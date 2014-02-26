@extends('layouts.admin')
@section('breadcrumbs', Breadcrumbs::render('admin.houses.rooms.edit', $house))
@section('asset-js')
	{{HTML::script('/js/houses/form.js')}}
@stop
@section('main')
	{{ Form::model($room, array('method'   =>  'PATCH', 'route' => array('admin.houses.rooms.update', $house->sn, $room->sn), 'class' => 'form-horizontal', 'role' => 'form')) }}
		@include('admin/rooms/_partials/_form', ['submit_text' => '儲存'])
	{{ Form::close() }}
@stop