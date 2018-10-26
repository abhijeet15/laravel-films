<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Genre extends Model
{
    protected $guarded = [ 'id' ];

    public function films( )
    {
    	return $this->belongsToMany( Film::class );
    }
}
