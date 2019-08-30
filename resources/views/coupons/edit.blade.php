@extends('admin.admin')

@section('content')

 <section class="content-header">
        <h1>
          Edit Coupon
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Coupon Managment</a></li>
          <li class="active">Edit Coupon</li>
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

      {!! Form::model($coupon, ['method' => 'PATCH','route' =>['coupons.update', $coupon ->id]]) !!}
      <div class="box-body">

                <div class="form-group">
                  <label>Code</label>
                  {!! Form::text('code',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                  <label>Percent Off</label>
                  {!! Form::number('percent_off',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                  <label>No of Uses</label>
                  {!! Form::number('no_of_uses',null,['class'=>'form-control']) !!}
                </div>

                
                
                </div>
                 <div class="form-group">
                  <a class="btn btn-success" href="{{ route('coupons.index') }}">Back</a>

                  <button type="submit" class="btn btn-primary" name="button">Submit</button>
                  
                
              </div>
              {!! Form::close() !!}

@endsection