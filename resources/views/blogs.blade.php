
<x-layout>
    <x-slot name="title">
        <title>All of Blogs</title>
    </x-slot>
 @foreach($blogs as $blog)
   <div>
   <h1><a href="blogs/{{$blog->slug}}">{{$blog->title}}</a></h1>
   <p>published date:{{$blog->created_at->diffForHumans();}}</p>
   <div>
       {{$blog->intro}}
   </div>
   </div>
   @endforeach
</x-layout>
  
