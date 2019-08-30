@extends('admin.admin')

@section('content')
<section class="content-header">
        <h1>
          Coupon Managment
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Coupon Managment</a></li>
          <li class="active">New Coupon</li>
        </ol>
      </section>
      <br>
      <!-- Button trigger modal -->
<button type="button" class="btn btn-success " data-toggle="modal" data-target="#myModal" style="margin-left: 20px;">
  Add New Coupon
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Coupon</h4>
      </div>
      <form action="{{ route('coupons.store') }}" method="post">
        <div class="modal-body">
            {{ csrf_field() }}

            @include('coupons.form')
            
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
              <h3 class="box-title">Coupons Table</h3>

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
      <th>Code</th>
      <th>Percent Off</th>
      <th>No of Uses</th>
      <th>Created By</th>
      <th>Modified By</th>
      <th width="150px">Actions</th>
    </tr>
   
    @foreach ($coupons as $coupon)
      <tr id="tr_{{$coupon->id}}">
        <td>{{ $coupon->code }}</td>
        <td>{{ $coupon->percent_off }}</td>
        <td>{{ $coupon->no_of_uses }}</td>
        <td>{{ $coupon->users->firstname }}</td>
        
        <td>
          @foreach($coupons->users_modify as $use)
            @if($use->users_modify)
              {{ $use->users_modify->firstname }}
            @else
              -
          @endif
         @endforeach
        </td> 
        <td>
          <a class="btn btn-xs btn-primary" href="{{ route('coupons.edit',$coupon->id) }}">Edit</a>

          {!! Form::open(['method' => 'DELETE','route' => ['coupons.destroy', $coupon->id],'id' => 'FormDeleteTime','style'=>'display:inline']) !!}

          {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!}

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

