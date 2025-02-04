<?php

namespace App\Model;

class Equipo extends Model
{
    function __construct($con)
    {
        parent::__construct($con);
        $this->table = "equipo";
    }
}
