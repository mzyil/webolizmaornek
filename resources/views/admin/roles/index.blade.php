@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Roles</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/roles/create') }}" class="btn btn-primary btn-xs" title="role Ekle"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Name </th><th> Slug </th><th> Description </th><th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->slug }}</td><td>{{ $item->description }}</td>
                                        <td>
                                            <a href="{{ url('/admin/roles/' . $item->id) }}" class="btn btn-success btn-xs" title="Görüntüle role"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            <a href="{{ url('/admin/roles/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Düzenle role"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/roles', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Sil role" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Sil role',
                                                        'onclick'=>'return confirm("Silme işlemini onaylayın")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $roles->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection