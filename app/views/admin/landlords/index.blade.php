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
                        @foreach($landlords as $landlord)
                        <tr>
                            <td class="center">
                                <label>
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </td>
                            <td>
                                {{{ $landlord->name }}}
                            </td>
                            <td>
                                {{{ $landlord->address }}}
                            </td>
                            <td>
                                {{ HTML::decode('<span class="label label-sm '.$landlord->getStatusCss().'">'.$landlord->getStatus().'</span>') }}
                            </td>
                            <td>
                                <!-- Desktop -->
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    {{Form::open(array('method' => 'DELETE', 'route' => array('admin.landlords.destroy', $landlord->sn), 'class' => 'btn-group'))}}
                                        {{HTML::decode(link_to_route('admin.houses.index', '<i class="icon-th bigger-120"></i>租屋處', array($landlord->sn), array('class' => 'btn btn-xs btn-info')))}}
                                        {{HTML::decode(link_to_route('admin.landlords.edit', '<i class="icon-edit bigger-120"></i>編輯', array($landlord->sn), array('class' => 'btn btn-xs btn-success')))}}
                                        {{HTML::ButtonWithIcon('<i class="icon-trash bigger-120"></i>刪除', array('class' => 'btn btn-xs btn-danger', 'type'  =>  'submit')) }}
                                    {{Form::close()}}
                                </div>
                                <!-- RWD -->
                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    {{Form::open(array('method' => 'DELETE', 'route' => array('admin.landlords.destroy', $landlord->sn)))}}
                                        <div class="inline position-relative">
                                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-cog icon-only bigger-110"></i>
                                            </button>
                                                
                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                <li>

                                                    {{HTML::decode(link_to_route('admin.houses.index', '<span class="green"><i class="icon-edit bigger-120"></i></span>', array($landlord->sn), array('class' => 'tooltip-info', 'data-rel'    =>  'tooltip', 'title'  =>  '租屋處')))}}
                                                </li>
                                                <li>

                                                    {{HTML::decode(link_to_route('admin.landlords.edit', '<span class="green"><i class="icon-edit bigger-120"></i></span>', array($landlord->sn), array('class' => 'tooltip-success', 'data-rel'    =>  'tooltip', 'title'  =>  '編輯')))}}
                                                </li>

                                                <li>
                                                    {{HTML::ButtonWithIcon('<span class="red"><i class="icon-trash bigger-120"></i></span>', array('class' => 'tooltip-error simulate-submit', 'type'  =>  'submit')) }}
                                                    
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