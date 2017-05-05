<?php namespace App\Http\Controllers\ApiTwo;

use Auth;
use Hash;
use Fractal;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use App\Transformers\UserTransformer;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\MemberChangePassword;

class UserController extends Controller
{

    /** 当前登录用户信息 */
    public function current()
    {
        $array = Fractal::item(Auth::user(), new UserTransformer())->getArray();

        return response()->json($array);
    }

    /** 注册用户 */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        if ($user) {
            return response('', 201);
        }

        return abort(500);
    }

    public function changePassword(MemberChangePassword $request)
    {
        $user = Auth::user();

        if (! Hash::check($request->input('old_password'), $user)) {
            return abort(400, json_encode(['error' => '原密码错误']));
        }

        try {
            $user->password = bcrypt($request->input('new_password'));
            $user->save();
        } catch (\Exception $e) {
            return abort(500);
        }

        return response('', 201);
    }

}