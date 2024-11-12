<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfflineAccount extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $fillable = ['bank_name', 'swift_code', 'iban','beneficiary', 'program_id'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
