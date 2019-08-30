@extends('admin.admin')

@section('content')
<section class="content-header">
        <h1>
          Banners Managment
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Banner Managment</a></li>
          <li class="active">New Banners</li>
        </ol>
      </section>
      <br>
      <!-- Button trigger modal -->
<button type="button" class="btn btn-success " data-toggle="modal" data-target="#myModal" style="margin-left: 20px;">
  Add New Banner
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Banner</h4>
      </div>
      <form action="{{ route('banners.store') }}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            {{ csrf_field() }}

            @include('banners.form')
        </div>
        
      </form>

    </div>
  </div>
</div>
<br><br><br>
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p> 
    </div>
  @endif

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Banners Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
 <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
  
    <tr>
      <th>No.</th>
      <th>Banner Image</th>
      <th>Status</th>
      <th>Title</th>
      <th>Description</th>
      <th width="200px">Actions</th>
    </tr>
   
  @foreach ($banners as $banner)
      <tr id="tr_{{$banner->id}}">
        <td>{{ ++$i }}</td>
        <td><img src="{{ $banner->banner_path }}" width="200px" height="200px"></td>

        <td>{{ $banner->status }}</td>

        <td>{{ $banner->title }}</td>

        <td>{{ $banner->description }}</td>
        <td>
          <a class="btn btn-primary" href="{{ route('banners.edit',$banner->id) }}">Edit</a>

          {!! Form::open(['method' => 'DELETE','route' => ['banners.destroy', $banner->id],'id' => 'FormDeleteTime','style'=>'display:inline']) !!}

          {!! Form::submit('Delete', ['class' => 'btn  btn-danger']) !!}

          {!! Form::close() !!}
        </td>
      </tr>
  @endforeach
  </table>
  </div>
</div>
          
        </div>
      </div>
  {!! $banners->links() !!}
    @endsection

