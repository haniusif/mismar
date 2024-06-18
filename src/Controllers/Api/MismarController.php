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
        $data['mismar_order_time'] = Carbon::parse($data['mismar_order_time'])->format('Y-m-d H:i');
        $order = MismarOrder::create($data);

        return new MismarOrderResource($order);
    }

    public function update(UpdateMismarOrderRequest $request, $id)
    {
        $order = MismarOrder::findOrFail($id);
        $data = $request->validated();
        $data['mismar_order_time'] = Carbon::parse($data['mismar_order_time'])->format('Y-m-d H:i');
        $order->update($data);

        return new MismarOrderResource($order);
    }

    public function change_order_time(UpdateMismarOrderRequest $request, $id)
    {
        $order = MismarOrder::findOrFail($id);
        $data = $request->validated();
        $data['mismar_order_time'] = Carbon::parse($data['mismar_order_time'])->format('Y-m-d H:i');
        $order->update($data);

        return new MismarOrderResource($order);
    }

    public function cancel_order($id)
    {
        $order = MismarOrder::findOrFail($id);
        $order->cancel();

        return response()->json(null, 204);
    }
}
