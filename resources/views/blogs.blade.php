
<x-layout>
 @foreach($blogs as $blog)
   <div>
   <h1><a href="blogs/{{$blog->slug}}">{{$blog->title}}</a></h1>
   <p>published date:{{$blog->date}}</p>
   <div>
       {{$blog->intro}}
   </div>
   </div>
   @endforeach
</x-layout>
  
