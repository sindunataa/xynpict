@extends('templates.main')
@section('title')
    {{'Admin Dashboard'}}
@endsection

@section('main')

<main id="main" class="main">
  
  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
          
          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title ">Welcome!</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-house-door"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ Auth::user()->name }}</h6>
                    <span class="text-muted small pt-2 ps-1">You're Here!</span>

                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <a class="nav-link collapsed" href="/albums">
                  <h5 class="card-title">Albums <span>| Count</span></h5>
                </a>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    
                    <a class="nav-link collapsed" href="/albums">
                      <i class="bi bi-journals"></i>
                    </a>
                  </div>
                  <div class="ps-3">
                    <a class="nav-link collapsed" href="/albums">
                      <h6>{{$count_album}} Albums</h6>
                    </a>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <a class="nav-link collapsed" href="/galery">
                  <h5 class="card-title">Galeries <span>| Count</span></h5>
                </a>
      
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    
                    <a class="nav-link collapsed" href="/galery">
                      <i class="bi bi-image"></i>
                    </a>
                  </div>
                  <div class="ps-3">
                    <a class="nav-link collapsed" href="/galery">
                      <h6>{{$count_galery}} Post</h6>
                    </a>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          

          <!-- Albums -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">


              <div class="card-body">
                <h5 class="card-title"><a href="/albums">Albums List</a> <span>| Today</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Title</th>
                      <th>Status</th>
                      <th>Desc</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach ($album as $album)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td><a href="{{ route('albums.show',$album->id) }}" class="text-primary">{{ $album->title }}</a></td>
                      
                        @if($album->status == 'Publish')
                      <td>
                        <span class="badge bg-success">
                              {{ $album->status }}
                        </span>
                      </td>
                      @elseif($album->status == 'Pending')
                      <td>
                        <span class="badge bg-danger">
                              {{ $album->status }}
                        </span>
                      </td>
                      @endif
                      
                      <td>{{ $album->desc }}</td>
                    </tr>
              
                    @endforeach
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Recent Sales -->

          <!-- Top Selling -->
          <div class="col-12">
            <div class="card top-selling overflow-auto">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body pb-0">
                <h5 class="card-title"><a href="/galery">Galeries List</a> <span>| Today</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">Preview</th>
                      <th scope="col">Name</th>
                      {{-- <th scope="col">Slug</th> --}}
                      <th scope="col">Content</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($galeries as $galerie) 
                    <tr>
                      <th scope="row"><a href="{{ route('galeries.show',$galerie->id) }}"><img src="/image/{{ $galerie->image }}" alt=""></a></th>
                      <td ><a href="{{ route('galeries.show',$galerie->id) }}" class="text-primary fw-bold"><strong>{{ $galerie->name }}</strong></a></td>
                      {{-- <td class="fw-bold">{{ $galerie->slug }}</td> --}}
                      <td>{{ $galerie->content }}</td>
                    </tr>

                    @endforeach
                  </tbody>
                </table>

              </div>

            </div>
          </div> 
          <!-- End Top Selling -->

        </div>
      </div><!-- End Left side columns -->

    </div>
  </section>

</main>

    
@endsection