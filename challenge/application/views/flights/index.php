<?php $this->load->helper('url'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>res/jquery.datetimepicker.css" />
<script src="<?php echo base_url() ?>res/jquery.datetimepicker.js"></script>

<h1><?php echo $title; ?></h1>
<div>

 <div id="flight_form_container">
 </div>

 
 <div id="flight_list_container">
 </div>
 
 <?php $this->load->helper('url'); ?>
 
 <script>
    $(function() {
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('flights/create')?>",
        })
          .done( function( resp )  {
            $( "#flight_form_container" ).html( resp );
          });
          
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('flights/data_list')?>",
        })
          .done( function( resp )  {
            $( "#flight_list_container" ).html( resp );
          });       
    });
 </script>
</div>