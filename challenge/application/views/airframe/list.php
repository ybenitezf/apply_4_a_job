<?php $this->load->helper('url'); ?>
<h3>Registred air frames</h3>

<?php if( $items ) { ?>

<table class="table table-striped">
    <thead>
        <tr><th>Name</th><th></th></tr>
    </thead>
    <tbody>
        <?php foreach($items as $item): ?>
            <tr id="tr<?php echo $item->id ?>">
                <td><?php echo $item->name ?></td>
                <td>
                    <a href="<?php echo site_url('airframe/delete')?>/<?php echo $item->id ?>" title="Delete" class="rm-link" id="<?php echo $item->id ?>"> 
                        <span class="glyphicon glyphicon-remove"></span>
                    </a> | 
                    <a href="<?php echo site_url('seats')?>/?af=<?php echo $item->id ?>" title="Edit seats" class="edit-link">
                        <span class="glyphicon glyphicon-th-large">Seats</span>
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

<div class="alert alert-warning" role="alert">There is not any air frame record !!!</div>

<?php } ?>