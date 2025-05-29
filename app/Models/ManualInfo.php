<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ManualInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'manualhead_id', 'stepnumber', 'description', 'otherinfo'
    ];

    public function manualHead()
    {
        return $this->belongsTo(ManualHead::class, 'manualhead_id');
    }

    public function manualInfoPics()
    {
        return $this->hasMany(ManualInfoPic::class, 'info_id');
    }
}
