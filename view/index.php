<?php
include 'header.php';
?>
<?php
if(isset($_SESSION['error']['delete'])){
  ?>
  <div class="alert alert-danger" role="alert">
    <strong class="text-center">You can't delete general account</strong>
  </div>
  <?php
} ?>
<div class="container">
  <div class="row d-flex justify-content-center">
<?php
foreach ($list as $key => $value) {
?>

<ul class="list-group col-10 col-md-5 my-3">
  <li class="list-group-item active d-flex justify-content-center"><?php echo $value->getType() ?></li>
  <li class="list-group-item">Amount : <?php echo $value->getAmount()?></li>
  <li class="list-group-item d-flex justify-content-around">
    <a class="btn btn-primary" href="?id_account=<?php echo $value->getIdAccount();?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
    <a class="btn btn-primary" href="add.php?iddetail=<?php echo $value->getIdAccount();?>"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
  </li>
</ul>
<?php
}
?>
</div>
</div>

<?php
include 'footer.php';
 ?>
