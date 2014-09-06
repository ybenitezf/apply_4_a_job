<h3>Reservations list</h3>

<?php if( $items ) { ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Passenger</th>
            <th>Flight - Seat</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($items as $item): ?>
            <tr id="tr<?php echo $item->id ?>">
                <?php
                    $psg = $this->passenger_model->get_by_id( $item->passenger );
                    $flight = $this->flight_model->get_by_id( $item->flight );
                    $seat = $this->seat_model->get_by_id( $item->seat );
                ?>
                <td><?php echo $psg->name; ?></td>
                <td>
                    <?php echo $flight->number; ?> - 
                    <?php echo $seat->row; ?><?php echo $seat->col; ?>
                </td>
                <td>
                    <a href="<?php echo site_url('res/delete')?>/<?php echo $item->id ?>" title="Delete" class="rm-link" id="<?php echo $item->id ?>"> 
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

<div class="alert alert-warning" role="alert">There is not any reservation !!!</div>

<?php } ?>