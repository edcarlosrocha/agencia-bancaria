<?php

namespace App\Services;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Str;
use App\User;
use Auth;

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
        try {
            if (! $request->validated()) {
                return $request->errors()->getMessages();
            }

            $fillable = (new User())->getFillable();
            $params   = $request->only($fillable);
            $params['user_type_id'] = isset($params['cnpj']) && ! empty($params['cnpj']) ? 2 : 1;
            $params['api_token'] = Str::random(60);

            return User::create($params);
        } catch (\Exception $e) {
            return collect([
                'error' => $e->getMessage()
            ]);
        }
    }


    public static function update(UserRequest $request, int $id): object
    {
        try {
            if (! $request->validated()) {
                return $request->errors()->getMessages();
            }

            $fillable = (new User())->getFillable();
            $params   = $request->only($fillable);
            $params['api_token'] = Str::random(60);
            $user     = User::findOrFail($id);

            if (! $user) {
                throw new \Exception("User {$id} não encontrado");
            }

            $user->update($params);
            return $user;
        } catch (\Exception $e) {
            return collect([
                'error' => $e->getMessage()
            ]);
        }
    }


    public static function destroy(int $id): bool
    {
        try {
            $user = User::findOrFail($id);

            if (! $user) {
                throw new \Exception("User {$id} não encontrada");
            }

            return $user->delete();
        } catch (\Exception $e) {
            return collect([
                'error' => $e->getMessage()
            ]);
        }
    }
}
