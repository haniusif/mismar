<?php

namespace Modules\Mismar\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Mismar\Requests\StoreMismarOrderRequest;
use Modules\Mismar\Requests\UpdateMismarOrderRequest;
use Modules\Mismar\Requests\UpdateMismarOrderLocationRequest;
use Modules\Mismar\Requests\UpdateMismarOrderTimeRequest;
use Modules\Mismar\Models\MismarOrder;
use Modules\Mismar\Resources\MismarOrderResource;
use Carbon\Carbon;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MismarController extends Controller
{
    public function index()
    {
        $orders = MismarOrder::all();
        return MismarOrderResource::collection($orders);
    }

    public function show($id)
    {
        $order = MismarOrder::find($id);
        if (!$order) {
            throw new NotFoundHttpException("Order with ID {$id} not found");
        }
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
        $order = MismarOrder::find($id);
        if (!$order) {
            throw new NotFoundHttpException("Order with ID {$id} not found");
        }
        $data = $request->validated();
        $data['mismar_order_time'] = Carbon::parse($data['mismar_order_time'])->format('Y-m-d H:i');
        $order->update($data);

        return new MismarOrderResource($order);
    }

    public function change_order_location(UpdateMismarOrderLocationRequest $request, $id)
    {
        $order = MismarOrder::find($id);
        if (!$order) {
            throw new NotFoundHttpException("Order with ID {$id} not found");
        }
        $data = $request->validated();
        $order->update($data);

        return new MismarOrderResource($order);
    }

    public function change_order_time(UpdateMismarOrderTimeRequest $request, $id)
    {
        $order = MismarOrder::find($id);
        if (!$order) {
            throw new NotFoundHttpException("Order with ID {$id} not found");
        }
        $data = $request->validated();
        $data['mismar_order_time'] = Carbon::parse($data['mismar_order_time'])->format('Y-m-d H:i');
        $order->update($data);

        return new MismarOrderResource($order);
    }

    public function cancel_order($id)
    {
        $order = MismarOrder::find($id);
        if (!$order) {
            throw new NotFoundHttpException("Order with ID {$id} not found");
        }
        $order->cancel();

        return response()->json(null, 204);
    }
}
