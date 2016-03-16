<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Claim
 */
class Claim extends Model
{
    protected $table = 'claims';

    protected $primaryKey = 'claim_id';

	public $timestamps = false;

    protected $fillable = [
        'patient'
    ];

    protected $guarded = [];

    public function defendants()
    {
        return $this->hasMany('App\Models\Defendant');
    }
        
}
