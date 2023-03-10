@extends('layouts.admin')

@section('content')
    
<div id="table-list">
    <div class="table-container">
        @if(session()->has('message'))
        <div class="alert alert-success mb-3 mt-3 w-75 m-auto text-capitalize">
            {{ session()->get('message') }}
        </div>
        @endif
        <a href="{{route('admin.products.create')}}" class="text-white"><button class="btn btn-primary mb-2"><i class="fa-solid fa-plus"></i></button></a>
        <table class="mb-2">
            <thead>
                <tr>
                    <th class="bl-hidden" scope="col">#</th>
                    <th scope="col">Name</th>
                    <th class="bl-hidden" scope="col">Price</th>
                    <th class="bl-hidden" scope="col">Type</th>
                    <th class="bl-hidden" scope="col">Brand</th>
                    <th class="bl-hidden" scope="col">Category</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th class="bl-hidden" scope="row">{{$product->id}}</th>
                        <td><a href="{{route('admin.products.show', $product->slug)}}" title="View product">{{$product->name}}</a></td>
                        <td class="bl-hidden">{{$product->price}}&nbsp;&euro;</td>
                        <td class="bl-hidden">{{$product->type->name}}</td>
                        <td class="bl-hidden">{{$product->brand->name}}</td>
                        <td class="bl-hidden">{{$product->category->name}}</td>
                        <td><a class="link-secondary" href="{{route('admin.products.edit', $product->slug)}}" title="Edit product"><i class="fa-solid fa-pen"></i></a></td>
                        <td>
                            <form action="{{route('admin.products.destroy', $product->slug)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$product->name}}"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links('vendor.pagination.bootstrap-5') }}
        @include('partials.admin.modal')
    </div>
</div>
@endsection
