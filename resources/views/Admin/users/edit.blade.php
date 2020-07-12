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
                <li class="breadcrumb-item active">Update Users</li>

            </ol>

        </div>
    </div>
</div>


<div class="container">
	<div class="row">
		<div class="col-lg-8">
			<div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Users </h4>
                    <h6 class="card-subtitle">Modify users by managing <code>.DB</code></h6>

                    <!-- FORM -->


                    <form method="POST" action="{{route('users.update', $users->id) }}" enctype="multipart/form-data" files="true">
                                @csrf
                                @method('PUT')


                    	<div class="form-group">
                    		<label for="">Username</label>
                    		<input type="text" class="form-control" placeholder="Enter Username Unique" name="name" value="{{$users->name}}">
                    	</div>


                    	<div class="form-group">
                    		<label for="">Email</label>
                    		<input type="email" class="form-control" placeholder="Enter the valid Email" name="email" value="{{$users->email}}">
                    	</div>



                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group" id="show_hide_password">
                              <input id="pass_log_id" class="form-control" type="password"  placeholder="Enter the valid Password"  name="password" value="{{$users->password}}">
                              <div class="input-group-addon eye">
                                <a href="javascript:void(0)">
                                    <i  class="fa fa-fw fa-eye field_icon toggle-password" aria-hidden="true"></i>
                                </a>
                              </div>
                            </div>
                          </div>



                    	<div class="form-group">
                    		<label for="">Role</label>
                            <br>
                            <input type="text" id="role" class="form-control" style="width: 50%" value="{{$users->role_id}}" disabled>
                    		<select class="custom-select b-0" name="role_id" style="    width: 47%;margin-left: 1em;" onchange="showRole(event);">
                    			<option selected disabled="disabled">Change his Role</option>
                                @foreach($data as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}
                                    </option>                               
                                @endforeach
                               
                            </select>
                    	</div>



                    	<div class="form-group">
                    		<label for="">Status</label>
                            <br>
                            <input type="text" class="form-control" id="status" style="width: 50%" value="{{$users->is_active ? 'Active' : 'Not Active'}}" disabled>
                            <select class="custom-select b-0" name="is_active" style=" width: 47%;margin-left: 1em;" onchange="showStatus(event);">
                                <option selected disabled="disabled">Manage his Activate</option>
                                <option value="0">Not Active</option>
                                <option value="1">Active</option>


                            </select>

                    	</div>

                        <div class="form-group">
                            <label for="">User Image</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                              </div>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="uploadFile"
                                  aria-describedby="inputGroupFileAddon01" name="image" value="{{$users->image}}">
                                <label class="custom-file-label"></label>
                              </div>
                            </div>

                            <input type="text" class="form-control text-center" id="uploadBtn" name="image" value="{{$users->image}}" disabled>
                        </div>




				    <form>
    						

						    <div class="col-md-12 text-center"> 
    							<button id="singlebutton" name="singlebutton" class="btn btn-info">Update now!</button> 
							</div>
						  
						  </form>


                    	

                    </form>
                	
				</div>
			</div>
		</div>

		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<a href="{{route('users.index')}}">
						<h4 class="card-title text-right text-info">
							View All Users <span class="badge badge-info text-white">{{$user->count() }}</span> >
						</h4>	
					</a>
					<hr>
					<img src="{{asset('img/icon2.png')}}" alt="" style="margin-left: 5em; width: 60%">
				</div>
			</div>
		</div>
	</div>
</div>
 
 <script>
    function showRole(e) {
        document.getElementById("role").value = e.target.value;

    }

    function showStatus(e) {
        document.getElementById("status").value = e.target.value;
    }

    // change name file to input text Disabled
    document.getElementById("uploadFile").onchange = function () {
        document.getElementById("uploadBtn").value = this.value;
    };

 </script>

<?php echo View::make('layouts.footerDASH'); ?>
     @endsection   