<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterModel extends Model
{
    public function make(){
        return $this->belongsTo(MasterMake::class);
    }
}
