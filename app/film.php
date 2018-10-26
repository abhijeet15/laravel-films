<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Film extends Model
{
    protected $guarded = [ 'id' ];

    public function country( )
    {
    	return $this->belongsTo( Country::class );
    }

	public function genres( ) 
	{
		return $this->belongsToMany( Genre::class );
	}

	public function comments( ) 
	{
		return $this->hasMany( Comment::class );
	}

	public function next(){
	    // get next user
	    return Film::where('id', '>', $this->id)->orderBy('id','asc')->first( );

	}
	public  function previous(){
	    // get previous  user
	    return Film::where('id', '<', $this->id)->orderBy('id','desc')->first();

	}
}
