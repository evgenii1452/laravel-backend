<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'wrnt',
        'master',
    ];

    public function setWrntAttribute($wrnt) {
        $this->attributes['wrnt'] = Carbon::now()->setDateTimeFrom($wrnt);

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'master', 'id');
    }
}
