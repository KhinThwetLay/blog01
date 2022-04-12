@extends('layout')

<title>{{$blog->title}}</title>

@section('content')
    <article>
       <h1> {{$blog->title}} </h1>
       <p>{!!$blog->body!!}</p>
        <a href="/">go back</a>
    </article>
@endsection
