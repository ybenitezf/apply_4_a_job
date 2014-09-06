<?php echo form_open('airframe/create',array('id' => 'airframeForm')) ?>
  <div class="form-group">
    <label for="inputName">Air Frame Name</label>
    <input type="text" class="form-control" id="inputName" name="name" placeholder="">
  </div>
  
  <button type="submit" class="btn btn-default">Add</button>
</form>

<script>
$( "#airframeForm" ).validate({
    rules: {
        name: { required: true },
    }
});
</script>

<script>
$( "#airframeForm" ).submit( function(e){
    e.preventDefault();
    // check if form is valid
    var $form = $( this );
    $form.validate();
    if( $form.valid() == true ){
   
        $.ajax({
            type: "POST",
            data: $form.serialize(),
            url: $form.attr('action'),
        })
            .done( function(data) {
                $form.trigger("reset");
                $( "#air_frame_list_container" ).html( data );
            });
    }
    
    return false;
});
</script>