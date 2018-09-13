<?php
// +----------------------------------------------------------------------
// | CanResetPassword.php
// +----------------------------------------------------------------------
// | Description: CanResetPassword.php
// +----------------------------------------------------------------------
// | Time: 18-9-13 下午2:31
// +----------------------------------------------------------------------
// | Author: 小滕<616896861@qq.com>
// +----------------------------------------------------------------------

namespace App\Foundations\Auth\Passwords;

use App\Notifications\ResetPasswordNotification;

trait CanResetPassword
{
    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}