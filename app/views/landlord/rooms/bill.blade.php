@extends('layouts.landlord')

@section('breadcrumbs', Breadcrumbs::render('landlord.rooms.edit.bill', $room))
@section('main')
    {{ Form::model($room, array('method'   =>  'POST', 'route' => array('landlord.rooms.update.bill', $room->house->sn, $room->sn), 'class' => 'form-horizontal', 'role' => 'form')) }}
         <div class="form-group">
             {{ Form::label('billType', '計價方式', array('class' => 'col-sm-3 control-label no-padding-right')) }}
            <div class="radio col-sm-9">
                <label class="inline">
                    {{ Form::radio('billType', 'walt', $room->getBilledType() == 'walt' ? true : false, array('class'    =>  'ace')) }}
                    <span class="lbl">
                        每度
                    </span>
                </label>
                <label class="inline">
                    {{ Form::radio('billType', 'time', $room->getBilledType() == 'time' ? true : false, array('class'    =>  'ace')) }}
                    <span class="lbl">
                        每小時
                    </span>
                </label>
            </div>
        </div>

        <div class="space-4"></div>

        <div class="form-group">
            {{ Form::label('billValue', '費用', array('class' => 'col-sm-3 control-label no-padding-right')) }}
            <div class="col-sm-9">
                {{ Form::text('billValue', $room->getBilledUnitPrice() ,array('class'   =>  'col-xs-10 col-sm-5', 'placeholder' =>  '請輸入費用')) }}
            </div>
        </div>

        <div class="space-4"></div>
        
        <div class="form-group">
            {{ Form::label('billed', '餘額', array('class' => 'col-sm-3 control-label no-padding-right')) }}
            <div class="col-sm-9">
                {{ Form::text('billed', $room->billed ,array('class'   =>  'col-xs-10 col-sm-5', 'placeholder' =>  '請輸入餘額')) }}
            </div>
        </div>

        <div class="space-4"></div>
        @include('_partials/_form_error', ['errors'  =>  $errors])
        <div class="clearfix form-actions">
            <div class="col-md-offset-3 col-md-9">
                {{ HTML::ButtonWithIcon('<i class="icon-ok bigger-110"></i>儲存', array('class' => 'btn btn-info', 'type' => 'submit')) }}

                &nbsp; &nbsp; &nbsp;

                {{ HTML::decode(link_to_route('landlord.rooms', '<i class="icon-remove bigger-110"></i>取消', array($room->house->sn), array('class' => 'btn'))) }}
            </div>
        </div>
    {{ Form::close() }}
@stop