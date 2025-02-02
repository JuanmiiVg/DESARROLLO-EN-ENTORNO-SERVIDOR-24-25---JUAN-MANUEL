<?php
namespace App\Model;

use App\Model\Model;

class Raza extends Model
{
function __construct($con)
{
    parent::__construct($con);
    $this->table="raza";

}
}