@extends('layouts.landlord')

@section('breadcrumbs', Breadcrumbs::render('landlord.rooms'))
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
                            <th>房間名稱</th>
                            <th>剩餘金額</th>
                            <th>狀態</th>
                            <th>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($rooms as $room)
                        <tr>
                            <td class="center">
                                <label>
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </td>
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
                                <!-- Desktop -->
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    {{Form::open(array('method' => 'POST', 'route' => array('landlord.rooms.check', $room->sn), 'class' => 'btn-group'))}}
                                        {{HTML::decode(link_to_route('admin.rooms.pmus.index', '<i class="icon-th bigger-120"></i>密碼設定', array($room->sn), array('class' => 'btn btn-xs btn-info')))}}
                                        @if(!$room->isEnabled)
                                            {{HTML::ButtonWithIcon('<i class="icon-check bigger-120"></i>啟用', array('class' => 'btn btn-xs btn-success', 'type'  =>  'submit'))}}
                                            {{Form::hidden('isEnabled', 1)}}
                                        @else
                                            {{HTML::ButtonWithIcon('<i class="icon-ban-circle bigger-120"></i>停用', array('class' => 'btn btn-xs btn-danger', 'type'  =>  'submit'))}}
                                            {{Form::hidden('isEnabled', 0)}}
                                        @endif
                                    {{Form::close()}}
                                </div>
                                <!-- RWD -->
                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    {{Form::open(array('method' => 'POST', 'route' => array('landlord.rooms.check', $room->sn)))}}
                                        <div class="inline position-relative">
                                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-cog icon-only bigger-110"></i>
                                            </button>
                                                
                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                <li>

                                                    {{HTML::decode(link_to_route('admin.rooms.pmus.index', '<span class="green"><i class="icon-edit bigger-120"></i></span>', array($room->sn), array('class' => 'tooltip-info', 'data-rel'    =>  'tooltip', 'title'  =>  '密碼設定')))}}
                                                </li>
                                                <li>
                                                    @if(!$room->isEnabled)
                                                        {{HTML::ButtonWithIcon('<i class="icon-check bigger-120"></i>啟用', array('class' => 'btn btn-xs btn-success', 'type'  =>  'submit'))}}
                                                        {{Form::hidden('isEnabled', 1)}}
                                                    @else
                                                        {{HTML::ButtonWithIcon('<i class="icon-ban-circle bigger-120"></i>停用', array('class' => 'btn btn-xs btn-danger', 'type'  =>  'submit'))}}
                                                        {{Form::hidden('isEnabled', 0)}}
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    {{Form::close()}}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /span -->
    </div><!-- /row -->
@stop