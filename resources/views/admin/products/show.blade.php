@extends('layouts.admin')

@section('content')
    <section class="container my-5" id="show">
        <h1 class="mb-5">Show Product: {{$product->name}}</h1>
        <div class="row">
            <div class="img-box col-12 col-lg-4 col-md-6 me-5">
                @if($product->image)
                    <img class="shadow" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                @else
                    <img class="shadow" src="https://dummyimage.com/1200x840/000/fff" alt="C/O https://dummyimage.com/">
                @endif
            </div>
            <div class="col-12 col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-6 col-md-12">
                                <div class="mb-2">
                                    <span class="fw-bold">Nome:</span> {{$product->name}}
                                </div>
                                <div class="mb-2">
                                    <span class="fw-bold">Prezzo:</span> &euro; {{$product->price}}
                                </div>
                                <div class="mb-2">
                                    <span class="fw-bold">Disponibilit√†:</span> {{$product->available == 1 ? 'Si' : 'No'}}
                                </div>
                                <div class="mb-2 text-capitalize">
                                    <span class="fw-bold">Rating:</span> {{$product->rating}}
                                </div>
                            </div>
                            <div class="col-6 col-md-12">
                                <div class="mb-2 text-capitalize">
                                    <span class="fw-bold">Tipo:</span> {{$product->type->name}}
                                </div>
                                <div class="mb-2 text-capitalize">
                                    <span class="fw-bold">Categoria:</span> {{$product->category->name}}
                                </div>
                                <div class="mb-2 text-capitalize">
                                    <span class="fw-bold">Brand:</span> {{$product->brand->name}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-2 text-capitalize row">
                            @if (count($product->tags))
                                <span class="fw-bold">Tags:</span>
                                @foreach ($product->tags as $tag)
                                    <div class="col-6 col-md-6 col-sm-4">{{ $tag->name }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <span class="fw-bold">Descrizione:</span>
            <div class="mt-2">
                {{$product->description}}
            </div>
        </div>
    </section>
@endsection
