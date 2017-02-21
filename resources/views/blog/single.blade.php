@extends('main')

@section('title',"| $post->title ")

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="{{ asset('img/'.$post->image) }}">
            <h1>{{ $post->title }}</h1>
            <p>{!!  $post->body !!} </p>
            <hr>
            <p>Posted In: {{ $post->category->name }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="comments-title"> <span class="glyphicon glyphicon-comment"></span>{{ count($post->comments) }} Comments</h2>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="{{ asset('img/avatar.jpg') }}" class="author-image">
                        <div class="author-name">
                            <h4>{{ $comment->name }}</h4>
                            <p class="author-time">{{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
                        </div>

                    </div>
                    <div class="comment-content">
                        {{ $comment->comment }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2">
            {!! Form::open(['route' => ['comments.store',$post->id], 'method' => 'post']) !!}
            	<div class="row">
                    <div class="col-md-6">
                        {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-12">
                        {!! Form::label('comment', 'Comment:', ['class' => 'control-label']) !!}
                        {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
                        
                        {!! Form::submit('Add Comment', ['class' => 'btn btn-success btn-block btn-h1-spacing']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection