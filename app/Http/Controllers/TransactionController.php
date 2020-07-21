<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Http\Resources\Transactions\TransactionResource;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::latest()->get();

        return TransactionResource::collection($transactions);
    }

    public function clientTransactions($id_number)
    {
        $transactions = Transaction::where('client_id', $id_number)->get();

        return TransactionResource::collection($transactions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction = Transaction::create([
            'service' => $request->service,
            'payment_mode' => $request->payment_mode,
            'amount' => $request->amount,
            'user_id' => $request->user_id,
            'client' => $request->client,
            'client_id' => $request->client_id
        ]);

        return new TransactionResource($transaction);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $Transaction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);

        return $transaction;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $Transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        $transaction->update([
            'service' => $request->service,
            'payment_mode' => $request->payment_mode,
            'amount' => $request->amount,
            'user_id' => $request->user_id,
            'client' => $request->client,
            'client_id' => $request->client_id
        ]);

        return new TransactionResource($transaction);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $Transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        $transaction->delete();

        return response()->json(['message' => 'Transaction deleted successfully!']);

    }
}
