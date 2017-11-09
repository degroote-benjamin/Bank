<?php
function chargerClasse($classname)
{
  $entit = __DIR__. '/model/entities/' . $classname.'.php';
  $manager = __DIR__. '/model/manager/' . $classname.'.php';
  if(file_exists($entit)){
    require $entit;
  }
  else {
    require $manager;
  }
}

spl_autoload_register('chargerClasse');

session_start();

include 'controller/add.php';
