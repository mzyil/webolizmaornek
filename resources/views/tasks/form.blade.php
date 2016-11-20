<div class="form-group {{ $errors->has('isim') ? 'has-error' : ''}}">
    {!! Form::label('isim', 'Isim', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('isim', null, ['class' => 'form-control']) !!}
        {!! $errors->first('isim', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Ekle', ['class' => 'btn btn-primary']) !!}
    </div>
</div>