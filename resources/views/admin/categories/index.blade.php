@extends('layouts.app')

@section('title', 'Admin:users')

@section('content')
   <form action="" method="post" class="row mt-3">
    @csrf
        <div class="col-6">
            <input type="text" name="category" id="category" class="form-control" placeholder="Add a category">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add</button>
        </div>
   </form>

   <table class="table -hover align-middle mt-3">
      <thead class="table-sm table-warning">
          <th>#</th>
          <th>Name</th>
          <th>COUNT</th>
          <th>LAST UPDATED</th>
          <th></th>
          <th></th>
      </thead>
      <tbody>
            @foreach ($post->category_post as $category_post)
                            <div class="badge bg-secondary bg-opacity-50">
                                {{ $category_post->category->name }}
                            </div>
                        @endforeach
      </tbody>

   </table>
@endsection