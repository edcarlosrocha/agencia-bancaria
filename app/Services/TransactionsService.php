<?php

namespace App\Services;
use App\Http\Requests\TransactionRequest;

use App\Transaction;

class TransactionsService
{
	public static function getOne(int $id): object
	{
		return Transaction::findOrFail($id);
	}


	public static function list(): object
	{
		return Transaction::all();
	}


	public static function store(TransactionRequest $request): object
	{
		$params = $request->all();

		return Transaction::create($params);
	}


	public static function update(TransactionRequest $request, int $id): object
	{
        $params = $request->all();     
        $transaction = Transaction::find($id);
        $transaction->update($params);
        return $transaction;
	}


	public static function destroy(int $id): bool
	{
		return Transaction::destroy($id);
	}
}
