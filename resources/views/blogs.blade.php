@extends('layout')

@section('title')
    <title>All of blogs</title>
@endsection
@section('content')
   @foreach($blogs as $blog)
   <div>
   <h1><a href="blogs/{{$blog->slug}}">{{$blog->title}}</a></h1>
   <p>published date:{{$blog->date}}</p>
   <div>
       {{$blog->intro}}
   </div>
   </div>
   @endforeach
@endsection