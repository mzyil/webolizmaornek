@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Görevler</div>
                    <div class="panel-body">
                        @if(Auth::check())
                        <a href="{{ url('/admin/tasks/create') }}" class="btn btn-primary btn-xs" title="Görev Ekle"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        <br/>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> İsim </th><th> Durum </th><th>Sorumlu Grup</th>@if(Auth::check())<th>İşlemler</th>@endif
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($tasks) !== 0)
                                @foreach($tasks as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ \App\Task::getStatusDefinitionArray()[$item->status] }}</td>
                                        <td>{{ $item->role->name }}</td>
                                        @if(Auth::check())
                                        <td>
                                            <a href="{{ url('/admin/tasks/' . $item->id) }}" class="btn btn-success btn-xs" title="Görüntüle task"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            <a href="{{ url('/admin/tasks/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Düzenle task"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/tasks', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Sil task" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Sil task',
                                                        'onclick'=>'return confirm("Silme işlemini onaylayın")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <h5>Eklenmiş görev yok.</h5>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $tasks->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection