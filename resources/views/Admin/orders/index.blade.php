    @extends('layouts.headerDASH')
    @section('dashboard')
            <!-- Container fluid  -->
            <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Orders</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Orders</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== 
                    <!-- column -->
                   
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Products Form </h4>
                                <h6 class="card-subtitle">Create newest products by managing <code>.DB</code></h6>
                               
                                    
                                <div class="table-responsive">

                                
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
                                                
                                            @foreach ($orders as $order)
                
                                                @foreach (unserialize($order->products) as $product)
                                                <tr>
                                                    <td style="width: 14.28%" class="td-order"><img src="{{ $product[0] }}" class="w-100" alt=""></td>
                                                    <td style="width: 14.28%" class="td-order">{{ $product[1] }}</td>
                                                    <td style="width: 14.28%" class="td-order">{{number_format( $product[2], 2)}} DH</td>
                                                    <td style="width: 14.28%" class="td-order">{{ $product[3] }}</td>
                                                    <td style="width: 14.28%" class="td-order">{{number_format( $order->amount, 2)}} DH</td>
                                                    <td style="width: 14.28%" class="td-order">{{ Carbon\Carbon::parse($order->payment_created_at)->format('d/m/Y à H:i')}}</td>
                                                </tr>
                                        
                
                                                @endforeach
                                                
                                            @endforeach

                                            @foreach ($users as $user)
                                                <tr>
                                                   
                                                    <td class="td-order">{{$user->avatar}}</td>
                                                </tr>
                                        
                
                                                @endforeach
                                            
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                  

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
             
                <!-- ============================================================== -->
                
            </div>
<script>
    function confirmDelete() {
    return confirm('Are you sure you want to delete?');
}
</script>


        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
<?php echo View::make('layouts.footerDASH'); ?>
     @endsection   