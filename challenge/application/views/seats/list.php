<h3>Seats in <?php echo $airframe->name; ?>: </h3>

<?php if( $items ) { ?>

<table class="table table-striped">
    <thead>
        <tr><th>seat</th><th></th></tr>
    </thead>
    <tbody>
    
    <?php foreach($items as $item): ?>
        <tr id="tr<?php echo $item->id ?>">
            <td>
                <?php echo $item->row . $item->col ?> - 
                <?php echo $item->type ?>
            </td>
                <td>
                    <a href="delete/<?php echo $item->id ?>" title="Delete" class="rm-link" id="<?php echo $item->id ?>"> 
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

<div class="alert alert-warning" role="alert">There is not seats for this air frame !!!</div>

<?php } ?>