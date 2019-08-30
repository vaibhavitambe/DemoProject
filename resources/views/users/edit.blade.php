@extends('admin.admin')

@section('content')

 <section class="content-header">
        <h1>
          Edit User
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">User Managment</a></li>
          <li class="active">Edit User</li>
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

      {!! Form::model($user, ['method' => 'PATCH','route' =>['users.update', $user ->id]]) !!}
      <div class="box-body">

                <div class="form-group">
                  <label for="first-name">First Name </label>
                  {!! Form::text('firstname',null,['palceholder' =>'Name','class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                  <label for="last-name">Last Name </label>
                  {!! Form::text('lastname',null,['palceholder' =>'Name','class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  {!! Form::text('email',null,['palceholder' =>'Name','class'=>'form-control']) !!}
                </div>

                
                <div class="form-group">
                  <label>Status</label><br>
                     Active <input type="radio" name="status" value="active"  {{ $user->status == 'active' ? 'checked' : '' }}>
                    Inactive <input type="radio" name="status" value="inactive" {{ $user->status == 'inactive' ? 'checked' : '' }}> 
                </div>

                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name ="role" id="role">
                  <option value="">Select a Role</option>
                  @foreach ($roles as $role)
                    <option value="{{ $role->name }}"
                    	@if ($role->name === $user->role)
                    	 selected
				 	            @endif
				 	            >{{ $role->name }}</option>
                  @endforeach
                </select>
         
                
                </div>
                 <div class="form-group">
                  <a class="btn btn-success" href="{{ route('users.index') }}">Back</a>

                  <button type="submit" class="btn btn-primary" name="button">Submit</button>
                  
                </div>
              </div>
              {!! Form::close() !!}

@endsection