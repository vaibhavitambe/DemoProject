@extends('admin.admin')

@section('content')

 <section class="content-header">
        <h1>
          Edit Attribute
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Product-Attribute Managment</a></li>
          <li class="active">Edit Attribute</li>
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

      {!! Form::model($attribute, ['method' => 'PATCH','route' =>['attributes.update', $attribute ->id]]) !!}
      <div class="box-body">

                <div class="form-group">
                  <label>Attribute</label>
                  {!! Form::text('name',null,['palceholder' =>'Name','class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                  <label>Attribute Values</label>
                  
                  {!! Form::text('attribute_value',null,['palceholder' =>'Name','class'=>'form-control']) !!}
                </div>

                </div>
                 <div class="form-group">
                  <a class="btn btn-success" href="{{ route('attributes.index') }}">Back</a>

                  <button type="submit" class="btn btn-primary" name="button">Submit</button>
                  
                </div>
              </div>
              {!! Form::close() !!}

@endsection