@extends('layouts.app')
@section('content')

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    @include('layouts.nav_side_bar')
    <div class="container">
        <div class="card bg bg-light m-3">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <div class="my-5 text-center">
                    <h1>Thanks!</h1>
                    <h5>Your command has been successfully</h5>
                </div>
                <hr>
                <div class="text-center">
                    <small>Do you have a problem?</small><a href=""> Contact-us</a>
                    <div>
                        <a href="" class="btn btn-warning2 text-white my-3">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>


@endsection
