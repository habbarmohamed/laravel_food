@extends('layouts.app')

@section('content')

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    @include('layouts.nav_side_bar')
<div class="container">
    <h4 class="text-muted mt-4">
        Searching for "{{$q}}"
    </h4>
<div class="row mt-5">

  
    @foreach ($products as $product)

    <div class="col-md-6 mb-4">
        <div class="d-inline-block text-warning mb-2">
                {{ $product->category->name ?? '' }}
        </div>
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
  {{-- {{ $products->appends(request()->input())->links() }} --}}

  @include('partials.modal')
@endsection