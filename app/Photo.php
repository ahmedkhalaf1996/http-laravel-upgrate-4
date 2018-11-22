<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = ['file'];


    protected $dirUrl  = '/images/';


// -> this function Depends on your coulmin name on db ///
// this can be getPathAttribute if ur col name on the db name 'path' ///
    
    public function getFileAttribute($value){

    	return $this->dirUrl . $value;
   
    }






}
