@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Fechas disponibles') }}</div>
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        //Inicializao el calendario
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',

                events: @json($events), //Eventos creados 
                slotMinTime: '13:00:00',
                slotMaxTime: '23:30:00',
                selectable: true, //Lo hago seleccionable

                //Si existe un evento no deja hacer click en esa hora
                eventClick: function(info) {
                    info.jsEvent.preventDefault();
                },
                select: function(start, end,
                    allDays) { //Al seleccionar guardo la fecha y la envio por URL al formulario

                    let fecha = start.start;
                    console.log(fecha);

                    // Creo la url que va a apuntar a la ruta formulario y le pongo la variable fecha con valor :fecha 
                    var url = "{{ route('formulario', ['fecha' => ':fecha']) }}";

                    //Con url.replace sustituyo el valor :fecha con el valor de la variable fecha del calendario
                    url = url.replace(':fecha', JSON.stringify(fecha));

                    window.location.href = url;
                },


            });

            calendar.render();
        });
    </script>
@endpush
