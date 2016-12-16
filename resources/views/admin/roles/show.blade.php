@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $role->name }}</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/roles/' . $role->id . '/edit') }}" class="btn btn-primary btn-xs" title="Düzenle role"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/roles', $role->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Sil role',
                                    'onclick'=>'return confirm("Silme işlemini onaylayın")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $role->id }}</td>
                                    </tr>
                                    <tr><th> İsim </th><td> {{ $role->name }} </td></tr><tr><th> Kısaltma </th><td> {{ $role->slug }} </td></tr><tr><th> Açıklama </th><td> {{ $role->description }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection