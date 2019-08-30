@extends('admin.admin')

@section('content')

 <section class="content-header">
        <h1>
          Edit Configuration
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Configuration Managment</a></li>
          <li class="active">Edit Configuration</li>
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

      {!! Form::model($configuration, ['method' => 'PATCH','route' =>['configurations.update', $configuration ->id]]) !!}
      <div class="box-body">

                <div class="form-group">
                  <label for="conf-key">Configuration Key</label>
                  {!! Form::text('conf_key',null,['palceholder' =>'Name','class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                  <label for="conf-value">Configuration Value</label>
                  {!! Form::text('conf_value',null,['palceholder' =>'Configuration Value','class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                  <label>Status</label><br>
                     Active <input type="radio" name="status" value="active"  {{ $configuration->status == 'active' ? 'checked' : '' }}>
                    Inactive <input type="radio" name="status" value="inactive" {{ $configuration->status == 'inactive' ? 'checked' : '' }}> 
                </div>
         
                
                </div>
                 <div class="form-group">
                  <a class="btn btn-success" href="{{ route('configurations.index') }}">Back</a>

                  <button type="submit" class="btn btn-primary" name="button">Submit</button>
                  
                </div>
              </div>
              {!! Form::close() !!}

@endsection