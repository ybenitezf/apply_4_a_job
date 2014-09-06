<div>
<h2>Passenger registration</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('passenger/createAJAX',array('id' => 'psgForm')) ?>

  <div class="form-group">
    <label for="inputName">Passenger Name</label>
    <input type="text" class="form-control" id="inputName" name="name" placeholder="">
  </div>

  <div class="checkbox">
    <label>
      <input type="checkbox" id="inputIsBusinessClass" name="isBusinessClass"> Is business class ?
    </label>
  </div>
  
  <div class="form-group">
    <label for="inputFM">Flight miles</label>
    <input type="text" class="form-control" id="inputFM" name="flight_miles" placeholder="0" disabled>
  </div>  
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>

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
            $('#inputIsBusinessClass').click(function() {
                $('#inputFM').toggleDisabled();
                $('#inputFM').attr('value','');
            });
        });        
    </script>
    
    <script> 
    $( "#psgForm" ).validate({
        rules: {
            name: { required: true, },
            flight_miles: { number: true, },
        }
    });
    </script>
    
    <script>
         $( "#psgForm" ).submit( function(e){
                e.preventDefault();
                
                var $form = $( this );
                $.ajax({
                    type: "POST",
                    url: $form.attr('action'),
                    data: $form.serialize(),
                })
                  .done( function(data)
                    {
                        $form.trigger("reset");
                        $( "#psgList" ).html( data );
                        //alert( "Data Saved: " + data );
                    });
                return false;
            });
    </script>