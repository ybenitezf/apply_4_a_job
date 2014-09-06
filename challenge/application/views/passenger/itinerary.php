<h1>Itinerary</h1>

<?php if( $itinerary ) { ?>


<h3>Itinerary for <?php echo $passenger->name ?></h3>
<ol>
<?php foreach($itinerary as $res): ?>
    <li>
        flight <?php echo $res->flight ?>, seat
        <?php 
        $seat = $this->seat_model->get_by_id($res->seat);
        
        echo $seat->row;
        echo $seat->col;
        ?>
    </li>
<?php endforeach ?>
</ol>

<?php }else{ ?>

<div class="alert alert-warning" role="alert">There is not a itinerary for this person !!!</div>

<?php } ?>