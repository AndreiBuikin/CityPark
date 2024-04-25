<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\TicketCreateRequest;
use App\Http\Requests\TypeTicketCreateRequest;
use App\Http\Requests\TypeTicketUpdateRequest;
use App\Models\Ticket;
use App\Models\TypeTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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

        $typeTicketId = $request->input('type_tickets_id');

        $ticket = new Ticket([
            'total' => $prices[$typeTicketId],
            'type_tickets_id' => $typeTicketId,
        ]);

        $datetimeStart = Carbon::now();
        $datetimeEnd = $datetimeStart->copy()->addHours($hoursToAdd[$typeTicketId]);

        $ticket->datetimeStart = $datetimeStart->format('Y-m-d H:i:s');
        $ticket->datetimeEnd = $datetimeEnd->format('Y-m-d H:i:s');

        $ticket->save();
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
}
