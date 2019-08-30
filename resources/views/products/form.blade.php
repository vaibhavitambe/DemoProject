<div class="alert alert-success print-success-msg" style="display:none">
    <ul></ul>
</div>
<div class="alert alert-danger print-error-msg" style="display:none">
    <ul></ul>
</div>

<div class="box-body">
<div class="col-sm-6">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" placeholder="Enter Name" name="name">
    </div>

    <div class="form-group">
        <label for="sku">SKU</label>
        <input type="text" class="form-control" placeholder="Enter sku" name="sku">
    </div>

    <div class="form-group">
        <label for="short-des">Short Description</label>
        <input type="text" class="form-control" placeholder="Enter Short Description" name="shortdes">
    </div>

    <div class="form-group">
        <label for="long-des">Long Description</label>
        <textarea type="textarea" class="form-control" placeholder="Enter Long Description" name="longdes"></textarea>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="float" class="form-control" placeholder="Enter Price" name="price">
    </div>

    <div class="form-group">
        <label for="price">Special Price</label>
        <input type="float" class="form-control" placeholder="Enter Special Price" name="specialprice">
    </div>

    <div class="form-group">
        <label for="price">Special Price From</label>
        <input type="date" class="form-control" placeholder="Enter Special Price From" name="specialpricefrom">
    </div>

    <div class="form-group">
        <label name="statusfeat">Is Featured</label><br>
        Active <input type="radio" name="statusfeat" value="active" checked>
        Inactive <input type="radio" name="statusfeat" value="inactive">
    </div>

    <div class="form-group" id="dynamic_set">
            <label>Select Attribute :</label>
            <select id="attribute_1" class="form-control val" name ="product_attribute[]">
                <option value="">---Select attribute---</option>
                 @foreach ($attributes as $key => $value)
                 <option value="{{ $key }}">{{ $value }}</option>
                 @endforeach
            </select><br>

            <label>Select Attribute-Value :</label>
            <select id="attribute_value_1" class="form-control" name ="product_attribute_value[]">
                <option value="">---Select value---</option>
                 
            </select>
    </div>
    <button type="button" name="addmore" id="addmore" class="btn btn-xs btn-success">Add More</button>
</div>

<div class="col-sm-6">

        <div class="form-group">
            <label for="price">Special Price To</label>
            <input type="date" class="form-control" placeholder="Enter Special Price To" name="specialpriceto">
        </div>

        <div class="form-group" id="dynamic_field">
            <label for="product-img">Product Images</label>
            <input type="file" id="image_1" class="form-control" name="image[]"><br>
            <button type="button" name="add" id="add" class="btn btn-xs btn-success">Add More</button>
        </div>

        <div class="form-group">
            <label name="status">Status</label><br>
            Active <input type="radio" name="status" value="active" checked>
            Inactive <input type="radio" name="status" value="inactive"> 
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="text" class="form-control" placeholder="Enter Quantity" name="quantity">
        </div>

    <div class="form-group">
        <label for="meta-title">Meta Title</label>
        <input type="text" class="form-control" placeholder="Enter Meta Title" name="metatitle">
    </div>

    <div class="form-group">
        <label for="meta-des">Meta Description</label>
        <textarea type="textarea" class="form-control" placeholder="Enter Meta Description" name="metades"></textarea>
    </div>

    <div class="form-group">
        <label for="meta-key">Meta Keyword</label>
        <input type="text" class="form-control" placeholder="Enter Meta Keyword" name="metakey">
    </div>    
</div>   
</div>

 <div class="modal-footer">
        <a class="btn btn-success" href="{{ route('products.index') }}">Back</a>
        <button type="submit" class="btn btn-primary" name="button">Add</button>
</div>

<script type="text/javascript">
     $(document).ready(function() {
        $(document).on('change',".val",function() {
            
          let attributeID = $(this).val();

          var att_id = this.id;
          var att_val = 'attribute_value_'+att_id.split("_")[1];
        
          if(attributeID) {
                $.ajax({
                     url: '/getattributevalue/'+attributeID,
                     type: "GET",
                    dataType: "json",
                    success:function(data) {

                        $('#'+att_val).empty();
                        var options = '';
                        $.each(data, function(key, value) {
                             $('#'+att_val).append('<option value="'+ key +'">'+ value +'</option>');
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
        var postURL = "{{ url('products.form')}}";
        var i=1; 

     $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<div id="row'+i+'" class="dynamic-added"><br><input type="file" class="form-control" id="image_'+i+'" name="image[]"><button type="button" name="remove" id="'+i+'" class="btn btn-xs btn-danger btn_remove">X</button></div>');  
      });

      $('#addmore').click(function(){  
           i++; 
           $('#dynamic_set').append('<div id="row'+i+'" class="dynamic-added"><br><label>Select Attribute :</label><select class="form-control val" id="attribute_'+i+'" name ="product_attribute[]"><option value="">---Select attribute---</option>@foreach ($attributes as $key => $value)<option value="{{ $key }}">{{ $value }}</option>@endforeach</select><br><label>Select Attribute-Value :</label><select class="form-control" id="attribute_value_'+i+'" name ="product_attribute_value[]"><option value="">---Select value---</option></select><button type="button" name="remove" id="'+i+'" class="btn btn-xs btn-danger btn_remove">X</button></div>');  
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
