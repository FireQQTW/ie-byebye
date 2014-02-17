@extends('layouts.user')

@section('breadcrumbs', Breadcrumbs::render('index.dashboard'))
@section('main')
    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>房間名稱</th>
                            <th>剩餘金額</th>
                            <th>狀態</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {{ $room->name }}
                            </td>
                            <td>
                                {{ $room->billed }}
                            </td>
                            <td>
                                {{ HTML::decode('<span class="label label-sm '.$room->getStatusCss().'">'.$room->getStatus().'</span>') }}
                            </td>
                            <td>
                                {{HTML::decode(link_to_route('payment.create', '<i class="icon-edit bigger-120"></i>儲值', null, array('class' => 'btn btn-xs btn-info')))}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /span -->
    </div><!-- /row -->
@stop