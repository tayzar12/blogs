@extends('layouts.app')

@section('content')
<div class="container">
   <div class="card mb-2">
      <div class="card-body">
         <h5 class="card-title">{{ $article->title }}</h5>
         <div class="card-subtitle mb-2 text-muted small">
            {{ $article->created_at->diffForHumans() }}
         </div>
         <div class="card-subtitle mb-2 text-muted small">
            {{ $article->category->name }}
         </div>
         <p class="card-text">{{ $article->description }}</p>
      </div>
   </div>
</div>
@endsection