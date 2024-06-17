<?php

namespace Modules\Mismar\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Mismar\Requests\StoreMismarOrderRequest;
use Modules\Mismar\Requests\UpdateMismarOrderRequest;
use Modules\Mismar\Models\MismarOrder;
use Modules\Mismar\Resources\MismarOrderResource;
use Carbon\Carbon;

class MismarController extends Controller
{
    public function index()
    {
        $orders = MismarOrder::all();
        return MismarOrderResource::collection($orders);
    }

    public function show($id)
    {
        $order = MismarOrder::findOrFail($id);
        return new MismarOrderResource($order);
    }

    public function store(StoreMismarOrderRequest $request)
    {
        $data = $request->validated();
        $data['mismar_order_time'] = Carbon::parse($data['mismar_order_time'])->format('Y-m-d H:i:s');
        $order = MismarOrder::create($data);

        return new MismarOrderResource($order);
    }

    public function update(UpdateMismarOrderRequest $request, $id)
    {
        $order = MismarOrder::findOrFail($id);
        $data = $request->validated();
        $data['mismar_order_time'] = Carbon::parse($data['mismar_order_time'])->format('Y-m-d H:i:s');
        $order->update($data);

        return new MismarOrderResource($order);
    }

    public function destroy($id)
    {
        $order = MismarOrder::findOrFail($id);
        $order->delete();

        return response()->json(null, 204);
    }
}
