<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LegalEvent
 */
class LegalEvent extends Model
{
    protected $table = 'legal_events';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'claim_id',
        'defendant',
        'claim_status',
        'change_date'
    ];

    protected $guarded = [];

        
}
