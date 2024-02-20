<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Mail\ConfirmacionMailable;
use App\Models\CreditCard;
use App\Models\Event;
use App\Models\ReservaSinLogin;
use App\Models\Table;
use DateInterval;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    public function getEvents()
    {
        //Obtengo todos los eventos y los mando a la vista home para mostrarlos
        $user = auth()->id();
       

        $all_events = Event::where('user_id', $user)->get();
        $events = [];


        foreach ($all_events as $event) {
            $events[] = [
                'title' => $event->event,
                'start' => $event->start_date,
                'end' => $event->end_date,
                'name' => $event->name,
                'email' => $event->email,
                'message' => $event->message,
            ];
        }

        return response()->json($events);
    }

    public function createCards(Request $request)
    {
        $user = auth()->id();


        //Creo la tarjeta
        $tarjeta = [
            'owner' => $request['owner'],
            'number' => $request['number'],
            'expired' => $request['expired'],
            'cvv' => $request['cvv'],
            'user_id' => $user,
        ];

        CreditCard::create($tarjeta);

        return response()->json("Tarjeta creada");
    }

    public function getCreditCard()
    {
        $tarjetas = CreditCard::where('user_id', auth()->id())->get();

        return response()->json($tarjetas);
    }

    public function createReserve(Request $request)
    {

        
        $user = Auth::user();
        
        $fechaHoraString = $request['event'];
        
        // Crear un objeto DateTime a partir de la cadena
        $fechaHora = new DateTime($fechaHoraString);
        
        // Sumar 30 minutos
        $fechaHora->add(new DateInterval('PT30M'));
        
        // Obtener la nueva fecha y hora
        $nuevaFechaHora = $fechaHora->format('Y-m-d H:i:s');
        

        $card = CreditCard::where('number', $request['tarjeta'])->first();
       
        // $mesa = Table::
        $mesa = Table::where('disponible', true)->first();

        $fecha = $request['start_date'];
        
        
        //Creo el evento
        $evento = [
            'event' => $request['event'],
            'start_date' => $request['start_date'],
            'end_date' => $nuevaFechaHora,
            'name' => $request['event'],
            'email' => $user->email,
            'message' => $user->name,
            'menu' => $request['menu'],
            'telefono' =>  $user->phone,
            'alergias' =>  $user->allergy,
            'card-number' => $card->number,
            'card-owner' => $card->owner,
            'expiration' => $card->expired,
            'comensales' => $request['comensales'],
            'user_id' => auth()->id(),
            'table_id' => $mesa->id,
        ];
        
        // 'card-number', 'card-owner', 'expiration',
        //Lo guardo en la base de datos
        Event::create($evento);

        //Pongo no dispobible la mesa que he reservado
        Table::where('id', $mesa->id)->update(['disponible' => false]);

        Mail::to($user->email)->send(new ConfirmacionMailable($user->name, $user->email, $fecha, "Reserva realizada"));

        return response()->json( $evento);
    }

    public function deleteReserve(Request $request)
    {
        $event = Event::where('email', $request['email'])->get();

       

        Event::destroy($event);
        return response()->json("Evento eliminado");
    }

    public function deleteCreditCard(Request $request)
    {
        $tarjeta = CreditCard::where('id', $request['id'])->get();

        CreditCard::destroy($tarjeta);

        return response()->json($request['id']);
    }

    public function noLoginReserve(Request $request)
    {
        Mail::to($request['email'])->send(new ConfirmacionMailable($request['nombre'], $request['email'], $request['fecha'], "Reserva realizada"));

        $noLogin = [
            'nombre' => $request['nombre'],
            'email' => $request['email'],
            'card-owner' => $request['card-owner'],
            'card-number' => $request['card-number'],
            'card-expired' => $request['card-expired']
        ];

        ReservaSinLogin::create($noLogin);
      

        return response()->json($request['id']);
    }

}
