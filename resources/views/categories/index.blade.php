@extends('admin.admin')

@section('content')
<section class="content-header">
        <h1>
          Category Managment
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Category Managment</a></li>
          <li class="active">New Category</li>
        </ol>
      </section>
      <br>
      <!-- Button trigger modal -->
<button type="button" class="btn btn-success " data-toggle="modal" data-target="#myModal" style="margin-left: 20px;">
  Add New Category
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Category</h4>
      </div>
      <form action="{{ route('categories.store') }}" method="post">
        <div class="modal-body">
            {{ csrf_field() }}

            @include('categories.form')
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
              <h3 class="box-title">Categories Table</h3>

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
      
      <th>Category Name</th>
      <th>Parent</th>
      <th>Status</th>
      <th width="200px">Actions</th>
    </tr>
   
    
      @foreach ($categories as $category)
      <tr>
        
        <td>{{ $category->name }}</td>
        <td>
          @if($category->parent_name == "")
            {{ $category ->name}}
          @else
           {{ $category->parent_name }}
          @endif
        </td>
        <td>{{ $category->status }}</td>
        <td>
          <a class="btn btn-xs btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>
          {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $category->id],'id' => 'FormDeleteTime','style'=>'display:inline']) !!}

          {!! Form::submit('Delete', ['class' => 'btn  btn-xs btn-danger']) !!}

          {!! Form::close() !!}
          
        </td>
      </tr>
     
    @endforeach

  </table>
</div>
</div>
          
        </div>
      </div>
     
@endsection

