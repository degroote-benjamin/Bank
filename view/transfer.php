<?php
include 'header.php';
 ?>
    <div class="container d-flex justify-content-center">
        <div class="row">
            <form action="add.php?transfer" method="post" class="my-5">
                <div class="form-group">
                     <?php
                      if (isset($_SESSION['error']['amount'])) {
                      ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Wrong amount</strong>
                        </div>
                        <?php
                      } ?>
                            <label for="bank">debit</label>
                            <select name="debit" class="form-control">
                             <?php foreach ($list as $key => $value) {
                          ?>
                               <option value="<?php echo $value->getIdAccount()?>"><?php echo $value->getType() . "   " . $value->getAmount()?></option>
                             <?php
                      } ?>
                           </select>
                </div>
                <div class="form-group">
                    <label for="bank">credit</label>
                    <select name="credit" class="form-control">
                       <?php foreach ($list as $key => $value) {
                          ?>
                         <option value="<?php echo $value->getIdAccount()?>"><?php echo $value->getType() . "   " . $value->getAmount()?></option>
                       <?php
                      } ?>
                   </select>
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input class="form-control" type="number" name="amount" value="" id="amount">
                </div>
                <input type="submit" name="submittransfer" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>

<?php
include "footer.php";
?>
