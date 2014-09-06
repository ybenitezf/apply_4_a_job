<h3>Passengers list</h3>
<div>
<?php if( $passengers ) { ?>

<table class="table table-striped">
    <thead>
        <tr><th>Name</th><th></th></tr>
    </thead>
    <tbody>
<?php foreach ($passengers as $psg): ?>

    <tr id="id<?php echo $psg->id ?>">
       <td><?php echo $psg->name ?></td>
       <td>
           <a class="rm-link" title="Delete" href="passenger/delete/<?php echo $psg->id ?>" id="<?php echo $psg->id ?>">
            <span class="glyphicon glyphicon-remove"></span>
           </a> | 
           <a title="Itinerary" href="<?php echo site_url('passenger/itinerary');?>/<?php echo $psg->id ?>">
            <span class="glyphicon glyphicon-ok"></span>
           </a> 
       </td>
    </tr>

<?php endforeach ?>
    </tbody>
</table>

<?php } else { ?>
<div class="alert alert-warning" role="alert">There is not any passenger record !!!</div>
<?php } ?>
</div>

<h3>Busisness passengers</h3>
<div>
<?php if( $busisness_passengers ) { ?>

<table class="table table-striped">
    <thead>
        <tr><th>Name</th><th>Flight miles</th></tr>
    </thead>
    <tbody>
<?php foreach ($busisness_passengers as $psg): ?>

    <tr id="ido<?php echo $psg->id ?>">
       <td><?php echo $psg->name ?></td>
       <td><?php echo $psg->flight_miles ?></td>
    </tr>

<?php endforeach ?>
    </tbody>
</table>

<?php } else { ?>
<div class="alert alert-warning" role="alert">There is not any busisness passenger record !!!</div>
<?php } ?>
</div>

<script>
    $( ".rm-link" ).click(function (e) {
        e.preventDefault();
        
        var link = $( this );
        
        $.ajax({
            type: "GET",
            url: link.attr("href"),
        })
            .done( function ( msg ) {
                var id = link.attr("id");
                var row1 = "#id";
                row1 = row1.concat(id);
                var row2 = "#ido"
                row2 = row2.concat(id);
                
                $( row1 ).remove();
                $( row2 ).remove();
            });
    });
</script>