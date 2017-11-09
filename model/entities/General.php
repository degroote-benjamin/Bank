<?php
/**
 *
 */
class General extends Account
{
protected $type = "General";

public function __construct($donnees = NULL)
{
    if (!empty($donnees)) {
        $this->hydrate($donnees);
    }
}
}


 ?>
