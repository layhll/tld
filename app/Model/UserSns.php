<?php

namespace Tld\Wechat\Model;

use Illuminate\Database\Eloquent\Model;

class UserSns extends Model
{
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    protected $table = 'user_sns';

    public function user()
    {
        return $this->hasOne('App\User',"id","user_id");//关联
    }
}
