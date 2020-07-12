@extends('layouts.headerDASH')
    @section('dashboard')


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
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">Home</a>
                </li>
                <li class="breadcrumb-item">Products</li>
                <li class="breadcrumb-item active">Update Products</li>

            </ol>

        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Products </h4>
                    <h6 class="card-subtitle">Create newest products by managing <code>.DB</code></h6>

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
                    <form method="POST" action="{{route('products.update', $products->id) }}"  enctype="multipart/form-data" file='true'>
                                @csrf
                                @method('PUT')
                             
                         <div class="form-group">
                            <label for="">Products Image</label>
                                <input type="text" class="form-control" placeholder="Enter Image Url" name="image"  value="{{$products->image}}"">
                        </div>
                                                
                        {!! $errors->first('image', '<p class="text-danger">:message</p>') !!}

                                                
                           <div class="form-group">
                                <label for="">Products Name</label>
                               <input type="text" class="form-control" placeholder="Enter Product Name" name="title" value="{{$products->title}}">
                           </div>
                        {!! $errors->first('title', '<p class="text-danger">:message</p>') !!}

                           <div class="form-group">
                            <label for="">Category ID</label>
                             <select class="custom-select b-0 category_id" name="cat_id" id="cat">
                                <option selected disabled="disabled">{{$products->category->name}}</option>
                               @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                               @endforeach
                            </select>
                                                
                        </div>
                        {!! $errors->first('cat_id', '<p class="text-danger">:message</p>') !!}
                                                                
                                                
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" name="description" value="">  {{$products->description}}
                            </textarea>
                        </div>
                        {!! $errors->first('description', '<p class="text-danger">:message</p>') !!}
                                                
                                                
                                                
                        <div class="form-group">
                            <label for="">Products Price</label>
                            <input type="text" class="form-control" placeholder="Enter Product Price ($)" name="price" value="{{$products->price}}">
                        </div>
                        {!! $errors->first('price', '<p class="text-danger">:message</p>') !!}
                                                
                        <div class="form-group">
                            <label for="">Products Tags</label>
                            <input type="text" class="form-control" placeholder="Enter Product Tags" name="tags" value="{{$products->tags}}">
                        </div>
                        {!! $errors->first('tags', '<p class="text-danger">:message</p>') !!}
                                                
                                                                        
                                                
                            <div class="col-md-12 text-center"> 
                                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Update!</button> 
                             </div>
                                                                          
                                                                          
                                                
                                                                        
                                                
                    </form>
                                                                    
                </div>
            </div>
        </div>
                                                
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('products.index')}}">
                        <h4 class="card-title text-right text-info">
                             View All products <span class="badge badge-info text-white">{{$products->count()}}</span> 
                        </h4>   	
                    </a>
                    <hr>
                                                
                </div>
            </div>
        </div>
                                                        
    </div>
</div>
                                                
                        
                        
 <script>
    function showCat(e) {
        document.getElementById("cat").value = e.target.value;

    }

 </script>


<?php echo View::make('layouts.footerDASH'); ?>
     @endsection   