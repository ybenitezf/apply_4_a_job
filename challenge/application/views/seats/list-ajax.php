  <label for="inputSeat">Seat</label>
  <select class="form-control" name="seat" id="inputSeat">
        <?php foreach($seats as $s): ?>
            <option value="<?php echo $s->id ?>">
                <?php echo $s->row . $s->col ?> 
            </option>
        <?php endforeach ?>
        <option selected>
        </option>
  </select>