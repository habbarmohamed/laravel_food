@extends('layouts.app')
@section('content')
    

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        @include('layouts.nav_side_bar')
    
          
    
    
        <!-- /#page-content-wrapper -->
        <div class="container-fluid ">
            <div class="row ml-1 mr-1 mt-5 mb-5">
                <div class="col-md-9 col-sm-12">
                    @if (session('success'))
                        <div class="badge badge-success mb-2 mt-2 w-100 msg">
                            {{session('success')}}
                        </div>
                    @endif
              
                    <div class="alert-warning mb-5 w-100" style="height: 15em; overflow:hidden">
                        <div class="d-flex">                            
                                <img src="{{asset('img/delivery.png')}}" class="w-50 " alt="">
                            
                            <div class="">
                                <h3 class="text-warning mt-lg-5 mt-sm-0" >0 DH delivery for 30 days! <img src="" alt=""></h3>
                                <p class="mt-lg-3 mt-sm-2">0 DH delivery free for orders over 10 DH for 30 days!</p>
                            </div>
                            <small class="p-2" style="margin-top: 15em;">
                                <a href="" class="text-warning">
                                    Learn more
                                    {{-- <span>
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </span> --}}
                                </a>
                                
                            </small>
                        </div>

                    </div>

                    <div class="mt-5">
                        <div class="d-flex">
                            <h3 class="mt-2">Restaurants</h3>
                            <img  src="{{asset('img/cheese.png')}}" alt="" style="width: 5%">
                            <div class="dropdown ml-auto">
                                <button class="btn btn-warning2 text-white  dropdown-toggle rounded-pill" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="far fa-clock" aria-hidden="true"></i>
                                    Delivery Now
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="#">Action</a>
                                  <a class="dropdown-item" href="#">Another action</a>
                                  <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                              </div>
                        </div>
                    </div>

                    <div class="d-flex owl-carousel owl-theme">
                        <div class="delivery_menu item mt-5 active p-2 mr-2" >
                            <a href="{{url('/products')}}" class="text-dark">
                                <figure class="figure">
                                    <div class="bg-white p-1 delivery_menu_categories">
                                        <img src="{{asset('img/meal.png')}}" alt="" class="w-100">
                                    </div>
                                    <div class="mt-3 text-center">
                                        <strong>All</strong>
                                    </div>
                                </figure>
                            </a>
                        </div>


                        @foreach ($categories as $category)

                        <div class="delivery_menu item mt-5  p-2 mr-2" >
                            <a href="{{route('cat_prod', $category->id)}}" class="text-dark ">
                                <figure class="figure">
                                    <div class="bg-white p-1 delivery_menu_categories">
                                        <img src="{{asset('images/Logo')}}/{{$category->image}}" alt="" class="w-100">
                                    </div>
                                    <div class="mt-3 text-center">
                                        <strong>{{$category->name}}</strong>
                                    </div>
                                </figure>
                            </a>
                        </div>
                                                    
                        @endforeach

                       

                        


                    </div>

                    <div class="row mt-5">

                        @foreach ($products as $product)

                        <div class="col-md-4 mb-3">

                                <div class="card"*>
                                    <a  onclick="showInfoModal({{$product->id}});" data-toggle="modal" data-target="#exampleModalLong">
                                        <div class="card-img">
                                            <div class="loop text-white" style="cursor: pointer"><i class="fa fa-plus"></i></div>
                                            <img src="{{$product->image}}" class="card-img-top" alt="..." id="modal_img{{$product->id}}" >
                                        </div>
                                    </a>
                                    <div class="bg-white delivery_time">
                                        <span class="">25-30</span>
                                        <span>min</span>
                                    </div>
                                    <div class="card-body">
                                    <h6 id="modal_name{{$product->id}}">{{$product->title}}</h6>
                                    <div class="">
                                        <div class="mb-3">
                                            <i class="fa fa-star"></i>
                                            <small class="">4.7</small>
                                            @if($product->tags)
                                            @foreach (json_decode($product->tags) as $tag )
                                                <span style='font-size:10px;font-family: monospace;' class="text-center" id="modal_tags{{$product->id}}">
                                                    {{$tag}}
                                                </span>                                               
                                            @endforeach
                                            @endif      

                                            <span class="ml-3 float-right  text-success ml-auto" id="modal_price{{$product->id}}">
                                                {{number_format($product->price, 2)}} DH
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                        
                                    </div>
                                    <p class="card-text text-muted" id="modal_desc{{$product->id}}">{{$product->description}}</p>
                                    </div>
                                    
                                    <div class="ml-auto badge badge-danger" style="padding: 1em 2em">
                                        <form action="{{route('cart.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <input type="hidden" name="title" value="{{$product->title}}">
                                        <input type="hidden" name="price" value="{{$product->price}}">
                                        <input type="hidden" name="image" value="{{$product->image}}">
                                        <input type="hidden" name="description" value="{{$product->description}}">
                                            <button class="transparent text-white border-0" style="margin: 0 -10px; cursor: pointer;">
                                                <i class="fa fa-shopping-cart"></i>
                                            </button>
                                      </form>  
                                        {{-- <i class="fa fa-shopping-cart text-white text-center" style="margin: 0 -6px;"></i> --}}
                                    </div>

                                    
                                    
                                </div>

                        </div>
                            

                        <!-- hidden spans -->
                        <span class="money" id="modal_category{{$product->id}}" style="display: none;">{{$product->category()->first()->name ?? ''}}</span>
                        <img src="{{asset('images/Logo')}}/{{$product->category()->first()->image ?? ''}}" alt="" id="modal_logo{{$product->id}}" style="display: none;">
                        
                       <!-- spans -->


                        @endforeach
                        

                    </div>

                </div>

                <div class="col-md-3 bg-light">
                    <div class="pt-3">
                        <h2>My <img src="{{asset('img/emoji.png')}}" alt="" style="width: 10%"> <br>Order</h2>
                    </div>
                    <div class="card bg-danger mt-5">
                        <div class="card-body">
                            <div class=" text-white">
                                <small>625 St. Marks Ave</small>
                                <a href="" class="text-warning float-right">Edit</a>
                            </div>

                            <div class=" mt-3 text-white">
                                <small><i class="fa fa-clock" aria-hidden="true"></i> 35min</small>
                                <a href="" class="text-warning float-right">Choose Time</a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <table class="table">
                            <tbody>
                                @foreach (Cart::content() as $product)
                                <tr>
                                    <td style="width: 30%">
                                        <img class="w-100" src="{{$product->model->image}}" alt="img">
                                    </td>
                                    <td style="width: 50%">
                                        <div class="d-flex">
                                            <div class=" ">
                                                <small>
                                                    <b>{{$product->qty}}</b>
                                                    <b>X</b>
                                                    <b>{{$product->model->title}}</b>
                                                </small>
                                            </div>
                                            
                                        </div>
                                    </td>
                                    <td style="width: 20%">
                                        <small> {{number_format($product->price * $product->qty, 2)}} DH</small>
                                    </td>
                                </tr>
                                    
                                @endforeach
                                
                               
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-5">
                        <h6 class="float-left">Total</h6>
                        <span class="float-right">{{Cart::total()}}DH</span>
                    </div>
                    <div class="clearfix"></div>

                    <div class="mt-5 float-right">
                        <a href="{{ url('/checkout') }}" class="btn-warning2 text-white p-3"><small>Checkout <i class="fa fa-arrow-right" aria-hidden="true"></i></small></a>
                    </div>
                    <div class="mt-5 float-right">
                        <a href="{{ url('/cart') }}" class="btn-warning text-dark p-3"><small>View Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></small></a>
                    </div>
                    
                </div>
            </div>
        </div>
    
      </div>
    
    
    
    
 

      <!-- /#wrapper -->
    </div>





    @include('partials.modal')



     


    @endsection
