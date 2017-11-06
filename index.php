<?php
function chargerClasse($classname)
{
  $entit = __DIR__. '/model/entity/' . $classname.'.php';
  $manager = __DIR__. '/model/manager/' . $classname.'.php';
  if(file_exists($entit)){
    require $entit;
  }
  else {
    require $manager;
  }
}

spl_autoload_register('chargerClasse');

include 'control/index.php';
