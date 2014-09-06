<h1><?php echo $title; ?> - <?php echo $airframe->name; ?></h1>

<div>

 <div id="seats_form_container">
 </div>

 
 <div id="seats_list_container">
 </div>

 <?php $this->load->helper('url'); ?>
 
 <script>
    $(function() {
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('seats/create')?>?af=<?php echo $airframe->id; ?>",
        })
          .done( function( resp )  {
            $( "#seats_form_container" ).html( resp );
          });
          
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('seats/data_list')?>?af=<?php echo $airframe->id; ?>",
        })
          .done( function( resp )  {
            $( "#seats_list_container" ).html( resp );
          });       
    });
 </script>
</div>

