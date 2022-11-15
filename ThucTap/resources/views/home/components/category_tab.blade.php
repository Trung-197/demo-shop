<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach($categories as $indexCategory => $category)
            <li class="{{ $indexCategory == 0 ? 'active' :'' }}">
                <a href="category_tab_{{$category->id}}" data-toggle="tab">
                    {{$category->name}}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach($categories as $indexCategoryProduct => $category)
        <div class="tab-pane fade {{$indexCategoryProduct ==0 ? 'active in' :''}}" id="category_tab_{{$category->id}}" >
            @foreach($category->products as $productItem)
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery1.jpg" alt="" />
                            <h2>{{ number_format($productItem->price) }}</h2>
                            <p>{{$productItem->name}}</p>
                            <a href="{{route()}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div><!--/category-tab-->
