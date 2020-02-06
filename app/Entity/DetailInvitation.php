<?php

namespace App\Entity;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DetailInvitation extends Model
{
    protected $table = 'invitation_details';
    protected $guarded = ['id'];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d M Y');
    }
}
