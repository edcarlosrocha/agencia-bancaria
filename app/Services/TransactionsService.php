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
		try {
			if (! $request->validated()) {
				return $request->errors()->getMessages();
			}

			$fillable = (new Transaction)->getFillable();
			$params   = $request->only($fillable);

			if ($params['payer_id'] === $params['payee_id']) {
				throw new \Exception("Não se pode transferir dinheiro para você mesmo");
			}

			return Transaction::create($params);
		} catch (\Exception $e) {
			return collect([
				'error' => $e->getMessage()
			]);
		}

	}


	public static function update(TransactionRequest $request, int $id): object
	{
		try {
			if (! $request->validated()) {
				return $request->errors()->getMessages();
			}

			$fillable = (new Transaction)->getFillable();
	        $params   = $request->only($fillable);     
	        $transaction = Transaction::findOrFail($id);

	        if (! $transaction) {
	        	throw new \Exception("Transaction {$id} não encontrada");
	        }

	        $transaction->update($params);
	        return $transaction;
		} catch (\Exception $e) {
			return collect([
				'error' => $e->getMessage()
			]);
		}
	}


	public static function destroy(int $id)
	{
		try {
			$transaction = Transaction::findOrFail($id);

			if (! $transaction) {
				throw new \Exception("Transaction {$id} não encontrada");
			}

			return $transaction->delete();
		} catch (\Exception $e) {
			return collect([
				'error' => $e->getMessage()
			]);
		}
	}
}
