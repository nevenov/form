@extends('layouts.app')



@section('content')

    <h1>Create Post</h1>

    {{--<form method="post" action="/posts">--}}

    {{--{{csrf_field()}}--}}

    {!! Form::open(['method'=>'POST', 'action'=>'PostsController@store', 'files'=>true]) !!}



    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
        {{--<input type="text" name="title" placeholder="Enter title">--}}
    </div>

    <div class="form-group">
        {!! Form::file('file', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>
        {{--<input type="submit" name="submit">--}}

    {!! Form::close() !!}


    {{--</form>--}}


    {{--{{ dump($errors->all()) }}--}}

    @if(count($errors) > 0)

        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)

                <li>{{$error}}</li>

            @endforeach
            </ul>
        </div>

    @endif


@endsection
