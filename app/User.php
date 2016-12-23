<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
     * Check the role of the user
     */

    public function isAdmin($roleName)
    {
        foreach ($this->roles()->get() as $role)
        {
            if (strtolower($role->name) == strtolower($roleName))
            {
                return true;
            }
        }

        return false;
    }


    /**
    * Get Role for the user
    */
    public function getRole()
    {
        foreach ($this->roles()->get() as $role)
        {
             return $role->name ;
         }
    }

    /**
     * Get drafted posts associated with user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function draftedPost(){

        return $this->hasMany('App\DraftedPost');
    }

    /**
     * Get drafted posts associated with user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function submittedPost(){

        return $this->hasMany('App\DraftedPost');
    }

    /**
     * Get publisheds posts associated with user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function publishedPost(){

        return $this->hasMany('App\DraftedPost');
    }
}
