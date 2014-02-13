@extends('layouts.admin')

@section('breadcrumbs', Breadcrumbs::render('admin.landlords'))
@section('main')
    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="center">
                                <label>
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <th>房東名稱</th>
                            <th>地址</th>
                            <th>狀態</th>
                            <th>
                                <a href="{{URL::route('admin.landlords.create')}}" class="btn btn-info btn-xs pull-right">
                                    <i class="icon-plus align-top bigger-110 icon-on-right"></i>
                                    新增
                                </a>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /span -->
    </div><!-- /row -->
@stop