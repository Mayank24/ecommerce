@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="products">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section_title text-center">Products</div>
                    </div>
                </div>
                <div class="row products_row">
                    @foreach($products as $product)
                        <!-- Product -->
                        <div class="col-xl-4 col-md-6">
                            <div class="product">
                                <div class="product_image"><img src="{{ asset('images/'.$product->image) }}" alt=""></div>
                                <div class="product_content">
                                    <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                        <div>
                                            <div>
                                                <div class="product_name"><a href="{{ url('product/'.$product->id) }}">{{ $product->name }}</a></div>
                                                {{-- <div class="product_category">In <a href="category.html">Category</a></div> --}}
                                            </div>
                                        </div>
                                        <div class="ml-auto text-right">
                                            {{-- <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div> --}}
                                            <div class="product_price text-right"><span>${{ $product->price }}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="row load_more_row">
                    <div class="col">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
