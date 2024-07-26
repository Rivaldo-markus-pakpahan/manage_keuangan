<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_saldo extends Model
{
    protected $table      = 'saldo';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id','id_pengeluaran', 'id_pemasukan', 'jmlh_saldo'];
   
}