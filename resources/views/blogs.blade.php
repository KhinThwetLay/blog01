
<x-layout>
    <x-slot name="title">
        <title>All of Blogs</title>
    </x-slot>
 @foreach($blogs as $blog)
   <div>
   <h1><a href="blogs/{{$blog->id}}">{{$blog->title}}</a></h1>
   <p>published date:{{$blog->date}}</p>
   <div>
       {{$blog->intro}}
   </div>
   </div>
   @endforeach
</x-layout>
  
