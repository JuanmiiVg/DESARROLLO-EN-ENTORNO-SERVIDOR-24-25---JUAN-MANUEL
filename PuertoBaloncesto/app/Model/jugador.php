<?php

namespace App\Model;

class Jugador extends Model
{
    function __construct($con)
    {
        parent::__construct($con);
        $this->table = "jugador";
    }
}
