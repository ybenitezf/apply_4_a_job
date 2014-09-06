<h1><?php echo $title; ?></h1>
<div>

 <div id="air_frame_form_container">
 </div>

 
 <div id="air_frame_list_container">
 </div>
 
 <?php $this->load->helper('url'); ?>
 
 <script>
    $(function() {
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('airframe/create')?>",
        })
          .done( function( resp )  {
            $( "#air_frame_form_container" ).html( resp );
          });
          
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('airframe/data_list')?>",
        })
          .done( function( resp )  {
            $( "#air_frame_list_container" ).html( resp );
          });       
    });
 </script>
</div>