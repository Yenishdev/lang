@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Product</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Name (English)</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="name_ru">Name (Russian)</label>
            <input type="text" class="form-control" id="name_ru" name="name_ru">
        </div>

        <div class="form-group">
            <label for="name_sp">Name (Spanish)</label>
            <input type="text" class="form-control" id="name_sp" name="name_sp">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
