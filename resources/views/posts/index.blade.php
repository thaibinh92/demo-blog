@extends('main')

@section('title','| All Post')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg btn-block btn-h1-spacing">Create New Post</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div><!-- end of .row -->

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Create At</th>
                    <th></th>
                </thead>
                <tbody>

                    @foreach($posts as $post)
                        <tr>
                            <th style="width: 5%">{{ $post->id }}</th>
                            <td style="width: 20%">{{ $post->title }}</td>
                            <td style="width: 40%">{{ substr(strip_tags($post->body),0,50) }}{{ strlen(strip_tags($post->body))>0?'...':'' }}</td>
                            <td style="width: 20%">{{ date('M j, Y',strtotime($post->created_at)) }}</td>
                            <td style="width: 15%"><a href="{{route('posts.show',$post->id)}}" class="btn btn-default btn-sm">View</a> <a href="{{route('posts.edit',$post->id)}}" class="btn btn-default btn-sm">Edit</a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>


@endsection