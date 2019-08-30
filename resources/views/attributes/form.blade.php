<div class="alert alert-success print-success-msg" style="display:none">
    <ul></ul>
</div>
<div class="alert alert-danger print-error-msg" style="display:none">
    <ul></ul>
</div>

<div class="box-body">
    <div class="form-group">
        <label for="name">Attribute Name</label>
        <input type="text" class="form-control" placeholder="Enter Attribute Name" name="attributename">
    </div>

    <div class="form-group" id="dynamic_field">
        <label>Attribute Value</label>
        <input type="text" class="form-control" placeholder="Enter Attribute Value" name="attributevalue[]"><br>
        <button type="button" name="add" id="add" class="btn btn-xs btn-success">Add More</button>
    </div>

</div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" id="submit">Add</button>
	</div>


<script type="text/javascript">
    $(document).ready(function(){ 
        var postURL = "{{ url('attributes.form')}}";
        var i=1;

    $('#add').click(function(){  
        i++;  
        $('#dynamic_field').append('<div id="row'+i+'" class="dynamic-added"><br><input type="text" class="form-control" placeholder="Enter Attribute Value" name="attributevalue[]"><button type="button" name="remove" id="'+i+'" class="btn btn-xs btn-danger btn_remove">X</button></div>');  
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

