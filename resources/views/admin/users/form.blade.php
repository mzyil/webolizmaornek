<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', 'İsim', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
    {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('password', null, ['class' => 'form-control']) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('roles') ? ' has-error' : ''}}">
    {!! Form::label('roles', 'Roller', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('roles', \App\ViewHelpers::formSelectFlatter(\Bican\Roles\Models\Role::orderBy('id')->get(['id','name']), 'id', 'name') , null , ['class' => 'form-control']) !!}
        {{--{!! Form::password('roles', null, ['class' => 'form-control']) !!}--}}
        {{--{!! $errors->first('roles', '<p class="help-block">:message</p>') !!}--}}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Ekle', ['class' => 'btn btn-primary']) !!}
    </div>
</div>