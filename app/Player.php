<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'players';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'height', 'birth_date','team_id'];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }
    public function getFullNameAttribute()
    {
        return $this->last_name.', '.$this->first_name;
    }
    public function getFullNameAndIdAttribute()
    {
        return  $this->id_number.' - '.$this->last_name.', '.$this->first_name;
    }
    
}
