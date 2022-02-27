@extends("layouts.app")

@section("content")
<div class="container">

   @if(session('info'))
   <div class="alert alert-info">
      {{ session('info') }}
   </div>
   @endif

   @foreach($articles as $article)
   <div class="card mb-2">
      <div class="card-body">
         <h5 class="card-title">
            <a href="{{ url("/articles/$article->id/detail") }}">
               {{ $article->title }}
            </a>
         </h5>
         <div class="card-subtitle mb-2 text-muted small">
            {{ $article->created_at->diffForHumans() }}
         </div>
         <div class="card-subtitle mb-2 text-muted small">
            {{ $article->category->name }}
         </div>
         <p class="card-text">{{ $article->description }}</p>
         @auth
         <a class="card-link" href="{{ url("/articles/detail/$article->id") }}">
            Edit &raquo;
         </a>
         <a href="{{ url("/articles/$article->id/delete") }}">
            Delete
         </a>
         @endauth
      </div>
   </div>
   @endforeach
   {{ $articles->links() }}
</div>
@endsection