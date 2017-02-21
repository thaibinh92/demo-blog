@extends('main')

@section('title','| About')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>About</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => 'about.post', 'method' => 'post','files'=>true]) !!}
            	{!! Form::file('file', ['class' => 'form-control']) !!}
            
            {!! Form::submit('Submit', ['class' => 'btn btn-primary ']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection