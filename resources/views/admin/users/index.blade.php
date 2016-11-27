@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Kullanıcılar</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/users/create') }}" class="btn btn-primary btn-xs" title="Kullanıcı Ekle"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> İsim </th><th> Email </th><th> Grup </th><th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->roles()->get(['name'])[0]->name }}</td>
                                        <td>
                                            <a href="{{ url('/admin/users/' . $item->id) }}" class="btn btn-success btn-xs" title="Görüntüle user"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            <a href="{{ url('/admin/users/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Düzenle user"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/users', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Sil user" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Sil user',
                                                        'onclick'=>'return confirm("Silme işlemini onaylayın")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $users->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection