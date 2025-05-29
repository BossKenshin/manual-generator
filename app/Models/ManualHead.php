<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ManualHead extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'attachment', 'author', 'category_id',
        'SysCreated', 'SysCreator', 'SysModified', 'SysModifier'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function manualInfos()
    {
        return $this->hasMany(ManualInfo::class);
    }
}
