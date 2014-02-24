@extends('layouts.landlord')

@section('breadcrumbs', Breadcrumbs::render('landlord.dashboard'))
@section('main')
    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                    <tbody>
                        @foreach ($landlord->houses as $house)
                        <tr>
                            <td class="col-xs-1">
                                {{HTML::decode(link_to_route('landlord.rooms', '<i class="icon-home bigger-160"></i>Home', array($house->sn), array('class' => 'btn btn-app btn-success btn-xs')))}}
                            </td>
                            <td>
                                <h4>{{ $house->getFullAddress() }}</h4>
                            </td>
                            <td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /span -->
    </div><!-- /row -->
@stop