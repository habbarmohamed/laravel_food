@extends('layouts.headerDASH')
    @section('dashboard')
            <!-- Container fluid  -->
            <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Users</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Users</li>
                            </ol>
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
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
                                <h4 class="card-title">Users Form </h4>
                                <h6 class="card-subtitle">Create newest users by managing <code>.DB</code></h6>
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th>Profile Picture</th>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Activate</th>
                                                <th>Role</th>
                                                <th>Country</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                           @if($users)
                                                @foreach($users as $user)

                                                <tr>
                                                    <td></td>
                                                    <td>{{$user->name}}</td>
                                                    <td><i class="fas fa-at" style="color: #00000073"></i> {{$user->email}}</td>

                                                    <!-- text-color -->
                                                    <td style="font-weight: bold;"class="text {{$user->is_active == 1 ? 'text-success' : 'text-danger'}}">

                                                    <!-- verify -->
                                                        <i class="{{$user->is_active == 1 ? 'fas fa-check' : 'fas fa-times'}}"></i>

                                                    <!-- is Active -->
                                                        {{$user->is_active == 1 ? 'Active' : 'Not Active'}}
                                                        
                                                    </td>
                                                    <td>{{$user->role()->first()->name}}</td>
                                                    <td>
                                                        <img src="{{asset('img/mo.png')}}" style="height: 1.5em;width: 1.5em; margin-right: .2em;border-radius: 50%;">
                                                    MA</td>
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

        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
<?php echo View::make('layouts.footerDASH'); ?>
     @endsection   