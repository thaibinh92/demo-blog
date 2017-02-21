@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">thaibinh {{ $thaibinh->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/thaibinh/' . $thaibinh->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit thaibinh"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/thaibinh', $thaibinh->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete thaibinh',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $thaibinh->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $thaibinh->title }} </td></tr><tr><th> Content </th><td> {{ $thaibinh->content }} </td></tr><tr><th> Category </th><td> {{ $thaibinh->category }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection