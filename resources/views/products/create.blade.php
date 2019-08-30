@extends('admin.admin')

@section('content')
<section class="content-header">
        <h1>
          Product Managment
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Product Managment</a></li>
          <li class="active">New Product</li>
        </ol>
      </section>
      <br>

	{!! Form::open(['route' => 'products.store','method' => 'POST','enctype' => 'multipart/form-data']) !!}
	<div class="modal-body">
		{{ csrf_field() }}

		@include('products.form')
		
	</div>
		

	{!! Form::close() !!}

@endsection