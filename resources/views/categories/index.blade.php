@extends("layouts.app")

@section("content")
<div class="container">

   @if(session('info'))
   <div class="alert alert-info">
      {{ session('info') }}
   </div>
   @endif

   @foreach($categories as $category)
   <div class="card mb-2">
      <div class="card-body">
         <h5 class="card-title">{{ $category->name }} ({{ $category->articles_count }})</h5>
         <div class="card-subtitle mb-2 text-muted small">
            {{ $category->created_at->diffForHumans() }}
         </div>
         <a class="card-link" href="{{ url("/categories/detail/$category->id") }}">
            View Detail &raquo;
         </a>
         <a href="{{ url("/categories/$category->id/delete") }}">
            Delete
         </a>
      </div>
   </div>
   @endforeach
   {{ $categories->links() }}
</div>
@endsection