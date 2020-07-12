@extends('layouts.app')
@section('content')


<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    @include('layouts.nav_side_bar')

<header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
            <div class="lead-cadre py-3">
                <h1 class="font-weight-light">Contact Us</h1>
                <p class="lead">Order online or by phone</p>
            </div>
            <div class="text-left mt-5 text-white">
              <h1 style="letter-spacing: 2px;text-shadow: 2px 2px 1px">Building a better workplace <br>through food with Menu</h1>
            </div>
          
        </div>
      </div>
    </div>
  </header>
  
  <!-- Page Content -->
  <section class="py-5">
    <div class="container">
      <div class="col-md-4 mx-auto">
        <div class="card my-3">
          <div class="card-body">
            <h4 class="card-title text-center">Contact us on: 
            </h4>
            <div class="d-flex text-danger justify-content-between">
              <small class="card-text mr-2" >email@email.com</small>
            <small class="card-text ml-2">(+212) 6123 456 78</small>
            </div>
            
          </div>
        </div>
      </div>
      

      
    </div>
  </section>

  <section class="bg-light p-3">
    <div class="text-center">
      <h2 class="font-weight-light  pt-2">Menu Place</h2>
      <p class=" text-muted">Menu Foods is currently available in the Casablanca</p>

      <div>
        <div id="map-container-google-3" class="z-depth-1-half map-container-3">
          <iframe src="https://maps.google.com/maps?q=warsaw&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
            style="border:0;width: 75%;
            height: 25em;" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </section>


@endsection
