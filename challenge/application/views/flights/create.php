<?php echo form_open('flights/create',array('id' => 'flightForm')) ?>
  <div class="form-group">
    <label for="inputNumber">Flight number</label>
    <input type="text" class="form-control" id="inputNumber" name="number" placeholder="">
  </div>
  
  <div class="form-group">
    <label for="inputOAirport">Originating airport</label>
    <input type="text" class="form-control" id="inputOAirport" name="oairport" placeholder="">
  </div>
  
  <div class="form-group">
    <label for="inputDeparture">Departure time</label>
    <input type="text" class="form-control" id="inputDeparture" name="departure" placeholder="">
  </div>  
  
  <div class="form-group">
    <label for="inputDAirport">Destination airport</label>
    <input type="text" class="form-control" id="inputOAirport" name="dairport" placeholder="">
  </div>
  
  <div class="form-group">
    <label for="inputArrival">Arrival time</label>
    <input type="text" class="form-control" id="inputArrival" name="arrival" placeholder="">
  </div>  
  
  <div class="form-group">
  <label for="inputFrame">Frame</label>
  <select class="form-control" name="airframe" id="inputFrame">
    <?php foreach($frames as $af): ?>
        <option value="<?php echo $af->id; ?>"><?php echo $af->name; ?></option>
    <?php endforeach ?>
  </select>
  </div>  
  
  <button type="submit" class="btn btn-default">Add</button>
</form>

<script>
jQuery('#inputDeparture').datetimepicker();
jQuery('#inputArrival').datetimepicker();

$( "#flightForm" ).validate({
    rules: {
        number: { required: true, number: true },
        oairport: {required: true},
        departure: {required: true, date: true },
        dairport: {required: true},
        arrival: {required: true, date:true},
        airframe: {required: true}
    }
});
</script>

<script>
$( "#flightForm" ).submit( function(e){
    e.preventDefault();
    
    var $form = $( this );
    $form.validate();
    if( $form.valid() ){
        $.ajax({
            type: "POST",
            data: $form.serialize(),
            url: $form.attr('action'),
        })
            .done( function(data) {
                $form.trigger("reset");
                $( "#flight_list_container" ).html( data );
            });
    }
    return false;
});
</script>