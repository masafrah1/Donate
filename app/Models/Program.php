<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $fillable = ['pay_link', 'title'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function leaders()
    {
        return $this->hasMany(Leader::class);
    }

    public function offlineAccounts()
    {
        return $this->hasMany(OfflineAccount::class);
    }
}
