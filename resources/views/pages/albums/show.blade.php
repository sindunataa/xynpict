@extends('templates.main')

@section('title')
    {{'Show Albums'}}
@endsection

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>{{ $album->title }}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/albums">Albums</a></li>
        <li class="breadcrumb-item active">{{ $album->title }}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
<div class="row">
  <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('albums.index') }}"> Back</a>
  </div>
</div>

    <section class="section">
      <div class="row align-items-top">

       @forelse ($album->galeries as $item)  
       <div class="col-lg-3">
          <div class="card mt-3" class="center">
            <div class="card-body">
              <h1 class="card-title"><strong>{{ $item['name'] }}</strong></h1>
              <div class="card">
                      <img src="/image/{{ $item['image'] }}" class="card-img-top" alt="...">
                  <div class="card-body">

                      <h5 class="card-title">{{ $item['slug'] }}</h5>
                      <p class="card-text">{{ $item['content'] }}</p>
          
                      <form action="{{ route('galeries.destroy',$item['id']) }}" method="POST">
        
                      <a href="{{ route('galeries.show',$item['id']) }}">
                        <button type="button" class="btn btn-info"><i class="bi bi-search"></i></button>
                      </a>

                      <a href="{{ route('galeries.edit',$item['id']) }}"> 
                        <button type="button" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
                      </a>
       
                      @csrf
                      @method('DELETE')
          
                      <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash3"></i>
                      </button>
                    </form>

                  </div>
              </div>
            </div>
          </div>
        </div>
             @empty
                 <p>
                  Not Found Anything
                 </p>
             @endforelse ($collection as $item)
                
      </div>
    </section>


  {{-- <section class="section">
  <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Title:</strong>
              {{ $album->title }}
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Slug:</strong>
              {{ $album->slug }}
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Status:</strong>
              {{ $album->status }}
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Desc:</strong>
              {{ $album->desc }}
          </div>
      </div>
 
  </div>
  </section> --}}

</main>
    
@endsection