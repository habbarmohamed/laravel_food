<div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header p-0">
            <img src="" id="modal_img" class="w-100" alt="">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body pb-0">
          <h5 id="modal_name"></h5>
          <small class="text-uppercase font-weight-bold text-muted mb-2">Description</small>
          <p class="text-muted" id="modal_desc"></p>
          <small class="text-uppercase font-weight-bold text-muted mt-3 ">Category</small>
          <div class="d-flex">
              <p class="text-muted mr-2" id="modal_category"></p>
              <img src="" alt="" id="modal_logo" style="width: 5%; height:2%">
              <div class="text-right" style="flex: auto;">
                  <i class="fa fa-tag text-muted" aria-hidden="true"></i>
                  <small id="modal_tags"></small> 
              </div>
                           
          </div>
          
        </div>
        <div class="modal-footer" style="justify-content: space-between;">
            <div class="">
                <h4 class="font-weight-bold text-danger" id="modal_price"></h4>
            </div>  
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        <div class="">
           
          <form action="{{route('cart.store')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$product->id ?? ''}}">
            <input type="hidden" name="title" value="{{$product->title ?? ''}}">
            <input type="hidden" name="price" value="{{$product->price ?? ''}}">
            <input type="hidden" name="image" value="{{$product->image ?? ''}}">
            <input type="hidden" name="description" value="{{$product->description ?? ''}}">
            <button style="box-shadow: 5px 5px 35px #f4a01d, -5px -5px 35px #f4a01d;
            padding: .5em 3em;" type="submit" class="btn btn-warning2"><i class="fa fa-shopping-cart"></i> ADD</button>
          </form>  
        </div>
          
        </div>
      </div>
    </div>
  </div>