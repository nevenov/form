@extends('layouts.app')



@section('content')

    <h1>Edit Post</h1>


    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostsController@update', $post->id]]) !!}


        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}


        {!! Form::submit('Update Post', ['class'=>'btn btn-alert']) !!}

    {!! Form::close() !!}




    <br><br><br><br>



    {!! Form::open(['method'=>'DELETE', 'action'=>['PostsController@destroy', $post->id]]) !!}


    {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}

    {!! Form::close() !!}



    {{--<form method="post" action="/posts/{{$post->id}}">--}}

        {{--<input type="hidden" name="_method" value="DELETE">--}}


        {{--<input type="submit" name="submit" value="DELETE">--}}

    {{--</form>--}}


@endsection