<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'country_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
