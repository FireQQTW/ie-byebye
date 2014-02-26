<div class="form-group">
    {{ Form::label('address', '地址', array('class' => 'col-sm-3 control-label no-padding-right')) }}
    <div class="col-sm-9">
        @include('_partials/_twzipcode_form', ['county'  =>  $county, 'district'   =>  $district, 'zipcode'  =>  $zipcode])
        {{ Form::text('address', Input::old('address') ,array('class' => 'col-xs-10 col-sm-5', 'placeholder' => '請輸入地址')) }}
    </div>
</div>

<div class="space-4"></div>

@include('_partials/_form_error', ['errors'  =>  $errors])

<div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
        {{ HTML::ButtonWithIcon('<i class="icon-ok bigger-110"></i>'.$submit_text, array('class' => 'btn btn-info', 'type' => 'submit')) }}
        {{ Form::hidden('landlord_id', $landlord->id) }}
        &nbsp; &nbsp; &nbsp;

        {{ HTML::decode(link_to_route('admin.landlords.houses.index', '<i class="icon-remove bigger-110"></i>取消', $landlord->sn, array('class' => 'btn jquery-confirm'))) }}
    </div>
</div>