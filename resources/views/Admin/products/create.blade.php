@extends('layouts.headerDASH')
@section('dashboard')

      <!-- ============================================================== -->
              
                
                
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">ADD Products </h4>
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
                                    <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
                                        @csrf
                
                                        <div class="form-group">
                                            <label for="">Products Image</label>
                                            <input type="text" class="form-control" placeholder="Enter Image Url" name="image" value="{{ old('image') }}">
                                        </div>
                
                                        {!! $errors->first('image', '<p class="text-danger">:message</p>') !!}
                
                
                                        <div class="form-group">
                                            <label for="">Products Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Product Name" name="title" value="{{ old('title') }}">
                                        </div>
                                        {!! $errors->first('title', '<p class="text-danger">:message</p>') !!}
                
                                        <div class="form-group">
                                            <label for="">Category ID</label>
                                          <select class="custom-select b-0 category_id" name="cat_id">
                                                <option selected disabled="disabled">Manage Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                          </select>
                
                                        </div>
                                        {!! $errors->first('cat_id', '<p class="text-danger">:message</p>') !!}
                                
                
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea class="form-control" name="description">  
                                            </textarea>
                                        </div>
                                        {!! $errors->first('description', '<p class="text-danger">:message</p>') !!}
                
                
                
                                        <div class="form-group">
                                            <label for="">Products Price</label>
                                            <input type="text" class="form-control" placeholder="Enter Product Price ($)" name="price" value="{{ old('price') }}">
                                        </div>
                                        {!! $errors->first('price', '<p class="text-danger">:message</p>') !!}
                
                                        <div class="form-group string optional product_tags">
                                            <label class="string optional control-label" for="product_tags">Tags</label>
                                            <input value="" data-role="tagsinput" class="form-control string optional tags text-dark" type="text" name="tags[]" id="product_tags">
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
                
                <?php echo View::make('layouts.footerDASH'); ?>

@endsection