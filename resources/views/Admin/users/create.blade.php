@extends('layouts.headerDASH')
    @section('dashboard')


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
                <li class="breadcrumb-item">
                	<a href="javascript:void(0)">Home</a>
                </li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">ADD Users</li>

            </ol>

        </div>
    </div>
</div>


<div class="container">
	<div class="row">
		<div class="col-lg-8">
			<div class="card">
                <div class="card-body">
                    <h4 class="card-title">ADD Users </h4>
                    <h6 class="card-subtitle">Create newest users by managing <code>.DB</code></h6>

                    <!-- FORM -->
                    <div class="spacer"></div>

                    <form method="POST" action="{{route('users.store')}}" files="true" enctype="multipart/form-data">
                    	@csrf

                    	<div class="form-group">
                    		<label for="">Username</label>
                    		<input type="text" class="form-control" placeholder="Enter Username Unique" name="name" value="{{ old('name') }}">
                    	</div>
                    	{!! $errors->first('name', '<p class="text-danger">:message</p>') !!}

                    	<div class="form-group">
                    		<label for="">Email</label>
                    		<input type="email" class="form-control" placeholder="Enter the valid Email" name="email" value="{{ old('email') }}">
                    	</div>
                    	{!! $errors->first('email', '<p class="text-danger">:message</p>') !!}


                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group" id="show_hide_password">
                              <input class="form-control" type="password"  placeholder="Enter the valid Password"  name="password" value="{{ old('password') }}">
                              <div class="input-group-addon eye">
                                <a href="">
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                </a>
                              </div>
                            </div>
                        </div>
                    	{!! $errors->first('password', '<p class="text-danger">:message</p>') !!}

                    	<div class="form-group">
                    		<label for="">Role</label>
                    		<select class="custom-select b-0" name="role_id"  value="{{ old('role_id') }}">
                    			<option selected disabled="disabled">--Choose a Role--</option>
                                @foreach($data as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}
                                    </option>                               
                                @endforeach
                            </select>
                    	</div>
                    	{!! $errors->first('role_id', '<p class="text-danger">:message</p>') !!}

                    	<div class="form-group">
                    		<label for="">Status</label>
							<select class="custom-select b-0" name="is_active"  value="{{ old('is_active') }}">
                                <option selected disabled="disabled">--Activate--</option>
                                <option value="0">Not Active</option>
                                <option value="1">Active</option>
                            </select>	
                    	</div>
                    	{!! $errors->first('is_active', '<p class="text-danger">:message</p>') !!}


						    <div class="row">
						    	
						      	<div class="col-sm-7 col-md-6 col-lg-5">
									
						        	<div class="form-group">
                            <label for="">Users Image</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                              </div>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                  aria-describedby="inputGroupFileAddon01" name="image">
                                <label class="custom-file-label" for="inputGroupFile01"></label>
                              </div>
                            </div>
                        </div>
                                    {!! $errors->first('image', '<p class="text-danger">:message</p>') !!}


						      	</div>
						    </div>

						    <div class="col-md-12 text-center"> 
    							<button id="singlebutton" name="singlebutton" class="btn btn-primary">Create!</button> 
							</div>
						  
						  

                    	

                    </form>
                	
				</div>
			</div>
		</div>

		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<a href="{{route('users.index')}}">
						<h4 class="card-title text-right">
							View All Users <span class="badge badge-primary text-white">{{$users->count()}}</span> >
						</h4>	
					</a>
					<hr>
					<img src="{{asset('img/add.png')}}" alt="" style="margin-left: 5em;">
				</div>
			</div>
		</div>
	</div>
</div>


<?php echo View::make('layouts.footerDASH'); ?>
     @endsection   