    @extends('layouts.headerDASH')
    @section('dashboard')
            <!-- Container fluid  -->
            <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Products</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Products</li>
                            </ol>
                            <a href="{{url('Admin/products/create')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
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
                                @if (session('success'))
                                    <div class="badge badge-success mb-2 mt-2 w-100 msg">
                                        {{session('success')}}
                                    </div>
                                @endif
                                    
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
                                                <th width="50">Manage</th>

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

                                                    <td>{{number_format($product->price, 2)}} DH
                                                    </td>

                                                    <td>
                                                        @if($product->tags)
                                                        @foreach(json_decode($product->tags) as $tag )
                                                            <small>{{$tag}}</small>
                                                        @endforeach    
                                                        @endif      
                                                    </td>

                                                    


                                                    <td>{{$product->category()->first()->name ?? ''}}</td>

                                                    <td>
                                                        <div style="
                                                        margin-top: -12px;">
                                                        <a href="{{ route('products.show', $product->id) }}" class="badge badge-info" style="    margin-bottom: 1.2em;">Show</a>

                                                        <div style="
                                                        margin-top: -12px;">
                                                        <a href="{{ route('products.edit', $product->id) }}" class="badge badge-warning">Edit</a>

                                                        <form action="{{ route('products.destroy', $product->id ) }}" method="post" onsubmit = " return confirmDelete()">
                                                          @csrf
                                                          @method('DELETE')
                                                            <button class="badge badge-danger" type="submit" style="cursor: pointer;">Delete</button>
                                                        </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endif
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