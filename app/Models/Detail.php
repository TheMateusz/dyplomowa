<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $table = 'user_details';

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'year',
        'country',
        'city',
        'min_age',
        'max_age',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
