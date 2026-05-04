<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanModel extends Model
{
    protected $table            = 'pengajuan';
    protected $primaryKey       = 'nik_terlapor';
    // protected $useSoftDeletes   = true;

    protected $allowedFields    = ['nik_terlapor', 'nama_pengaju', 'nik_pengaju', 'nik_terlapor','no_hp','nama_terlapor','tanggal_kematian','foto_surat','file_surat','status','email'];
    
    protected $returnType = 'object';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

}
