<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\IncomeRequest;
use App\Http\Requests\TicketCreateRequest;
use App\Http\Requests\TypeTicketCreateRequest;
use App\Http\Requests\TypeTicketUpdateRequest;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Ticket;
use App\Models\TypeTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function createType(TypeTicketCreateRequest $request){
        $type = new TypeTicket($request->all());
        $type->save();
        return response()->json($type)->setStatusCode(201,'Created');
    }
    public function updateType(TypeTicketUpdateRequest $request, $id){
        $type = TypeTicket::find($id);

        if (!$type) {
            throw new ApiException(404, 'Not Found');
        }

        $type->update($request->all());
        return response()->json($type)->setStatusCode(200,'Ok');
    }
    public function deleteType($id){
        $type = TypeTicket::find($id);

        if (!$type) {
            throw new ApiException(404, 'Not Found');
        }

        $type->delete();
        return response()->json('Удалено')->setStatusCode(410,'Gone');
    }

    public function createTicket(TicketCreateRequest $request){
        $prices = [
            1 => TypeTicket::where('name', 'Экстрим тройка')->value('price'),
            2 => TypeTicket::where('name', 'Экстрим шестерка')->value('price'),
            3 => TypeTicket::where('name', 'Экстрим девятка')->value('price'),
            4 => TypeTicket::where('name', 'Экстрим двенашка')->value('price')
        ];

        $hoursToAdd = [
            1 => 3,
            2 => 6,
            3 => 9,
            4 => 12
        ];

        $userId = Auth::id();

        $typeTicketId = $request->input('type_tickets_id');

        $ticket = new Ticket([
            'user_id' => $userId,
            'total' => $prices[$typeTicketId],
            'type_tickets_id' => $typeTicketId,
        ]);

        $datetimeStart = Carbon::now();
        $datetimeEnd = $datetimeStart->copy()->addHours($hoursToAdd[$typeTicketId]);
        $ticket->datetimeStart = $datetimeStart->format('Y-m-d H:i:s');
        $ticket->datetimeEnd = $datetimeEnd->format('Y-m-d H:i:s');
        $ticket->save();

        $cart_id = $request->input('cart_id');

        if ($cart_id !== null) {
            $orderList = OrderList::create([
                'ticket_id' => $ticket->id,
                'user_id' => $userId,
                'cart_id' => $cart_id,
            ]);
        } else {
            $orderList = OrderList::create([
                'ticket_id' => $ticket->id,
                'user_id' => $userId,
                'cart_id' => null,
            ]);
        }
        $tell = Auth::user()->phone;

        Order::create([
            'total' => $prices[$typeTicketId],
            'order_lists_id' => $orderList->id,
            'phone' => $tell,
        ]);


        return response()->json($ticket)->setStatusCode(201, 'Created');
    }


    public function typeTickets(){
        $types = TypeTicket::all();
        return response()->json($types)->setStatusCode(200,'Ok');
    }
    public function typeTicket($id){
        $type = TypeTicket::find($id);
        return response()->json($type)->setStatusCode(200,'Ok');
    }


    public function popular(){
        $popularTypeTickets = Ticket::groupBy('type_tickets_id')
            ->selectRaw('type_tickets_id, COUNT(*) as total')
            ->orderByDesc('total')
            ->first();

        if ($popularTypeTickets) {
            $typeTicket = TypeTicket::find($popularTypeTickets->type_tickets_id);
            if ($typeTicket) {
                $count = $popularTypeTickets->total;

                $rete =  'Популярный тариф: ' . $typeTicket->name;
                $description =  'Описание тарифа: ' . $typeTicket->description;
                $count =  'Количество покупок: ' . $count;

                return [
                    $rete,
                    $description,
                    $count,
                ];
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function income(IncomeRequest $request){
        $startTime = Carbon::parse($request->input('created_at'));
        $endTime = Carbon::parse($request->input('updated_at'));

        $orders = Order::whereBetween('created_at', [$startTime, $endTime])
            ->whereBetween('updated_at', [$startTime, $endTime])
            ->get();

        $totalSum = $orders->sum('total');

        return response()->json($totalSum)->setStatusCode(200);
    }
}

