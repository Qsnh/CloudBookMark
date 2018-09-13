<?php
// +----------------------------------------------------------------------
// | User.php
// +----------------------------------------------------------------------
// | Description: User.php
// +----------------------------------------------------------------------
// | Time: 18-9-13 下午2:30
// +----------------------------------------------------------------------
// | Author: 小滕<616896861@qq.com>
// +----------------------------------------------------------------------

namespace App\Foundations\Auth;

use App\Foundations\Auth\Passwords\CanResetPassword;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
}
