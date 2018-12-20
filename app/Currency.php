<?php

namespace Praid;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    //
    public $table = 'currency';


     public function prices()
    {
        return $this->hasMany('Praid\Price');
    }
}
