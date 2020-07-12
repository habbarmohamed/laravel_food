@extends('layouts.headerDASH')
    @section('dashboard')
            <!-- Container fluid  -->
            <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Categories</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Categories</li>
                            </ol>
                            <a href="{{url('Admin/categories/create')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
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
                                <h4 class="card-title">Categories Form </h4>
                                <h6 class="card-subtitle">Create newest categories by managing <code>.DB</code></h6>
                               
                                @if (session('success'))
                                    <div class="badge badge-success mb-2 mt-2 w-100 msg">
                                        {{session('success')}}
                                    </div>
                                @endif
                                    
                                <div class="table-responsive">

                                
                                    <table class="table text-center" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>Category ID</th>
                                                <th>Category Image</th>
                                                <th>Category Name</th>
                                                <th>Category Description</th>
                                                <th>Manage</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                           @if($categories)
                                                @foreach($categories as $category)

                                                <tr>
                                                    <td style="width:20%">{{$category->id}}</td>
                                                    <td style="width:20%"><img src="{{asset('images/Logo')}}/{{$category->image}}" alt="" class="w-25"></td>
                                                    <td style="width:20%"><i class="fas fa-align-left" style="color: #8c8c8c"></i> {{$category->name}}</td>
                                                    <td style="width:20%"><i class="fas fa-quote-left" style="color: #00000073"></i> {{$category->description}}</td>

                                                   

                                                    
                                                    <td style="width:20%">
                                                        <div style="
                                                        margin-top: -12px;">
                                                        <a href="{{ route('categories.edit', $category->id) }}" class="badge badge-warning">Edit</a>

                                                        <form action="{{ route('categories.destroy', $category->id ) }}" method="post" onsubmit = " return confirmDelete()">
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