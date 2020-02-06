<?php

namespace App\Entity;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function userInvitation($userId)
    {
        return $this->where('user_id', $userId);
    }

    public function details()
    {
        return $this->hasMany(DetailInvitation::class);
    }

    public function getDateAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d M Y H:i A');
    }
}
