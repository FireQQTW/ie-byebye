@extends('layouts.landlord')

@section('breadcrumbs', Breadcrumbs::render('landlord.rooms', $house))
@section('main')
    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                @foreach($rooms as $room)
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="center">
                                </th>
                                <th>房間名稱</th>
                                <th>計費方式</th>
                                <th>剩餘金額</th>
                                <th>狀態</th>
                                <th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <tr>
                                    <td class="center">
                                        <label>
                                            <input type="checkbox" class="ace" />
                                            <span class="lbl"></span>
                                        </label>
                                    </td>
                                    <td>
                                        {{{ $room->name }}}
                                    </td>
                                    <td>
                                        @if (empty($room->getBilledType()))
                                            <span class="red">尚未設定</span>
                                        @else
                                            {{{ $room->getBilledTypeToString() }}} :
                                            <span>{{{ $room->getBilledUnitPrice() }}} 元</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{{ $room->billed }}}
                                    </td>
                                    <td>
                                        {{ HTML::decode('<span class="label label-sm '.$room->getStatusCss().'">'.$room->getStatus().'</span>') }}
                                    </td>
                                    <td>
                                        <!-- Desktop -->
                                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                                            {{Form::open(array('method' => 'POST', 'route' => array('landlord.rooms.check', $house->sn, $room->sn), 'class' => 'btn-group'))}}
                                                {{HTML::decode(link_to_route('landlord.rooms.edit', '<i class="icon-user bigger-120"></i>帳號密碼', array($house->sn, $room->sn), array('class' => 'btn btn-xs btn-info')))}}
                                                {{HTML::decode(link_to_route('landlord.rooms.edit.bill', '<i class="icon-legal bigger-120"></i>計價設定', array($house->sn, $room->sn), array('class' => 'btn btn-xs btn-inverse')))}}
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
                                            {{Form::open(array('method' => 'POST', 'route' => array('landlord.rooms.check', $house->sn, $room->sn)))}}
                                                <div class="inline position-relative">
                                                    <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-cog icon-only bigger-110"></i>
                                                    </button>
                                                        
                                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                        <li>

                                                            {{HTML::decode(link_to_route('landlord.rooms.edit', '<span class="infobox-blue"><i class="icon-user bigger-120"></i>帳號密碼</span>', array($house->sn, $room->sn), array('class' => 'tooltip-info', 'data-rel'    =>  'tooltip', 'title'  =>  '帳號密碼')))}}
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
                            <tr>
                                <td colspan="99">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>PMU</th>
                                                <th>電壓</th>
                                                <th>電流</th>
                                                <th>累計用量<br />(最後結算用量）</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($room->pmus as $pmu)
                                                <tr>
                                                    <td>{{{ $pmu->name }}}<br />({{{$pmu->ip}}})</td>
                                                    <td>{{{ $pmu->mu_v }}}</td>
                                                    <td>{{{ $pmu->mu_a }}}</td>
                                                    <td>
                                                    @if (empty($room->getBilledType()))
                                                        <span class="red">尚未設定</span>
                                                    @else
                                                        {{{ $pmu->getUsedValue() }}}
                                                        <br />
                                                        {{{ $pmu->getLastValue() }}}
                                                    @endif
                                                    
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-app btn-success btn-xs">
                                                            <i class="icon-check bigger-160"></i>
                                                            開
                                                        </a>
                                                        <a href="#" class="btn btn-app btn-warning btn-xs">
                                                            <i class="icon-check-empty bigger-160"></i>
                                                            關
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endforeach
            </div><!-- /.table-responsive -->
        </div><!-- /span -->
    </div><!-- /row -->
@stop