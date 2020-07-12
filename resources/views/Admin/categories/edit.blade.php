@extends('layouts.headerDASH')
    @section('dashboard')


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
                <li class="breadcrumb-item">
                	<a href="javascript:void(0)">Home</a>
                </li>
                <li class="breadcrumb-item">Categories</li>
                <li class="breadcrumb-item active">Update Categories</li>

            </ol>

        </div>
    </div>
</div>


<div class="container">
	<div class="row">
		<div class="col-lg-8">
			<div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Category </h4>
                    <h6 class="card-subtitle">Update newest categories by managing <code>.DB</code></h6>

                    <!-- FORM -->
                    <div class="spacer"></div>
                <p class="alert-succes">
                <?php
                    $message = Session::get('message');
                    if($message) {
                        echo $message ;      
                        Session::put('message', NULL);
                    }
                ?>
                </p>
                    <form method="POST" action="{{route('categories.update', $categories->id)}}" files="true" enctype="multipart/form-data">
                    	@csrf
                        @method('PUT')


                         <div class="form-group">
                            <label for="">Logo</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileUpdateon01">Upload</span>
                              </div>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                  aria-describedby="inputGroupFileUpdateon01" name="image" value=" {{$categories->image}}">
                                <label class="custom-file-label" for="inputGroupFile01"  > {{$categories->image}}</label>
                              </div>
                            </div>
                        </div>
                        {!! $errors->first('image', '<p class="text-danger">:message</p>') !!}


                    	<div class="form-group">
                    		<label for="">Category Name</label>
                    		<input type="text" value=" {{$categories->name}}" class="form-control" placeholder="Enter Username Unique" name="name" value="{{ old('name') }}">
                    	</div>
                    	{!! $errors->first('name', '<p class="text-danger">:message</p>') !!}

                    	<div class="form-group">
                    		<label for="">Category Description</label>
                    		<textarea class="form-control" name="description"> {{$categories->description}} 
                            </textarea>

                    	</div>
                    	{!! $errors->first('description', '<p class="text-danger">:message</p>') !!}

    						

						    <div class="col-md-12 text-center"> 
    							<button id="singlebutton" name="singlebutton" class="btn btn-primary">Update!</button> 
							</div>
						  
						  

                    	

                    </form>
                	
				</div>
			</div>

	</div>
</div>



<?php echo View::make('layouts.footerDASH'); ?>
     @endsection   