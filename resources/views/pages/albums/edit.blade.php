@extends('templates.main')

@section('title')
    {{'Edit Albums'}}
@endsection

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit Albums</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item active">{{ $album->title }}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Edit Albums</h5>
<form action="{{ route('albums.update',['id'=> $album->id]) }}" method="POST" enctype="multipart/form-data"> 
    
  @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" value="{{ $album->title }}" class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Slug:</strong>
                <input type="text" name="slug" value="{{ $album->slug }}" class="form-control" placeholder="Slug">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <select type="text" name="status" value="{{ $album->status }}" class="form-control mb-2" placeholder="Status">
                  <option disabled value >Select your status</option>  
                  <option value="1">Publish</option>
                  <option value="2">Pending</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Desc:</strong>
                <textarea class="form-control" style="height:150px" name="desc" placeholder="content">{{ $album->desc }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-right mt-3">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
 
</form>
  </div>
</div>

  </section>

</main>
    
@endsection