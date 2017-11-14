<?php
include 'header.php';
?>
    <div class="container d-flex justify-content-end my-3">
        <a class="btn btn-primary" href="index.php?id_account=<?php echo $account->getIdAccount();?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
    </div>
    <div class="container d-flex justify-content-center">
        <div class="row">
            <ul class="list-group">
                <li class="list-group-item active d-flex justify-content-center">
                    <?php echo $account->getType() ?>
                </li>
                <li class="list-group-item">Amount :
                    <?php echo $account->getAmount()?>
                </li>
                <li class="list-group-item">Name :
                    <?php echo $_SESSION['user']->getName()?>
                </li>
            </ul>
        </div>
    </div>


    <div class="container d-flex justify-content-center">
        <div class="row">
            <form action="add.php" method="post" class="my-5">
                <div class="form-group">
                          <?php
                      if (isset($_SESSION['error']['amount'])) {
                          ?>
                        <div class="alert alert-danger" role="alert">
                            <strong class="text-center">wrong amount</strong>
                        </div>
                        <?php
                      } ?>
                            <label for="bank">Banking operation</label>
                            <select name="bank" class="form-control">
                               <option value="withdrawal">Withdrawal</option>
                              <option value="add">Add</option>
                            </select>
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input class="form-control" type="number" name="amount" value="" id="amount">
                </div>
                <input type="hidden" name="iddetail" value="<?php echo $account->getIdAccount()?>">
                <input type="submit" name="submitamount" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>

    <?php
include 'footer.php';
?>
