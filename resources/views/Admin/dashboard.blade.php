@extends('layouts.headerDASH')
    @section('dashboard')
       

        <!-- Page wrapper  -->
        <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Dashboard</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
              
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-screen-desktop"></i></h3>
                                            <p class="text-muted">MYNEW CLIENTS</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-primary">{{ $users->count()}}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-note"></i></h3>
                                            <p class="text-muted">NEW PRODUCTS</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-cyan">{{ $products->count()}}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
          
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">All SALES</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-success">{{$orders->count()}}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Info box -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Over Visitor, Our income , slaes different and  sales prediction -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="card-title">Sales Overview</h5>
                                        <h6 class="card-subtitle">Check the monthly sales </h6>
                                    </div>
                                    <div class="ml-auto">
                                        <select class="custom-select b-0">

                                            <option value="1"> First TO Last</option>
                                            <option value="1"> Last TO First</option>
                                            
                                            
                                            
                                        </select>
                                    </div>
                                    <div class="ml-auto">
                                        <select class="custom-select b-0">
                                            <option>January</option>
                                            <option value="1">February</option>
                                            <option value="2">March</option>
                                            <option value="3">April</option>
                                            <option value="3">May</option>
                                            <option value="3">June</option>
                                            <option value="3">July</option>
                                            <option value="3">August</option>
                                            <option value="3">September</option>
                                            <option value="3">October</option>
                                            <option value="3">November</option>
                                            <option value="3" selected="">December</option>
                                        </select>
                                    </div>

                                    <div class="ml-auto" style="margin: 0 !important">
                                        <select class="custom-select b-0">
                                            <option value="0">2017</option>
                                            <option value="1">2018</option>         
                                            <option value="2" selected="">2019</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-6">
                                        <h3>June 2020</h3>
                                        <h5 class="font-light m-t-0">Report for this month</h5></div>
                                    <div class="col-6 align-self-center display-6 text-right">
                                        <h2 class="text-success">$3,690</h2></div>
                                </div>
                            </div>
                            <div class="table-responsive" style="padding: 1em;">
                                <table class="table table-responsive text-center">
                                    <thead class="">
                                        <tr>
                                            <th>User </th>
                                            <th>Image </th>
                                            <th>Name </th>
                                            <th>Price </th>
                                            <th>Quantity </th>
                                            <th>Amount </th>
                                            <th>Date Of Order </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($orders as $order)
            
                                            @foreach (unserialize($order->products) as $product)
                                            <tr>
                                                <td style="width: 14.28%" class="td-order">{{ $order->user->name}}</td>
                                                <td style="width: 14.28%" class="td-order"><img src="{{ $product[0] }}" class="w-50" alt=""></td>
                                                <td style="width: 14.28%" class="td-order">{{ $product[1] }}</td>
                                                <td style="width: 14.28%" class="td-order">{{number_format( $product[2], 2)}} DH</td>
                                                <td style="width: 14.28%" class="td-order">{{ $product[3] }}</td>
                                                <td style="width: 14.28%" class="td-order">{{number_format( $order->amount, 2)}} DH</td>
                                                <td style="width: 14.28%" class="td-order">{{ Carbon\Carbon::parse($order->payment_created_at)->format('d/m/Y à H:i')}}</td>
                                            </tr>
                                    
            
                                            @endforeach
                                        @endforeach
                                        
                                        </tbody>
                                </table>

                                {{-- <div class="float-right">{{ $products->links() }}</div> --}}
                            </div>
                        </div>
                    </div>

                                
                         
                    <!-- Column -->
                    <div class="col-lg-4 col-md-12">
                        <div class="row">
                            <!-- Column -->
                            <div class="col-md-12">
                                <div class="card bg-cyan text-white" style="background-color: #a09fa5 !important">
                                    <div class="card-body ">
                                        <div class="row weather">
                                            <div class="col-6 m-t-40">
                                                <h3>&nbsp;</h3>
                                                <div class="display-4">
                                                    <img src="{{asset('img/products/discover.jpg')}}" alt="" style="height: 3.6em;"></div>
                                                <p class="text-white">All Around the city</p>
                                                <h4>Be On Time</h4>
                                            </div>
                                            <div class="col-6 text-right">
                                                <h1 class="m-b-"><i class="wi wi-day-cloudy-high"></i></h1>
                                                <b class="text-white">Delivery </b>
                                                <p class="op-5">Deal of delivery</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Comment - table -->
                <!-- ============================================================== -->
                <div class="mt-5"></div>
            <h3>List Of Products</h3>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="table-responsive">

                                
                            <table class="table text-center" id="myTable" style="background-color: #b4d8e84a">
                                <thead>
                                    <tr>
                                        <th width="25">ID</th>
                                        <th width="50">Image</th>
                                        <th width="50">Name</th>
                                        <th width="100">Desc</th>
                                        <th width="50">Price</th>
                                        <th width="50">Tags</th>
                                        <th width="50">Category</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    
                                   @if($products)
                                        @foreach($products as $product)

                                        <tr>
                                            <td>{{$product->id}}</td>

                                            <td>
                                                <img src="{{$product->image}}" alt="" class="img-responsive" width="80">
                                            </td>

                                            <td>{{$product->title}}</td>

                                            <td>{{substr($product->description, 0, 50)}} ...</td>

                                            <td>{{$product->price}} 
                                                <i class="fas fa-dollar-sign" style="color: #00000073"></i>
                                            </td>

                                            <td>
                                                @if($product->tags)
                                                @foreach(json_decode($product->tags) as $tag )
                                                    <small>{{$tag}}</small>
                                                @endforeach    
                                                @endif      
                                            </td>

                                            


                                            <td>{{$product->category()->first()->name ?? ''}}</td>

                                            {{-- <td>
                                                <div style="
                                                margin-top: -12px;">
                                                <a href="{{ route('products.show', $product->id) }}" class="badge badge-info" style="    margin-bottom: 1.2em;">Show</a>

                                                <div style="
                                                margin-top: -12px;">
                                                <a href="{{ route('Admin.products.edit', $product->id) }}" class="badge badge-warning">Edit</a>

                                                <form action="{{ route('Admin.products.destroy', $product->id ) }}" method="post" onsubmit = " return confirmDelete()">
                                                  @csrf
                                                  @method('DELETE')
                                                    <button class="badge badge-danger" type="submit" style="cursor: pointer;">Delete</button>
                                                </form>
                                                </div>
                                            </td> --}}
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="float-right">{{$brands->links()}}</div> --}}
                    </div>
                </div>
                
              
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
        
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
 
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- <!-- ================================ -->

<?php echo View::make('layouts.footerDASH'); ?>
     @endsection   