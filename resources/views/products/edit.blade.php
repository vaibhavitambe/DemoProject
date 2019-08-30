@extends('admin.admin')

@section('content')

 <section class="content-header">
        <h1>
          Edit Product
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Product Managment</a></li>
          <li class="active">Edit Product</li>
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

      {!! Form::model($product, ['method' => 'PATCH','route' =>['products.update', $product ->id],'enctype'=>'multipart/form-data']) !!}
      <div class="box-body">
      <div class="col-sm-6">
          <div class="form-group">
            <label>Name </label>
              {!! Form::text('name',null,['class'=>'form-control']) !!}
          </div>

          <div class="form-group">
            <label>SKU </label>
              {!! Form::text('sku',null,['class'=>'form-control']) !!}
          </div>

          <div class="form-group">
            <label>Short Description </label>
              {!! 
              Form::text('short_description',null,['class'=>'form-control']) !!}
          </div>

          <div class="form-group">
            <label>Long Description </label>
              {!! 
              Form::text('long_description',null,['class'=>'form-control']) !!}
          </div>

          <div class="form-group">
            <label>Price </label>
              {!! Form::text('price',null,['class'=>'form-control']) !!}
          </div>

          <div class="form-group">
            <label>Special Price </label>
              {!! Form::text('special_price',null,['class'=>'form-control']) !!}
          </div>

          <div class="form-group">
            <label>Special Price From </label>
              {!! Form::date('special_price_from',null,['class'=>'form-control']) !!}
          </div>

          <div class="form-group">
              <label>Is Featured</label><br>
                Active <input type="radio" name="statusfeat" value="active"  {{ $product->is_featured == 'active' ? 'checked' : '' }}>
                Inactive <input type="radio" name="statusfeat" value="inactive" {{ $product->is_featured == 'inactive' ? 'checked' : '' }}> 
          </div>

          <div class="form-group" id="dynamic_set">
              <label>Select Attribute :</label>
              <select id="attribute_1" class="form-control val" name ="product_attribute">
                  <option value="">---Select attribute---</option>
                 @foreach ($attributes as $key => $value)
                 <option value="{{ $key }}">{{ $value }}</option>
                 @endforeach
              </select><br>

              <label>Select Attribute-Value :</label>
              <select id="attribute_value_1" class="form-control" name ="product_attribute_value">
                <option value="">---Select value---</option>
                 
              </select>
    </div>
    <button type="button" name="addmore" id="addmore" class="btn btn-xs btn-success">Add More</button><br><br>

    <div class="form-group">
        <label>Status</label><br>
          Active <input type="radio" name="status" value="active"  {{ $product->status == 'active' ? 'checked' : '' }}>
          Inactive <input type="radio" name="status" value="inactive" {{ $product->status == 'inactive' ? 'checked' : '' }}> 
    </div>
          
    </div>
    <div class="col-sm-6">

          <div class="form-group">
            <label>Special Price To </label>
              {!! Form::date('special_price_to',null,['class'=>'form-control']) !!}
          </div>

          <div class="form-group" id="dynamic_field">
            <label for="product-img">Product Images</label>
            <input type="file" class="form-control" name="image[]"><br>
            <button type="button" name="add" id="add" class="btn btn-xs btn-success">Add More</button>
        </div>

          <div class="form-group">
            <label>Product Images</label><br>
            @foreach ($products as $product)
              @foreach($product->childs as $image)
                  <img src="{{ asset('uploads/'. $image->image_name) }}" height="80px" width="80px" />&nbsp;&nbsp;&nbsp;<button class="btn btn-xs btn-danger">X</button><br><br>
              @endforeach
          @endforeach

          </div>

          <div class="form-group">
            <label>Quantity </label>
              {!! Form::text('quantity',null,['class'=>'form-control']) !!}
          </div>

          <div class="form-group">
            <label>Meta Title </label>
              {!! Form::text('meta_title',null,['class'=>'form-control']) !!}
          </div>

          <div class="form-group">
            <label>Meta Description </label>
              {!! Form::text('meta_description',null,['class'=>'form-control']) !!}
          </div>

          <div class="form-group">
            <label>Meta Keyword </label>
              {!! Form::text('meta_keywords',null,['class'=>'form-control']) !!}
          </div>

    </div>
    </div> 
          <div class="form-group">
              <a class="btn btn-success" href="{{ route('products.index') }}">Back</a>

              <button type="submit" class="btn btn-primary" name="button">Submit</button>
                             
          </div>
      {!! Form::close() !!}

<script type="text/javascript">
     $(document).ready(function() {
        $(document).on('change',".val",function() {
            let This=$(this)
            let attributeID = $(this).val();
            if(attributeID) {
                $.ajax({
                     url: '/getattributevalue/'+attributeID,
                     type: "GET",
                    dataType: "json",
                    success:function(data) {

                        $('select[name="product_attribute_value"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="product_attribute_value"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });


                    }
                });
            }else{
                $('select[name="product_attribute_value"]').empty();
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){ 
        var postURL = "{{ url('products.edit')}}";
        var i=1; 

     $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<div id="row'+i+'" class="dynamic-added"><br><input type="file" class="form-control" name="image[]"><button type="button" name="remove" id="'+i+'" class="btn btn-xs btn-danger btn_remove">X</button></div>');  
      });
     $('#addmore').click(function(){  
           i++;  
           $('#dynamic_set').append('<div id="row'+i+'" class="dynamic-added"><br><label>Select Attribute :</label><select class="form-control val" id="attribute_'+i+'" name ="product_attribute"><option value="">---Select attribute---</option>@foreach ($attributes as $key => $value)<option value="{{ $key }}">{{ $value }}</option>@endforeach</select><br><label>Select Attribute-Value :</label><select class="form-control" id="attribute_value_'+i+'" name ="product_attribute_value"><option value="">---Select value---</option></select><button type="button" name="remove" id="'+i+'" class="btn btn-xs btn-danger btn_remove">X</button></div>');  
      });
     $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      }); 

       $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

         $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_image').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_image')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });

      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      } 

    });
</script>



@endsection