<?php

namespace App;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany(Category::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'user_id');
    }

    /**
     * 保存头像
     * @param UploadedFile $file
     */
    public function saveAvatar(UploadedFile $file) : void
    {
        $path = $file->store('/avatar');
        $url = Storage::disk(config('filesystems.default'))->url($path);
        $this->avatar = $url;
        $this->save();
    }

    /**
     * @param string $password
     */
    public function setPasswordAttribute(string $password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * @param string $password
     * @return bool
     */
    public function checkPasswordIsOk(string $password) : bool
    {
        return Hash::check($password, $this->password);
    }

    /**
     * 修改密码
     * @param string $password
     */
    public function changePassword(string $password) : void
    {
        $this->password = $password;
        $this->save();
    }

}
