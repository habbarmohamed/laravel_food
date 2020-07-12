<div class="bg-warning2 border-right" id="sidebar-wrapper" style="width: 25em">
    
    <div class="sidebar-heading text-center bg-white">
      <a href="{{ url('products') }}">
        <img src="{{asset('img/menu.jpg')}}" alt="" width="100">
      </a>
    </div>

        <ul class="list-group list-group-flush text-white w-100  pt-2">
          <li class="list-group-item list-items p-3 pl-4 bg-warning2">
              <img src="" alt="" class="pr-2"> My Commands
              <a  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <small class="float-right text-light">
                      <i class="fas fa-plus "></i>
                  </small>
              </a>
              <!-- Collapse -->
              
          </li>
          <div class="collapse show bg-warning2" id="collapseExample" style="background-color: #0278ba !important">
              
                  <ul class="list-group list-group-flush text-white w-100">
                      <li  class="list-group-item list-items p-2 pl-5 bg-warning2-light">
                          <a href="{{ url('home') }}" class="text-white">
                              <img src="" alt="" class="pr-2"> All my Commands
                          </a>
                      </li>
                      <li  class="list-group-item list-items py-2 pl-5 bg-warning2-light">
                          <a href="{{ url('cart') }}" class="text-white">
                              <img src="" alt="" class="pr-2"> My Orders</li>
                          </a>
                      </li>

                      <li  class="list-group-item list-items py-2 pl-5 bg-warning2-light">
                        <a href="" class="text-white">
                            <img src="" alt="" class="pr-2"> My Account</li>
                        </a>
                    </li>
                  </ul>
                
          </div>


          <li class="list-group-item list-items p-3 pl-4 bg-warning2">
            <a href="mes_demandes.html" class="text-white">
              <img src="" alt="" class="pr-2"> Blog
            </a>
          </li>

          <li class="list-group-item list-items p-3 pl-4 bg-warning2">
            <a href="{{ url('contact') }}" class="text-white">
              <img src="" alt="" class="pr-2"> Contact
            </a>
          </li>

          

          <li class="list-group-item bg-warning2">
              <input class="form-control w-100 search-input" type="text" placeholder="Search " aria-label="Search">
        </li>
          
      </ul>

      <div class="card text-center mx-auto mt-5 mb-5 bg-warning card-demande" style="width: 15rem;">

        <span class="pull-right clickable text-white close-icon hidden-sm" data-effect="fadeOut">
            <i class="fa fa-times"></i>
        </span>

        <div class="card-body">
             
          <p class="card-text text-muted text-white pb-3" style="line-height: 1">Déposer une nouvelle Demande</p>
          <a href="informations_abonnement.html" class="btn-warning text-white w-60 transparent mb-2" >Créer</a>
        </div>
      </div>

      <!-- menu mobile -->
      <div class="d-lg-none d-sm-block mb-3">
      <ul class="list-group list-group-flush bg-warning2 w-100">
           <li class="list-group-item bg-warning2">
                <input class="form-control w-100 search-input" type="text" placeholder="Search" aria-label="Search">
          </li>
          
          <li class="list-group-item bg-warning2 text-white ">
              <a  class="text-white" data-toggle="collapse" href="#profil" role="button" aria-expanded="false" aria-controls="profil">
                  <span class="float-left">
                      Profile   	
                  </span>
                  <span class="float-right">
                      <i class="fas fa-ellipsis-v fa-1x"></i>  
                  </span>
              </a>
          </li>
          
          <!-- collapse -->
          <div class="collapse" id="profil">
            <div class="card card-body bg-warning2 m-0 p-0 pl-3">
              <ul class="list-group list-group-flush bg-warning2 w-100">
                   <li class="list-group-item bg-warning2 pb-0 pt-0 p-2 text-white">
                        <span>
                      Paramétres
                      </span>
                  </li>
                  <li class="list-group-item bg-warning2 pb-0 pt-0 p-2 text-white">
                        <span>
                      Modifier Profile
                      </span>
                  </li>
                  <li class="list-group-item bg-warning2 pb-0 pt-0 p-2 text-white">
                        <span>
                      Déconnecter
                      </span>
                  </li>
              </ul>
            </div>
          </div>

      </ul>
  </div>
      <!-- end menu mobile -->

  </div>
  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
  <div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="height: 5.5em">
        <div class="pl-3 pr-4" style="border-right: 1px solid #00000040">
          <a href="#" id="menu-toggle" class="text-dark">
              <i class="fas fa-bars"></i>
          </a>
      </div>

     
        <a href="{{ url('products') }}" class="text-dark">
          <img src="{{asset('img/menu.jpg')}}" alt="" width="50" class="ml-2">
        </a>

        



      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto pl-3">
           @include('partials.search')
        </ul>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          @include('partials.auth')
          {{-- <li class="nav-item dropdown pr-3">
            <a class="nav-link dropdown-toggle toggle-icon" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="text-muted icon-size">
                  <i class="fa fa-user" aria-hidden="true"></i>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right text-left" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Paramétres</a>
              <a class="dropdown-item" href="#">Modifier Profile</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Se déconnecter</a>
            </div>
          </li> --}}

          <li class="nav-item pr-4">
          <a class="nav-link" href="{{url('cart')}}" style="position: relative;top: 8px;">  
                <i class="fa fa-shopping-cart"></i>
                <span class="badge badge-warning" style="width: 13px;
                font-size: 9px;
                height: 13px;
                position: absolute;
                top: 2px;
                right: 2px;">{{Cart::content()->count()}}</span>
              </a>
          </li>
        </ul>
      </div>
    </nav>