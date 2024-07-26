<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_pengeluaran extends Model
{
    protected $table      = 'pengeluaran';
    protected $primaryKey = 'id';

    protected $allowedFields = ['keterangan', 'jumlah', 'catatan', 'created_at','deleted_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}