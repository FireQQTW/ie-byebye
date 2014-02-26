@extends('layouts.admin')

@section('breadcrumbs', Breadcrumbs::render('admin.landlords.houses', $landlord))
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
                            <th>租屋處地址</th>
                            <th>
                                <a href="{{URL::route('admin.landlords.houses.create', $landlord->sn)}}" class="btn btn-info btn-xs pull-right">
                                    <i class="icon-plus align-top bigger-110 icon-on-right"></i>
                                    新增
                                </a>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($houses as $house)
                        <tr>
                            <td class="center">
                                <label>
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </td>
                            <td>
                                {{{ $house->getFullAddress() }}}
                            </td>
                            <td>
                                <!-- Desktop -->
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    {{Form::open(array('method' => 'DELETE', 'route' => array('admin.landlords.houses.destroy', $landlord->sn, $house->sn), 'class' => 'btn-group'))}}
                                        {{HTML::decode(link_to_route('admin.houses.rooms.index', '<i class="icon-th bigger-120"></i>房間', array($house->sn), array('class' => 'btn btn-xs btn-info')))}}
                                        {{HTML::decode(link_to_route('admin.landlords.houses.edit', '<i class="icon-edit bigger-120"></i>編輯', array($landlord->sn, $house->sn), array('class' => 'btn btn-xs btn-success')))}}
                                        {{HTML::ButtonWithIcon('<i class="icon-trash bigger-120"></i>刪除', array('class' => 'btn btn-xs btn-danger jquery-confirm', 'type'  =>  'submit')) }}
                                    {{Form::close()}}
                                </div>
                                <!-- RWD -->
                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    {{Form::open(array('method' => 'DELETE', 'route' => array('admin.landlords.houses.destroy', $landlord->sn, $house->sn)))}}
                                        <div class="inline position-relative">
                                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-cog icon-only bigger-110"></i>
                                            </button>
                                                
                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                <li>

                                                    {{HTML::decode(link_to_route('admin.houses.rooms.index', '<span class="green"><i class="icon-edit bigger-120"></i></span>', array($house->sn), array('class' => 'tooltip-info', 'data-rel'    =>  'tooltip', 'title'  =>  '房間')))}}
                                                </li>
                                                <li>

                                                    {{HTML::decode(link_to_route('admin.landlords.houses.edit', '<span class="green"><i class="icon-edit bigger-120"></i></span>', array($landlord->sn, $house->sn), array('class' => 'tooltip-success', 'data-rel'    =>  'tooltip', 'title'  =>  '編輯')))}}
                                                </li>

                                                <li>
                                                    {{HTML::ButtonWithIcon('<span class="red"><i class="icon-trash bigger-120"></i></span>', array('class' => 'tooltip-error simulate-submit jquery-confirm', 'type'  =>  'submit')) }}
                                                    
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