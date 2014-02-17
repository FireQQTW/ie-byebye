@extends('layouts.admin')

@section('breadcrumbs', Breadcrumbs::render('admin.dashboard'))
@section('main')
    <!-- PAGE CONTENT BEGINS -->

    <div class="alert alert-block alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="icon-remove"></i>
        </button>

        <i class="icon-ok green"></i>
        Welcome to
        <strong class="green">
            <?=Config::get('app.site');?>
            <small>(v1.0.0)</small>
        </strong>
        Admin System.
    </div>

    <!-- PAGE CONTENT ENDS -->
@stop