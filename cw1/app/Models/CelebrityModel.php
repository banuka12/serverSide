<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class CelebrityModel extends Model{

    protected $table            = 'celebrity';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id','name', 'img_url'];

}