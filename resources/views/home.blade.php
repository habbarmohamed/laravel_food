@extends('layouts.app')

@section('content')

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    @include('layouts.nav_side_bar')
<div style=
'background-image: url("https://images.pexels.com/photos/784633/pexels-photo-784633.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500 1x");  
background-size: cover;
background-position: center '>
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-9">
            <div class="card my-5" style="background-color: #fff8f896">
                <div class="card-header">My Orders</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="card  my-5" style="background-color: #fff8f896">
                            <div class="card-header">
                         All Orders placed by <strong class="text-capitalize">{{ Auth::user()->name }}</strong> 
                            </div>
                            <div class="card-body my-3">
                                <h4>Products List :</h4>
                    <table class="table table-responsive text-center">
                        <thead class="">
                            <tr>
                                <th>Image </th>
                                <th>Name </th>
                                <th>Price </th>
                                <th>Quantity </th>
                                <th>Amount </th>
                                <th>Date Of Order </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach (Auth()->user()->orders as $order)

                                @foreach (unserialize($order->products) as $product)
                                <tr>
                                    <td class="td-order"><img src="{{ $product[0] }}" class="w-100" alt=""></td>
                                    <td class="td-order">{{ $product[1] }}</td>
                                    <td class="td-order">{{number_format( $product[2], 2)}} DH</td>
                                    <td class="td-order">{{ $product[3] }}</td>
                                    <td class="td-order">{{number_format( $order->amount, 2)}} DH</td>
                                    <td class="td-order">{{ Carbon\Carbon::parse($order->payment_created_at)->format('d/m/Y à H:i')}}</td>
                                </tr>
                        

                                @endforeach
                            @endforeach
                            
                            </tbody>
                    </table>

                </div>
            </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection