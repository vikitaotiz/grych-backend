<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operation;
use App\Http\Resources\Operations\OperationResource;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operations = Operation::latest()->get();

        return OperationResource::collection($operations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $operation = Operation::create([
            'service' => $request->service,
            'payment_frequency' => $request->payment_frequency,
            'amount' => $request->amount,
            'user_id' => $request->user_id,
            'user_name' => $request->user_name,
            'user_id_number' => $request->user_id_number
        ]);

        return new OperationResource($operation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Operation  $Operation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operation = Operation::find($id);

        return $operation;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Operation  $Operation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $operation = Operation::find($id);

        $operation->update([
            'service' => $request->service,
            'payment_frequency' => $request->payment_frequency,
            'amount' => $request->amount,
            'user_id' => $request->user_id,
            'user_name' => $request->user_name,
            'user_id_number' => $request->user_id_number
        ]);

        return new OperationResource($operation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Operation  $Operation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $operation = Operation::find($id);

        $operation->delete();

        return response()->json(['message' => 'Operation deleted successfully!']);

    }
}
