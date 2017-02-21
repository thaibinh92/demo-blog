@extends('main')

@section('title','| Edit Blog Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea'

        });
    </script>
@endsection

@section('content')

    <div class="row">
        
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put','files'=>true]) !!}
            <div class="col-md-8">

                {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                {!! Form::text('title', null, ['class' => 'form-control','required'=>'']) !!}

                {!! Form::label('slug', 'Slug', ['class' => 'control-label']) !!}
                {!! Form::text('slug', null, ['class' => 'form-control','required'=>'','minlength'=>'5','maxlength'=>'255']) !!}

                {{ Form::label('category_id', "Category:", ['class' => 'control-label']) }}
                {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

                {{ Form::label('tags', 'Tags:') }}
                {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi','multiple'=>'mutiple']) }}

                {!! Form::label('featured_image', 'Upload Featured Image') !!}
                {!! Form::file('featured_image') !!}

                {!! Form::label('body', 'Body', ['class' => 'control-label']) !!}
                {!! Form::textarea('body', null, ['class' => 'form-control','required'=>'']) !!}

            </div>
            <div class="col-md-4">
                <div class="well">
                    <dl class="dl-horizontal">
                        <label>Url:</label>
                        <p><a href="{{ route('blog.single',$post->slug) }}">{{ route('blog.single',$post->slug) }}</a> </p>
                    </dl>
                    <dl class="dl-horizontal">
                        <label>Create At:</label>
                        <p>{{ date('M j, Y h:ia',strtotime($post->created_at)) }}</p>
                    </dl>
                    <dl class="dl-horizontal">
                        <label>Last Update:</label>
                        <p>{{ date('M j, Y h:ia',strtotime($post->updated_at)) }}</p>
                    </dl>
                    <hr>

                    <div class="row">
                        <div class="col-sm-6">
                            {!! Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block')) !!}
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}

    </div>

@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({{ json_encode($post->tags()->getRelatedIds()) }}).trigger('change');
    </script>

@endsection