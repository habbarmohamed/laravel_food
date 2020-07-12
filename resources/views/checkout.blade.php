@extends('layouts.app')
@section('content')

<?php $page = 'Checkout |'; ?>

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('extra-script')
    <script src="https://js.stripe.com/v3/"></script>
@endsection


    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        @include('layouts.nav_side_bar')


    <main id="main" role="main">
        <section id="checkout-banner">
            <div class="container py-5 text-center">
                <i class="fa fa-credit-card fa-3x text-light"></i>
                <h2 class="my-3">Checkout</h2>
           
            </div>
        </section>
        <section id="checkout-container">
            <div class="container">
                <div class="row py-5">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Your cart</span>
                            <span class="badge badge-secondary badge-pill">{{Cart::content()->count()}}</span>
                        </h4>

                        @if (session('success'))
                        <div class="badge badge-success mb-2 mt-2 w-100 msg">
                            {{session('success')}}
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="badge badge-danger mb-2 mt-2 w-100 msg">
                            {{session('error')}}
                        </div>
                        @endif
                        
                            
                        <ul class="list-group mb-3 " style="background-color: white !important">
                            
                            @foreach (Cart::content() as $item)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div class="w-75">
                                <h6 class="my-0">{{$item->model->title}} X {{$item->qty}}</h6>
                                    <small class="text-muted">{{$item->model->description}}</small>
                                </div>
                                <span class="text-muted w-25 text-right">{{number_format($item->price, 2)}} DH</span>
                            </li>
                            @endforeach

                            @if (request()->session()->has('coupon'))
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <form action="{{ route('cart.destroy.coupon') }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <strong class="text-muted">Promo Code 
                                        ({{ request()->session()->get('coupon')['code'] }}) 
                                    </strong>
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            <strong>{{ number_format(request()->session()->get('coupon')['remise'], 2) }} DH</strong></li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <strong class="text-muted">New Subtotal</strong>
                                <strong>
                            {{ number_format(Cart::subtotal() - request()->session()->get('coupon')['remise'] , 2)}} DH
                            </strong></li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <strong class="text-muted">Tax</strong>
                                <strong>
                            {{ number_format((Cart::subtotal() - request()->session()->get('coupon')['remise']) * (config('cart.tax') / 100), 2) }} DH
                            </strong></li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <strong class="text-muted">Total</strong><strong>
                            {{ number_format((Cart::subtotal() - request()->session()->get('coupon')['remise']) +(Cart::subtotal() - request()->session()->get('coupon')['remise']) * (config('cart.tax') / 100), 2) }} DH
                            </strong></li>
                            @else
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <strong class="text-muted">Taxe</strong><strong>{{ (Cart::tax()) }} DH</strong></li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <strong class="text-muted">Total</strong>
                                <h5 class="font-weight-bold">{{ number_format(Cart::total(), 2) }} DH</h5>
                            </li>
                            @endif


                        </ul>
                        @if (!request()->session()->has('coupon'))
                        <form class="card p-2" method="POST" action="{{ route('cart.store.coupon') }}">
                            @csrf
                            
                            <small>
                                <strong>Take advantage of a discount 
                                     30%
                                </strong>
                            </small>
                            <div class="input-group">
                                
                                <input type="text" class="form-control" placeholder="Coupon code" name="code">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary">Got</button>
                                </div>
                            </div>
                        </form>
                        @else
                        <div class="p-4">
                            <p class=" mb-4">Coupon already apply.</p>
                            <hr>
                        </div>
                        @endif
                        <div class="payment-methods">
                            <p class="pt-4 mb-2">Payment Options</p>
                            <hr>
                            <ul class="list-inline d-flex">
                                <li class="mx-1 text-info">
                                    <i class="fa fa-cc-visa fa-2x "></i>
                                </li>
                                <li class="mx-1 text-info">
                                    <i class="fa-2x fa fa-cc-stripe"></i>
                                </li>
                                <li class="mx-1 text-info">
                                    <i class="fa-2x fa fa-cc-paypal"></i>
                                </li>
                                <li class="mx-1 text-info">
                                    <i class="fa-2x fa fa-cc-jcb"></i>
                                </li>
                                <li class="mx-1 text-info">
                                    <i class="fa-2x fa fa-cc-discover"></i>
                                </li>
                                <li class="mx-1 text-info">
                                    <i class="fa-2x fa fa-cc-amex"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Billing address</h4>

                        
                       
                            <form id="payment-form" action="{{ route('checkout.store') }}" method="POST"  class="needs-validation">
                                @csrf
                                <div class="row">
                                
                                <div class="col-md-12 mb-3">
                                    <label for="firstName">Full name</label>
                                <input type="text" class="form-control" id="firstName" value="{{Auth::user()->name}}" placeholder="" value="" >
                                    <div class="invalid-feedback">
                                        Valid full name is .
                                    </div>
                                </div>
                               
                            </div>

                            <div class="mb-3">
                                <label for="email">Email
                                    <span class="text-muted">(Optional)</span>
                                </label>
                                <input type="email" class="form-control" id="email" value="{{Auth::user()->email}}" placeholder="you@example.com">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="phone">Phone
                                </label>
                                <input type="phone" class="form-control" id="phone" name="phone" placeholder="(Example: 061234567)">
                                <div class="invalid-feedback">
                                    Please enter a valid phone address for shipping updates.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="1234 Main St" >
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-7 mb-3">
                                    <label for="state">City</label>
                                    <select class="custom-select d-block w-100" id="city" >
                                        <option value="">Choose...</option>
                                        <option>Caasablanca</option>
                                        <option>Rabat</option>
                                        <option>ElJadida</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="zip">Zip</label>
                                    <input type="text" class="form-control" id="postal_code" placeholder="" >
                                    <div class="invalid-feedback">
                                        Zip code .
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="same-address">
                                <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="save-info">
                                <label class="custom-control-label" for="save-info">Save this information for next time</label>
                            </div>
                            <hr class="mb-4">

                    
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="cc-name">Name on card</label>
                                    <input type="text" class="form-control" id="name_on_card" placeholder="" >
                                    <small class="text-muted">Full name as displayed on card</small>
                                    <div class="invalid-feedback">
                                        Name on card is 
                                    </div>
                                </div>
                            </div>
                                <div id="card-element">
                                  <!-- Elements will create input elements here -->
                                </div>
                              
                                <!-- We'll put the error messages in this element -->
                                <div id="card-errors" role="alert"></div>
                                                        
                            <hr class="mb-4">
                            <button  id="submit" class="btn btn-primary btn-lg btn-block" type="submit">
                                <i class="fa fa-credit-card"></i> Continue to checkout
                            </button>


                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-3 mx-3" id="suggested-items">
            <div class="container-fluid">
                <div class="p-3 mb-2 bg-dark text-white">You May Also Like</div>
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col col-md-3 d-flex mb-2">
                        <div class="card"*>
                            <a  onclick="showInfoModal({{$product->id}});" data-toggle="modal" data-target="#exampleModalLong">
                                <div class="card-img">
                                    <div class="loop text-white"><i class="fa fa-plus"></i></div>
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
                                        ${{number_format($product->price, 2)}}
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
        </section>
      {{-- to top  --}}
    </main>

    @include('partials.modal')

    @endsection

    @section('extra-js')
        <script>
        var stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');
        var elements = stripe.elements();

        var style = {
        base: {
            color: "#32325d",
            }
        };

        

        var card = elements.create("card", { style: style });
        card.mount("#card-element");

        card.on('change', ({error}) => {
            const displayError = document.getElementById('card-errors');
            if (error) {
                displayError.textContent = error.message;
            } else {
                displayError.textContent = '';
            }
            });

            var submitted = document.getElementById('submit');

submitted.addEventListener('click', function(ev) {
  ev.preventDefault();
  submitted.disabled = true;
  
  stripe.confirmCardPayment('{{$clientSecret}}', {
    payment_method: {
      card: card,
      billing_details: {
        name: 'Jenny Rosen'
      }
    }
  }).then(function(result) {
    if (result.error) {
        submitted.disabled = false;
      // Show error to your customer (e.g., insufficient funds)
      console.log(result.error.message);
    } else {
      // The payment has been processed!
      if (result.paymentIntent.status === 'succeeded') {
          var paymentIntent = result.paymentIntent;
          var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        var form = document.getElementById('payment-form');
        var url = form.action;
        var redirect = 'thanks';

        fetch(
            url,
            {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "Application/json, text-plain, */*",
                    "X-Requested-with": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token,
                },
                method: 'post',
                body: JSON.stringify({
                    paymentIntent: paymentIntent
                })
            }
        ).then((data) => {
            console.log(data)
            window.location.href = redirect;
        }).catch((error) => {
            console.log(error)
        })
      }
    }
  });
});

        </script>
    @endsection