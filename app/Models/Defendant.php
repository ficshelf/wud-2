<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Defendant
 */
class Defendant extends Model
{
    protected $table = 'defendants';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'claim_id',
        'defendant'
    ];

    protected $guarded = [];

    public function claim()
    {
        return $this->belongsTo('App\Models\Claim');
    }        
}
