@extends('layouts.app')
@section('content')
<div>
    <div class="d-flex justify-content-between ">
        <h5>Products</h5>
        <a href="{{ route('products.create') }}" class="btn btn-primary">+ Add</a>
    </div>
    @foreach ($products as $product)
        <div class="shadow">
            <h1>{{$product->getName()}}</h1>
        </div>
    @endforeach
</div> 
@endsection

