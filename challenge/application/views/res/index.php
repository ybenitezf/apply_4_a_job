<h1><?php echo $title; ?></h1>
<div>

 <div id="res_form_container">
 </div>

 
 <div id="res_list_container">
 </div>
 
 <script>
    $(function() {
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('res/create')?>",
        })
          .done( function( resp )  {
            $( "#res_form_container" ).html( resp );
          });
          
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('res/data_list')?>",
        })
          .done( function( resp )  {
            $( "#res_list_container" ).html( resp );
          });       
    });
 </script>
</div>