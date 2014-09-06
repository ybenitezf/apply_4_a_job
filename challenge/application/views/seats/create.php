<?php echo form_open('seats/create?af='.$airframe->id,array('id' => 'seatsForm')) ?>
  <div class="form-group">
    <label for="inputCol">Column</label>
    <input type="text" class="form-control" id="inputCol" name="col" placeholder="">
  </div>
  
  <div class="form-group">
    <label for="inputRow">Row</label>
    <input type="text" class="form-control" id="inputRow" name="row" placeholder="">
  </div>
  
  <?php $items = array_values($tty); ?>
  
  <div class="form-group">
  <label for="inputType">Type</label>
  <select class="form-control" name="type" id="inputType">
    <?php foreach($items as $item): ?>
        <option><?php echo $item ?></option>
    <?php endforeach ?>
  </select>
  </div>
  
  <button type="submit" class="btn btn-default">Add</button>
</form>

<script>
$( "#seatsForm" ).validate({
    rules: {
        col: { required: true, },
        row: { required: true, number: true },
        type: { required: true, },
    }
});
</script>

<script>
$( "#seatsForm" ).submit( function(e){
    e.preventDefault();
    
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
                $( "#seats_list_container" ).html( data );
            });
    }
    
    return false;
});
</script>