@extends('layouts.app')



@section('content')


    <h1>Contact Page {{$id}}</h1>

    <h2>Contact Name {{$name}}</h2>


@stop



@section('footer')

    <h3 class="col-md-12">Footer</h3>

    <div class="col-md-12">
        @if(count($people)>0)

            @foreach($people as $name)

                {{$name}}&nbsp;|&nbsp;

            @endforeach

        @endif

    </div>
    {{--<script>alert('This is contact Page');</script>--}}

@stop