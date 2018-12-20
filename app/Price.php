<?php

namespace Praid;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    //
    public $table = 'prices';


    public function currency()
    {
        return $this->belongsTo('Praid\Currency');
    }
}
