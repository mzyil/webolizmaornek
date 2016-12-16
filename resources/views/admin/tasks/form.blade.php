<div class="form-group{{ $errors->has('isim') ? ' has-error' : ''}}">
    {!! Form::label('name', 'İsim', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('status') ? ' has-error' : ''}}">
    {!! Form::label('role_id', 'Grup', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('role_id', \App\ViewHelpers::formSelectFlatter(\Bican\Roles\Models\Role::orderBy('id')->get(['id','name']), 'id', 'name'), null, ['class' => 'form-control']) !!}
        {!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('status') ? ' has-error' : ''}}">
    {!! Form::label('status', 'Durum', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('status', \App\Task::getStatusDefinitionArray(), null, ['class' => 'form-control']) !!}
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Ekle', ['class' => 'btn btn-primary']) !!}
    </div>
</div>