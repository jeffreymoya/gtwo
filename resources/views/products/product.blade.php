@extends('layout')

@section('assets')
<script src="{{ url('js/easyResponsiveTabs.js') }}" type="text/javascript"></script>
<link href="{{ url('css/easy-responsive-tabs.css') }}" rel="stylesheet" type="text/css" media="all"/>
 <script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
</script>        
<link rel="stylesheet" href="{{ url('css/etalage.css') }}">
<script src="{{ url('js/jquery.etalage.min.js') }}"></script>
<script>
    jQuery(document).ready(function($){

        $('#etalage').etalage({
            thumb_image_width: 300,
            thumb_image_height: 400,
            source_image_width: 900,
            source_image_height: 1200,
            show_hint: true,
            click_callback: function(image_anchor, instance_id){
                alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
            }
        });

    });
</script>
<script src="{{ url('js/star-rating.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="main">
 <div class="wrap">
    <div class="preview-page">
       <div class="section group">
        <div class="cont-desc span_1_of_2">
            <ul class="back-links">
                <li><a href="#">Home</a> ::</li>
                <li><a href="#">Product Page</a> ::</li>
                <li>{{$product->name}}</li>
                <div class="clear"> </div>
            </ul>
          <div class="product-details"> 
            <div class="grid images_3_of_2">
                    <ul id="etalage">
                    <li>
                        <a href="optionallink.html">
                            <img class="etalage_thumb_image" src="{{url('images/product/thumb/' . $product->image . '?d=275x275')}}" />
                            <img class="etalage_source_image" src="{{url('images/product/' . $product->image)}}" title="" />
                        </a>
                    </li>
                    <li>
                        <img class="etalage_thumb_image" src="{{url('images/product/thumb/' . $product->image . '?d=275x275')}}"  />
                        <img class="etalage_source_image" src="{{url('images/product/' . $product->image)}}" title="" />
                    </li>
                    <li>
                        <img class="etalage_thumb_image" src="{{url('images/product/thumb/' . $product->image . '?d=275x275')}}"  />
                        <img class="etalage_source_image" src="{{url('images/product/' . $product->image)}}" />
                    </li>
                    <li>
                        <img class="etalage_thumb_image" src="{{url('images/product/thumb/' . $product->image . '?d=275x275')}}" />
                        <img class="etalage_source_image" src="{{url('images/product/' . $product->image)}}" />
                    </li>
                </ul>
             </div>
           <div class="desc span_3_of_2">
            <h2>{{$product->name}}</h2>
            <p>{{$product->description}}</p>                   
            <div class="price">
                <p>Price: <span>{{Config::get('app.currency_symbol') . $product->price}}</span></p>
            </div>
            <div class="available">
                <ul>
                  <li><span>Units in Stock:</span>&nbsp; {{$product->available}}</li>
                </ul>
            </div>
        <div class="share-desc">
            <form action="{{url('cart')}}" method="POST" class="form-inline">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="prodId" value="{{$product->id}}">
            <div class="share">
                <p>Number of units :</p><input type="number" class="text_box" name="quantity" type="text" value="1" min="1" />              
            </div>
            <div class="button"><span><button type="submit">Add to Cart</button></span></div>
            </form>                  
            <div class="clear"></div>
        </div>
         <div class="colors-share">
            <div class="social-share">
                <h4>Share Product</h4>
                      <ul>
                            <li><a class="share-face" href="#"> </a></li>
                            <li><a class="share-twitter" href="#"> </a></li>
                            <li><a class="share-google" href="#"> </a></li>
                            <li><a class="share-rss" href="#"> </a></li>
                            <div class="clear"> </div>
                    </ul>
            </div>
            <div class="clear"></div>
         </div>
    </div>
    <div class="clear"></div>
  </div>
  </div>
   <div class="rightsidebar span_3_of_1 sidebar">
    <h3>Popular Products</h3>
    <ul class="popular-products">
        @foreach($popular as $product)
        <li>
             <h4><a href="{{ url('products', $product->id) }}">{{ $product->name }}</a></h4>
              <a href="{{ url('products', $product->id) }}"><img src="{{url('images/product/thumb/' . $product->image . '?d=200x200')}}" alt="" /></a>
              <div class="price-details">
               <div class="price-number">
                    <p><span class="rupees">{{Config::get('app.currency_symbol') . $product->price}}</span></p>
                </div>
                        <div class="add-cart">                              
                            <h4><a href="{{ url('products', $product->id) }}">More Info</a></h4>
                         </div>
                     <div class="clear"></div>
            </div>                   
        </li>
        @endforeach
     </ul>
    </div>
   </div>
</div>
        </div>
    </div>
@endsection