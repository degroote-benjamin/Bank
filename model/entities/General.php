<?php
/**
 *
 */
class General extends Account
{
protected $type = "General";

public function __construct()
{
    if (!empty($donnees)) {
        $this->hydrate($donnees);
    }
}
}


 ?>
