@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $user->name }}</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/users/' . $user->id . '/edit') }}" class="btn btn-primary btn-xs"
                           title="Düzenle user"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/users', $user->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Sil user',
                                'onclick'=>'return confirm("Silme işlemini onaylayın")'
                        ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <th> İsim</th>
                                    <td> {{ $user->name }} </td>
                                </tr>
                                <tr>
                                    <th> Email</th>
                                    <td> {{ $user->email }} </td>
                                </tr>
                                <tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection