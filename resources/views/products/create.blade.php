@extends('layout')
@section('title', 'Create product')
@section('content')
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea type="text" name="description"></textarea>
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" name="price">
        </div>
        <div>
            <label for="store_id">Store</label>
            <select type="text" name="store_id">
                @foreach ($stores as $store)
                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Save</button>
    </form>
@endsection
