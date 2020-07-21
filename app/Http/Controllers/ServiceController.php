<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Http\Requests\Services\ServiceRequest;
use App\Http\Requests\Services\UpdateServiceRequest;
use App\Http\Resources\Services\ServiceResource;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->get();

        return ServiceResource::collection($services);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $service = Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);

        return new ServiceResource($service);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);

        return $service;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, $id)
    {
        $service = Service::find($id);

        $service->update([
            'name' => $request->name,
            'description' => $request->name,
            'user_id' => $request->user_id
        ]);

        return new ServiceResource($service);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        $service->delete();

        return response()->json(['message' => 'Service deleted successfully!']);
    }
}
