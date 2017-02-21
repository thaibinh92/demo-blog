@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Thaibinh</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/thaibinh/create') }}" class="btn btn-primary btn-xs" title="Add New thaibinh"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Title </th><th> Content </th><th> Category </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($thaibinh as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td><td>{{ $item->content }}</td><td>{{ $item->category }}</td>
                                        <td>
                                            <a href="{{ url('/admin/thaibinh/' . $item->id) }}" class="btn btn-success btn-xs" title="View thaibinh"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/thaibinh/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit thaibinh"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/thaibinh', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete thaibinh" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete thaibinh',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $thaibinh->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection