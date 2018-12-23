<?php

namespace Praid;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    //
    public $table = 'prices';
    protected $fillable = ['price','currency_id','Data'];


    public function currency()
    {
        return $this->belongsTo('Praid\Currency');
    }
}
