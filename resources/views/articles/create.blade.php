@extends('layouts.app')

@section('content')
<div class="container">
   <form method="POST">
      @csrf

      @if($errors->any())
      <div class="alert alert-warning">
         <ol>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
         </ol>
      </div>
      @endif

      <div class="form-group">
         <label for="title">Title</label>
         <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
      </div>

      <div class="form-group">
         <label for="description">Description</label>
         <textarea name="description" id="description" cols="30" rows="10"
            class="form-control">{{ old('description') }}</textarea>
      </div>

      <div class="form-group">
         <select name="category_id" class="form-control">
            <option value="">Select a category</option>

            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
         </select>
      </div>

      <button class="btn btn-primary" type="submit">Submit</button>
   </form>
</div>
@endsection