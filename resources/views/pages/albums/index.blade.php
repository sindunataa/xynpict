@extends('templates.main')

@section('title')
    {{'Albums'}}
@endsection

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Albums</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item">Albums</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createalbums">
      Add Albums
    </button>

    <div class="col-12">
      <div class="card recent-sales overflow-auto">


        <div class="card-body">
          <h5 class="card-title">Albums List <span>| Today</span></h5>

          <table class="table table-borderless datatable">
    <tr>
        <th>No</th>
        <th>Title</th>
        <th>Status</th>
        <th>Desc</th>
        <th width="280px">Action</th>

    </tr>
    @foreach ($albums as $album)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $album->title }}</td>
        @if($album->status == 'Publish')
            <td>
              <span class="badge bg-success tips">
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
        <td>
            <form action="{{ route('albums.destroy',$album->id) }}" method="POST">
 
                <a class="btn btn-info" href="{{ route('albums.show',$album->id) }}">Show</a>

                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editalbums">
                  Edit
                </button> --}}

                <a class="btn btn-success" href="{{ route('albums.edit',$album->id) }}">Edit</a>
 
                @csrf
                @method('DELETE')
    
                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
  </table>
        </div>
      </div>
    </div>
  

  <div class="modal fade" id="createalbums" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Add Albums</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('albums.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" class="form-control" placeholder="Title">
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Slug:</strong>
                        <input type="text" name="slug" class="form-control" placeholder="Slug">
                    </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status:</strong>
                        <select type="text" name="status" class="form-control mb-2" placeholder="Status">
                            <option value="1">Publish</option>
                            <option value="2">Pending</option>
                          </select>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Desc:</strong>
                        <textarea class="form-control" style="height:150px" name="desc" placeholder="Desc"></textarea>
                    </div>
                </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

        </div>

        </form>
      </div>
      </div>
    </div>
  </div>
 
  {{-- <div class="modal fade" id="editalbums" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Albums</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
              </div>
           
          

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div> --}}

{!! $albums->links() !!}
  </section>

</main>
    
@endsection