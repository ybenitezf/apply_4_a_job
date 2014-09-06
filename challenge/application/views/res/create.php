<?php echo form_open('res/create',array('id' => 'resForm')); ?>

  <div class="form-group">
  <label for="inputPassenger">Passenger</label>
  <select class="form-control" name="passenger" id="inputPassenger">
    <?php foreach($psg_list as $p): ?>
        <option value="<?php echo $p->id; ?>">
            <?php echo $p->name; ?>
        </option>
    <?php endforeach ?>
        <option selected></option>
  </select>
  </div>  
 
  <div class="form-group">
  <label for="inputFlight">Flight</label>
  <select class="form-control" name="flight" id="inputFlight" disabled>
    <?php foreach($flights as $f): ?>
        <option value="<?php echo $f->number; ?>">
            <?php echo $f->number; ?> - from
            <?php echo $f->oairport; ?> to
            <?php echo $f->dairport; ?>
        </option>
    <?php endforeach ?>
        <option selected></option>
  </select>
  </div>
  
  <div class="form-group" id="seats-container">
  <label for="inputSeat">Seat</label>
  <select class="form-control" name="seat" id="inputSeat" disabled>
        <option selected>
        </option>
  </select>
  </div>  
  
  <button type="submit" class="btn btn-default">Add</button>
</form>


    <script>
        (function($) {
            $.fn.toggleDisabled = function() {
                return this.each(function() {
                    var $this = $(this);
                    if ($this.attr('disabled')) $this.removeAttr('disabled');
                    else $this.attr('disabled', 'disabled');
                });
            };
        })(jQuery);
        
        $(function() {
            $('#inputPassenger').change(function() {
                var str = $( "#inputPassenger option:selected" ).text();
                if( str != "")
                {
                    $("#inputFlight").toggleDisabled();
                }else{
                    $("#inputFlight").attr('disabled', 'disabled');
                    $("#inputSeat").attr('disabled', 'disabled');
                }
            });
            
            $('#inputFlight').change(function() {
                // test that the passenger is not empty
                //buscar el seleccionado
                var str = $( "#inputFlight option:selected" ).text();
                if( str != "")
                {
                    // get the list of seats for passenger in flight
                    var pid = $('#inputPassenger').val();
                    var flight = $('#inputFlight').val();
                    $.ajax({
                        type: "GET",
                        data: { "pid": pid, "flight": flight },
                        url: "<?php echo site_url('seats/data_list_ajax')?>",
                    }).done( function(data) {
                        $( "#seats-container" ).html( data );
                    });
                    
                    $("#inputSeat").toggleDisabled();
                }else{
                    $("#inputSeat").attr('disabled', 'disabled');
                }
                /*$('#inputFM').toggleDisabled();
                $('#inputFM').attr('value','');*/
            });            
        });        
    </script>


<script>
$( "#resForm" ).validate({
    rules: {
        flight: { required: true, },
        passenger: { required: true, },
        seat: {required: true, },
    }
});
</script>

<script>
$( "#resForm" ).submit( function(e){
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
                $( "#res_list_container" ).html( data );
            });
    }
    return false;
});
</script>