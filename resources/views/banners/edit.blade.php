@extends('admin.admin')

@section('content')

 <section class="content-header">
        <h1>
          Edit Banner
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Banner Managment</a></li>
          <li class="active">Edit Banner</li>
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

      {!! Form::model($banner, ['method' => 'PATCH','route' =>['banners.update', $banner ->id],'enctype'=>'multipart/form-data']) !!}
      <div class="box-body">

                <div class="form-group">
                  <label for="first-name">Banner Image</label>
                  @if("{{ $banner->banner_path }}")
                      <img src="{{ $banner->banner_path }}" width="200px" height="100px">
                  @else
                      <p>no image</p>
                @endif
                <br><br>
                <input type="file" class="form-control" name="image" id="img" placeholder="Choose image" value="{{ $banner->banner_path }}">

                </div>

                
                <div class="form-group">
                  <label>Status</label><br>
                     Active <input type="radio" name="status" value="active"  {{ $banner->status == 'active' ? 'checked' : '' }}>
                    Inactive <input type="radio" name="status" value="inactive" {{ $banner->status == 'inactive' ? 'checked' : '' }}> 
                </div>

                <div class="form-group">
                  <label>Title </label>
                  {!! Form::text('title',null,['palceholder' =>'Title','class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                  <label>description </label>
                  {!! Form::textarea('description',null,['palceholder' =>'Description','class'=>'form-control']) !!}
                </div>

                 <div class="form-group">
                  <a class="btn btn-success" href="{{ route('banners.index') }}">Back</a>

                  <button type="submit" class="btn btn-primary" name="button">Submit</button>
                  
                </div>
              </div>
              {!! Form::close() !!}

@endsection