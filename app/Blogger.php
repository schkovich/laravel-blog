<?php

namespace LaravelBlog;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Blogger extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bloggers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [ 'name', 'username', 'email', 'password', 'confirmed' ,'confirmation_code' ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
	protected $hidden = [ 'password', 'remember_token' ,'confirmation_code'  ];


	public function blogs()
	{
		return $this->hasMany('LaravelBlog\Blog');
	}
}
