@extends('admin.admin')

@section('content')
 
      <section class="content-header">
        <h1>
          Create New User
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">User Managment</a></li>
          <li class="active">Create User</li>
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

      {!! Form::open(['route' => 'users.store','method' => 'POST']) !!}

    


      @include('users.form')
      <br><br><br>
    
      {!! Form::close() !!}
    @endsection
    
 

 
              