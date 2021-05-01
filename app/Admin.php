<?php

namespace App;

	use Illuminate\Database\Eloquent\Model;

   use Illuminate\Notifications\Notifiable;
   use Illuminate\Database\Eloquent\SoftDeletes; 
   use Illuminate\Foundation\Auth\User as Authenticatable;

    class Admin extends Authenticatable
    {
        use Notifiable;
        use SoftDeletes;
        protected $dates = ['deleted_at'];

        protected $guard = 'admin';
        

        protected $fillable = [
            'name', 'email', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];

}
