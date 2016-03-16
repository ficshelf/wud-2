<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ClaimStatusCode
 */
class ClaimStatusCode extends Model
{
    protected $table = 'claim_status_codes';

    protected $primaryKey = 'claim_status';

	public $timestamps = false;

    protected $fillable = [
        'claim_status_desc',
        'claim_seq'
    ];

    protected $guarded = [];

        
}
