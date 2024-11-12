<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leader extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $fillable = [
        'first_name',
        'family_name',
        'phone',
        'email',
        'currency',
        'amount',
        'country',
        'is_private',
        'payment_method',
        'pay_type',
        'program_id',
    ];

    protected $hidden = ['father_name', 'grand_father_name'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
