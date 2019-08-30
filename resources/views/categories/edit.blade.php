@extends('admin.admin')

@section('content')

 <section class="content-header">
        <h1>
          Edit Category
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Category Managment</a></li>
          <li class="active">Edit Category</li>
        </ol>
      </section>

      @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoo0ps!!!</strong> There were some problems with your input.<br>
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>

      @endif

      {!! Form::model($category, ['method' => 'PATCH','route' =>['categories.update', $category ->id]]) !!}
      <div class="box-body">

                <div class="form-group">
                  <label for="first-name">Category Name</label>
                  {!! Form::text('name',null,['palceholder' =>'Category Name','class'=>'form-control']) !!}

                </div>

                
                <div class="form-group">
                  <label>Status</label><br>
                     Active <input type="radio" name="status" value="active"  {{ $category->status == 'active' ? 'checked' : '' }}>
                    Inactive <input type="radio" name="status" value="inactive" {{ $category->status == 'inactive' ? 'checked' : '' }}> 
                </div>

                <div class="form-group">
                    <strong>Select Category :</strong><br>
                    <select class="form-control" name ="parent_id" id="post">
                  <option value="">Select a category</option>
                  <option value="0">PARENT</option>
                  
                    @foreach($categorys as $categ)
                      <option value="{{ $categ->id}}"
                        @if($categ->parent_id == 0)
                        {{ $categ->parent_name}}
                        selected
                        
                        @endif
                        >{{ $categ->name }}
                        </option>
                    @endforeach
                </select>
              </div>

                 <div class="form-group">
                  <a class="btn btn-success" href="{{ route('categories.index') }}">Back</a>

                  <button type="submit" class="btn btn-primary" name="button">Submit</button>
                  
                </div>
              </div>
              {!! Form::close() !!}

@endsection