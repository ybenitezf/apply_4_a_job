<?php $this->load->helper('url'); ?>
<h3>Registred flights</h3>

<?php if( $items ) { ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Number</th>
            <th>Originating airport</th>
            <th>Departure time/date</th>
            <th>Destination airport</th>
            <th>Arrival time/date</th>
            <th>Air frame</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($items as $item): ?>
            <tr id="tr<?php echo $item->number ?>">
                <td><?php echo $item->number ?></td>
                <td><?php echo $item->oairport ?></td>
                <td><?php echo $item->departure ?></td>
                <td><?php echo $item->dairport ?></td>
                <td><?php echo $item->arrival ?></td>
                <td>
                    <a href="<?php echo site_url('seats')?>/?af=<?php echo $item->airframe ?>" title="Details">
                        <?php 
                            $airframe = $this->airframe_model->get_data( $item->airframe );
                            
                            echo $airframe->name;
                        ?>                        
                    </a>                     
                </td>
                <td>
                    <a href="<?php echo site_url('flights/delete')?>/<?php echo $item->number ?>" title="Delete" class="rm-link" id="<?php echo $item->number ?>"> 
                        <span class="glyphicon glyphicon-remove"></span>
                    </a>                    
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script>
    $( ".rm-link" ).click(function (e) {
        e.preventDefault();
        
        var link = $(this);
        $.ajax({
            type: "GET",
            url: link.attr("href"),
        }).done( function(msg) {
            var id = link.attr("id");
            var row = "#tr".concat(id);
            
            $( row ).remove();
        });
    });
</script>

<?php } else { ?>

<div class="alert alert-warning" role="alert">There is not any flight record !!!</div>

<?php } ?>