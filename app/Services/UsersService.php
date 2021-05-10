<?php

namespace App\Services;
use App\Http\Requests\UserRequest;

use App\User;

class UsersService
{
	public static function getOne(int $id): object
	{
		return User::findOrFail($id);
	}


	public static function list(): object
	{
		return User::all();
	}


	public static function store(UserRequest $request): object
	{
		$params = $request->all();
		$params['user_type_id'] = isset($params['cnpj']) && ! empty($params['cnpj']) ? 2 : 1;

		return User::create($params);
	}


	public static function update(UserRequest $request, int $id): object
	{
        $params = $request->all();     
        $user = User::find($id);
        $user->update($params);
        return $user;
	}


	public static function destroy(int $id): bool
	{
		return User::destroy($id);
	}
}
