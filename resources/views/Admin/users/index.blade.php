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
                            <!-- <a href="{{url('Admin/users/create')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a> -->
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

                                
                                    <table class="table text-center" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Profile Picture</th>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Activate</th>
                                                <th>Role</th>
                                                <!-- <th>Country</th> -->
                                                <th>Manage</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                           @if($users)
                                                @foreach($users as $user)
                                                <tr>
                                                    <td>{{$user->id}}</td>

                                                    <td class="">
                                                       <img src="{{asset('images/Users')}}/{{$user->image ?? 'ic.jpg'}}" class="img-responsive" alt="&nbsp;User" width="80" style="overflow: hidden;">
                                                    </td>

                                                    <td>
                                                        <i class="fas fa-user" style="color: #8c8c8c"></i>
                                                         {{$user->name}}
                                                    </td>

                                                    <td>
                                                        <i class="fas fa-envelope-open" style="color: #00000073"></i>
                                                         {{$user->email}}
                                                    </td>

                                                    <!-- text-color -->
                                                    <td class="lampe text {{$user->is_active == 1 ? 'text-warning' : 'text-secondary'}}">
                                                    <!-- verify -->    
                                                        <i class="{{$user->is_active == 1 ? 'fas fa-lightbulb on' : 'fas fa-lightbulb off'}}"></i>
                                                    <!-- is Active -->
                                                        {{$user->is_active == 1 ? 'Active' : 'Not Active'}}         
                                                    </td>

                                                    <td>
                                                        <span class="bdg badge badge-{{$user->role()->first()->color ?? ''}}">{{$user->role()->first()->name ?? ''}}
                                                        </span>
                                                    </td>

                                                    <!-- <td>
                                                        <img src="{{asset('img/mo.png')}}" style="height: 1.5em;width: 1.5em; margin-right: .2em;border-radius: 50%;">
                                                    MA</td> -->
                                                    <td>
                                                        <div style="margin-top: -12px;">
                                                            <!-- Edit -->
                                                            <a href="{{ route('users.edit', $user->id) }}" class="badge badge-warning">Edit</a>
                                                            
                                                            <!-- Delete -->
                                                            <form action="{{ route('users.destroy', $user->id ) }}" method="post" onsubmit = " return confirmDelete()">
                                                              @csrf
                                                              @method('DELETE')
                                                                <button class="badge badge-danger" type="submit" style="cursor: pointer;">Delete
                                                                </button>
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