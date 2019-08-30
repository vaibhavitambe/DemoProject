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

<a class="btn btn-success" href="{{ route('products.create')}}" style="margin-left: 20px;">Add New Product</a>

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
              <h3 class="box-title">Products Table</h3>

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
      <th>Name</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Status</th>
      <th>Product Image</th>
      <th>Actions</th>
    </tr>
    @foreach ($products as $product)
      <tr id="tr_{{$product->id}}">
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->quantity }}</td>
        <td>{{ $product->status }}</td>
        <td>
          @foreach($product->childs as $image)
            <img src="{{ asset('uploads/'. $image->image_name) }}" height="40px" width="40px" />
          @endforeach
        </td>
        <td>
          <a class="btn btn-xs btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

          {!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $product->id],'id' => 'FormDeleteTime','style'=>'display:inline']) !!}

          {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!}

          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
</table>
  </div>
</div>
{!! $products->links() !!}
      
 </div>
</div>
      
@endsection



