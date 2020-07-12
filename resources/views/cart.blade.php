@extends('layouts.app')
@section('content')

<?php $page = 'Cart |'; ?>

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        @include('layouts.nav_side_bar')

<div class="container">
    <div class="row mb-5">
        <div class="col-lg-8 mb-3">
            <h3 class="mt-5 mb-3">
                <img src="{{ asset('img/shopping-cart.png') }}" style="width: 7%" alt=""> My Orders </h3>

<!--TABLE NAMESSS-->

@if (session('success'))
<div class="badge badge-danger mb-2 mt-2 w-100 msg">
    {{session('success')}}
</div>
@endif

@if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
                  <table class="table table-hover">
                      <thead>
                          {{-- <tr class="text-center">
                             <th scope="col">Image</th>
                             <th scope="col">Name</th>
                             <th scope="col">Price</th>
                             <th scope="col">Quantity</th>
                             <th scope="col"></th>

                          </tr> --}}
                      </thead>


          <tbody> 
              @foreach($cart as $product)
                  <tr class="text-center">
                      <td style="5%">
                        <form action="{{ route('cart.destroy', $product-> rowId) }}" method="post" onsubmit = " return confirmDelete()">
                            @csrf
                            @method('DELETE')
                              <button class="text-danger border-0 transparent p-1 w-50" type="submit" style="cursor: pointer;"><i class="fa fa-times"></i></button>
                          </form>
                      </td>
                      <td style="width: 30%">
                          <img src="{{$product->model->image}}" class="w-75" >
                      </td>
                      <td style="width: 20%; vertical-align:middle">{{$product->model->title}} </td>
                      <td style="width: 15%; vertical-align:middle" class="text-right">
                        {{number_format($product->model->price, 2)}} DH
                      </td>
                      <td style="width: 5%; vertical-align:middle">X</td>
                      <td style="width: 15%; vertical-align:middle"class="text-left">
                          {{-- <input type="text" class="form-control-sm w-75" value="{{$product->qty}}"> --}}
                          <select class="custom-select" name="qty" id="qty" data-id="{{ $product->rowId }}">
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" {{ $product->qty == $i ? 'selected' : ''}}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                      </td>
                      <td style="width: 15%; vertical-align:middle" class="font-weight-bold">
                          {{number_format($product->model->price * $product->qty, 2)}} DH
                      </td>
                      
                  </tr>

                    
              @endforeach
              

                
          </tbody>
      </table>

      @if (Cart::count() > 0)
      <div class="float-left">
        <form action="{{ route('deleteAll') }}" method="POST">
            @csrf
         {{ method_field('DELETE') }}
         <button class="badge badge-danger p-2 w-auto border-0" style="cursor: pointer">
            <i class="fa fa-shopping-cart"></i> Remove Cart</button>
        </form>
    </div>

    <div class="clearfix"></div>
      @else
          <div>No Products in your Cart</div>
      @endif
    
    <div class="d-flex align-items-baseline mt-5" style="justify-content: flex-end;">
        <h4 class="mr-2">Subtotal: </h4>
        <h5 class="text-success">{{Cart::subtotal() }} DH </h5>
    </div>
</div>

<div class="col-lg-4">
    <div class="card mt-5 mb-3">
      <div class="card-body my-3 mx-2">
        <table class="table">
            <tbody>
                <tr>
                    <td>Subtotal</td>
                    <td>{{Cart::subtotal() }} DH</td>
                </tr>
                <tr>
                    <td>Shipping cost:</td>
                    <td>{{Cart::tax()}} DH</td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="mt-3">
                   <td><h5>Total</h5></td>
                    <td>{{Cart::total()}} DH</td> 
                </tr>
                
            </tfoot>
        </table>
            <div class="text-center">
                <a href="{{ route('products.index') }}" class="btn btn-light border-dark my-2">Continue Shopping</a>
            </div>
            <div class="text-center">
                <a href="{{ url('checkout') }}" class="btn btn-warning border-dark">Go to Checkout {{Cart::total()}} DH </a>

            </div>
            
            
      </div>
    </div>
</div>
</div>
</div>


      @endsection
@section('extra-js')
<script>
    var qty = document.querySelectorAll('#qty');
    Array.from(qty).forEach((element) => {
        element.addEventListener('change', function () {
            var rowId = element.getAttribute('data-id');
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(`cart/${rowId}/update`,
                {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN": token
                    },
                    method: 'patch',
                    body: JSON.stringify({
                        qty: this.value,
                    })
            }).then((data) => {
                console.log(data);
                location.reload();
            }).catch((error) => {
                console.log(error);
            });
        });
    });
    
</script>
    
@endsection