<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ManualInfoPic extends Model
{
    use HasFactory;

    protected $fillable = ['info_id', 'attachment', 'other_info'];

    public function manualInfo()
    {
        return $this->belongsTo(ManualInfo::class, 'info_id');
    }
}
