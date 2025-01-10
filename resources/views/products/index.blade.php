@extends('layout')
@section('title', 'Products')
@section('content')
    <h1 class="title">Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Create product</a>
    <table>
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Mô tả</th>
                <th>Giá</th>
                <th>Tên cửa hàng</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->store->name }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>
                        <button style="padding: 8px 12px; border-radius: 4px;">Sửa</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links('components.pagination') }}
@endsection
