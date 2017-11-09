<?php
include 'header.php';
?>
<div class="container">
  <div class="row">
<?php
foreach ($list as $key => $value) {
?>

<ul class="list-group col-5">
  <li class="list-group-item active d-flex justify-content-center"><?php echo $value->getType() ?></li>
  <li class="list-group-item">Amount : <?php echo $value->getAmount()?></li>
  <li class="list-group-item d-flex justify-content-around">
    <a class="btn btn-primary" href="?iddelete=<?php echo $value->getIdAccount();?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
    <a class="btn btn-primary" href="detail.php?iddetail=<?php echo $value->getIdAccount();?>"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
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
