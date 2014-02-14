<div class="form-group">
    {{ Form::label('name', '房間名稱', array('class' => 'col-sm-3 control-label no-padding-right')) }}
    <div class="col-sm-9">
        {{ Form::text('name', Input::old('name') ,array('class' => 'col-xs-10 col-sm-5', 'placeholder' => '請輸入名稱')) }}
    </div>
</div>

<div class="space-4"></div>

<div class="form-group">
    {{ Form::label('billed', '儲值金額', array('class' => 'col-sm-3 control-label no-padding-right')) }}
    <div class="col-sm-9">
        {{ Form::text('billed', Input::old('billed') ,array('class' => 'col-xs-10 col-sm-5', 'placeholder' => '請輸入金額')) }}
    </div>
</div>

<div class="space-4"></div>

<div class="form-group">
    {{ Form::label('isEnabled', '狀態', array('class' =>  'col-sm-3 control-label no-padding-right')) }}
    <div class="col-sm-9">
        <label>
            {{ Form::checkbox('isEnabled', '1', Input::old('isEnabled'), array('class'  =>  'ace ace-switch ace-switch-2')) }}
            <span class="lbl"></span>
        </label>
    </div>
</div>

<div class="space-4"></div>

@include('_partials/_form_error', ['errors'  =>  $errors])

<div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
        {{ HTML::ButtonWithIcon('<i class="icon-ok bigger-110"></i>'.$submit_text, array('class' => 'btn btn-info', 'type' => 'submit')) }}
        {{ Form::hidden('house_id', $house->id) }}
        &nbsp; &nbsp; &nbsp;

        {{ HTML::decode(link_to_route('admin.houses.rooms.index', '<i class="icon-remove bigger-110"></i>取消', null, array('class' => 'btn'))) }}
    </div>
</div>