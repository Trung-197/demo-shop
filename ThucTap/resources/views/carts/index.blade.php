@extends('layouts.master')
@section('title')
    <title>Home page</title>
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection
@section('content')
    <body>
    <section id="cart_items">
        <div class="container">
            <form action="{{route('update-cart')}}" method="post">
                @if (count($products) != 0)
                    @php
                        $total = 0;
                    @endphp
                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Shopping Cart</li>
                        </ol>
                    </div>
                    <div class="table-responsive cart_info">
                        <table class="table table-condensed" style="margin-bottom: -20px">
                            <thead>
                            <tr class="cart_menu">
                                <td class="image">Item</td>
                                <td class="description"></td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Price</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key => $product)
                                <tr>
                                    <td class="cart_product">
                                        <a href=""><img src="/products/{{$product->feature_image_path}}" width="50px" height="50px" alt=""></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">{{$product->name}}</a></h4>
                                        <p>ID : {{$product->id}}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{number_format($product->price)}} VNĐ</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">

                                            <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                   name="num_product[{{$product->id}}]" value="{{$carts[$product->id]}}" min="1" style="width: 50px !important;">
                                        </div>
                                    </td>
                                    @php
                                        $price = $product->price;
                                        $priceEnd = $price * $carts[$product->id];
                                        $total += $priceEnd;
                                    @endphp
                                    <td class="cart_total">
                                        <p class="cart_total_price">{{number_format($priceEnd)}} VNĐ</p>

                                    </td>

                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete" href="/carts/delete/{{$product->id}}"><i class="fa fa-times"></i></a>
                                    </td>

                                </tr>

                            @endforeach
                            </tbody>

                        </table>
                        <div class="text-center">
                            <input type="submit" value="Update Cart" formaction="{{route('update-cart')}}"
                                   class="btn btn-default update" style="margin-bottom: 20px">
                            @csrf
                            <p class="cart_total_price">Total : {{number_format($total)}} VNĐ</p>

                        </div>

                    </div>
            </form>
            @else
                <div class="text-center"><h2>Giỏ hàng trống</h2></div>
            @endif
        </div>

    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>CHECK OUT</h3>
            </div>
            <div class="row">
                <form action="{{route('checkout')}}" method="post">
                    <div class="col-sm-6">
                        <div class="total_area">

                            <ul>
                                <li>Customer :  <input class="" type="text" name="name" style="width: 350px" placeholder="" required></li>
                                <li>Phone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <input class="" type="text" name="phone" style="width: 350px" placeholder="" required></li>
                                <li>Address &nbsp;&nbsp;&nbsp;:  <input class="" type="text" name="address" style="width: 350px" placeholder="" required></li>
                                <li>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <input class="" type="text" name="email" style="width: 350px" placeholder="" required></li>
                                <li>Content &nbsp;&nbsp;&nbsp;&nbsp;:  <textarea class="" type="text" name="content" style="width: 350px"></textarea></li>

                            </ul>
                            <input type="submit" class="btn btn-default update" value="CHECK OUT">
                            @csrf
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section><!--/#do_action-->
    @endsection
    </body>


