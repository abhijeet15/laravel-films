<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Comment extends Model
{
    protected $guarded = [ 'id' ];

    public function film( )
    {
    	return $this->belongsTo( Film::class );
    }
}
