@extends('layouts.master')
@section('title')
    <title>Home page</title>
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection
@section('content')



    <body>
    <section>
        <div class="container">
            <div class="row">
                    <div class="col-sm-9 padding-right">
                        <div class="product-details"><!--product-details-->
                            <div class="col-sm-5">
                                <div class="view-product">
                                    <img src="/products/{{$product->feature_image_path}}" alt="" />
                                    <h3>ZOOM</h3>
                                </div>

                            </div>
                            <div class="col-sm-7">
                                <div class="product-information"><!--/product-information-->

                                    <h2>{{$product->name}}</h2>
                                    <p>ID : {{$product->id}}</p>
                                    <img src="images/product-details/rating.png" alt="" />
                                    <span>
									<span>{{ number_format($product->price) }} VNĐ</span>
								</span>
                                    <p><b>Description:</b>{{$product->content}}</p>
                                    @if($product->price !==NULL)
                                    <form action="{{route('add-cart')}}" method="post">
                                        <p><b>Quantity:
                                                <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                    name="num_product" value="1" style="width: 50px !important;">
                                            </b>
                                            <button type="submit" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart
                                            </button>
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                        </p>
                                        @csrf
                                    </form>
                                    @endif
                                </div><!--/product-information-->
                            </div>
                        </div><!--/product-details-->

                    </div>
                @include('components.sidebar')

            </div>
        </div>
    </section>


    @endsection
    </body>
