<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmacionMailable;
use App\Models\CreditCard;
use App\Models\Event;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() //Muestro los eventos en el calendario
    {
        return view('index');
    }

    public function mostrarCalendario()
    {
        //Obtengo todos los eventos y los mando a la vista home para mostrarlos
        $all_events = Event::all();
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

        return view('home', compact('events'));
        // return response()->json($events);
    }

    public function recibirFecha($objeto) //Recibo la fecha del calendario y la envio al formulario de reserva
    {
        $tarjetas = CreditCard::where('user_id', auth()->id())->get();

        $objeto = json_decode($objeto);
        return view('formulario', compact('objeto', 'tarjetas'));
    }

    public function enviarCorreo(Request $request) //Creo una nueva clase de ConfirmacionMaileable para enviar el correo con los datos del formulario pero da error
    {
        $fecha = $request['fecha'];
        $mensaje = $request['mensaje'];
        $endFecha = date('Y-m-d H:i', strtotime($fecha . ' +1 hour')); //Obtengo la hora final sumandole una hora a la hora de comienzo
        $menu = $request['menu'];
        $comensales = $request['comensales'];

        $user = Auth::user();
        $telefono = $user->phone;
        $alergias = $user->allergy;
        $nombre = $user->name;
        $email = $user->email;

        // $mesa = Table::
        $mesa = Table::where('disponible', true)->first();

        //Creo el evento
        $evento = [
            'event' => $nombre,
            'start_date' => $fecha,
            'end_date' => $endFecha,
            'name' => $nombre,
            'email' => $email,
            'message' => $mensaje,
            'menu' => $menu,
            'telefono' => $telefono,
            'alergias' => $alergias,
            'comensales' => $comensales,
            'user_id' => auth()->id(),
            'table_id' => $mesa->id,
        ];

        //Lo guardo en la base de datos
        Event::create($evento);

        //Pongo no dispobible la mesa que he reservado
        Table::where('id', $mesa->id)->update(['disponible' => false]);

        //Hacer el insert antes de enviar el correo
        Mail::to($email)->send(new ConfirmacionMailable($nombre, $email, $fecha, $mensaje)); //Con la clase maileable envio el email
        return redirect('/calendario');
    }

    public function mostrarFormularioTarjeta()
    {
        return view('tarjeta');
    }

    public function crearTarjeta(Request $request)
    {
        //Guardo el mes y año en una variable y le pongo el dia 01 para poder guardarla en la bbdd
        $fecha = $request['year'] . "-" . $request['month'] . '-01';

        //Convierto a date la fecha
        $otraFecha = date('Y-m-d', strtotime($fecha));

        //Creo la tarjeta
        $tarjeta = [
            'owner' => $request['owner'],
            'number' => $request['number'],
            'expired' => $otraFecha,
            'cvv' => $request['cvv'],
            'user_id' => auth()->id(),
        ];

        CreditCard::create($tarjeta);

        return redirect('calendario');
    }

    public function mostrarReservas()
    {
        //Obtengo las reservas del usuario filtrando por el user_id de reservas
        $all_events = Event::where('user_id', auth()->id())->get();
        $events = [];


        foreach ($all_events as $event) {
            $events[] = [
                'event' => $event->event,
                'start' => $event->start_date,
                'end' => $event->end_date,
                'name' => $event->name,
                'email' => $event->email,
                'message' => $event->message,
                'menu' => $event->menu,
                'telefono' => $event->telefono,
                'alergias' => $event->alergias,
                'comensales' => $event->comensales,
                'table_id' => $event->table_id,
            ];
        }



        return view('misReservas', compact('events'));
    }
}
