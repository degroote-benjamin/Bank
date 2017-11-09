<?php
include 'header.php';
?>
    <div class="container d-flex justify-content-center">
        <div class="row">
            <form class="" action="index.php" method="post">
                <div class="form-group">
                    <label for="type">Select type account:</label>
                    <select class="form-control" name="type" id="type">
                      <?php
                      foreach (Account::Type as $key => $value) {
                          ?>
                        <option value="<?php echo $value?>"><?php echo $value?></option>
                      <?php
                      }
                      ?>
                    </select>
                </div>
                <input type="submit" name="submitadd" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>


    <?php
include 'footer.php';
 ?>
