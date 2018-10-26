<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Country extends Model
{
    protected $guarded = [ 'id' ];

    public function films( )
    {
    	return $this->hasMany( Film::class );
    }
}
