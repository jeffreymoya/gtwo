@extends('layout')

@section('headercontent')
<div class="slider-text">
    <h2>Lorem Ipsum Placerat <br>Elementum Quistue Tunulla Maris</h2>
    <p>Vivamus vitae augue at quam frigilla tristique sit amet<br> acin ante sikumpre tisdin.</p>
    <a href="#">Sitamet Tortorions</a>
</div>
<div class="slider-img">
    <img src="{{ url('images/mlm.png') }}" alt="">
</div>
@endsection

@section('content')
<div class="content_top">
                    <div class="wrap">
                       <h3>Latest Products</h3>
                    </div>
                    <div class="line"> </div>
                    <div class="wrap">
                     <div class="ocarousel_slider">  
                        <div class="ocarousel example_photos" data-ocarousel-perscroll="3">
                            <div class="ocarousel_window">
                                {{--*/ $count = 1; /*--}}
                                @foreach($latest as $item)
                                    <a href="{{ url('products', $item->id) }}"><img src="{{ url('images/product/thumb/' . ($item->image ? $item->image : 'no-image.png').'?d=100x100') }}" alt="">
                                        <p>{{ $item->name }}</p>
                                    </a>
                                @endforeach
                            </div>
                           <span>           
                            <a href="#" data-ocarousel-link="left" style="float: left;" class="prev"> </a>
                            <a href="#" data-ocarousel-link="right" style="float: right;" class="next"> </a>
                           </span>
                       </div>
                     </div>  
                   </div>           
               </div>
    <div class="content_bottom">
            <div class="wrap">
                <div class="content-bottom-left">
                        <div class="buters-guide">
                        <div class="cart">
                            @include('products.cart')
                      </div>  
                      <div class="categories">
                           <ul>
                               <h3>Browse All Categories</h3>
                                  <li><a href="#">Appliances</a></li>
                                  <li><a href="#">Sports Equipments</a></li>
                                  <li><a href="#">Computers &amp; Electronics</a></li>
                                  <li><a href="#">Office supplies</a></li>
                                  <li><a href="#">Health &amp; Beauty</a></li>
                                   <li><a href="#">Home &amp; Garden</a></li>
                                   <li><a href="#">Apparel</a></li>
                                   <li><a href="#">Toys &amp; Games</a></li>
                                   <li><a href="#">Automotive</a></li>
                             </ul>
                        </div>                          
                </div>
                
                <div class="content-bottom-right">
                <h3>Browse All Categories</h3>
                @foreach($sections as $section)
                    <div class="section group">
                    @foreach($section as $product)
                        <div class="grid_1_of_4 images_1_of_4">
                         <h4><a href="{{ url('products', $product->id) }}">{{ $product->name }}</a></h4>
                          <a href="{{ url('products', $product->id) }}"><img src="{{ url('images/product/' . ($product->image ? $product->image : 'no-image.png')) }}" alt=""></a>
                          <div class="price-details">
                           <div class="price-number">
                                <p><span class="rupees">{{ Config::get('app.currency_symbol') . $product->price}}</span></p>
                            </div>
                            <div class="add-cart">                              
                                <h4><a href="{{ url('products', $product->id) }}">More Info</a></h4>
                             </div>
                            <div class="clear"></div>
                        </div> 
                    </div> 
                    @endforeach 
                    </div>
                @endforeach
                <div class="product-articles">
                  <h3>Browse All Categories</h3>
                  <ul>
                    <li>
                  <div class="article">
                    <p><span>Aenean vitae massa dolor</span></p>
                    <p>Phasellus in quam dui. Nunc ornare, tellus rutrum porttitor imperdiet, dui leo molestie nisl, sit amet dignissim nibh magna pharetra quam. Nunc ultrices pellentesque massa, ac adipiscing dui rutrum id. In cursus augue non erat faucibus eu condimentum dolor molestie.</p>
                    <p><a href="#">+ Read Full article</a></p>
                  </div>
                  </li>
                  <li>
                   <div class="article">
                    <p><span>Phasellus sollicitudin consectetur</span></p>
                    <p>Cras aliquam, odio ac consectetur tincidunt, eros nunc fermentum augue, quis rutrum ante lectus ac lectus. Fusce sed tellus orci, et feugiat urna. Integer et dictum leo. Nulla consectetur tempus orci sed consequat. Mauris cursus est a sapien venenatis faucibus. Etiam sagittis convallis volutpat.</p>
                    <p><a href="#">+ Read Full article</a></p>
                  </div>
                  </li>
                  </ul>
                </div>
              </div>
              <div class="clear"></div>
           </div>
         </div>
    
@endsection