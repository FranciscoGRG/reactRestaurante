@extends('layouts.app')
@section('content')
<div class="container mt-5"> 

    <h1 class="mb-4">Estas son tus reservas</h1>

    @foreach ($events as $event)
        <div class="card mb-4">
            <div class="card-body">

                <p class="card-text"><strong>Hora comienzo:</strong> {{ $event['start'] }}</p>
                <p class="card-text"><strong>Hora finalización:</strong> {{ $event['end'] }}</p>
                <p class="card-text"><strong>Nombre del asistente:</strong> {{ $event['name'] }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $event['email'] }}</p>
                <p class="card-text"><strong>Mensaje:</strong> {{ $event['message'] }}</p>
                <p class="card-text"><strong>Menu:</strong> {{ $event['menu'] }}</p>
                <p class="card-text"><strong>Telefono:</strong> {{ $event['telefono'] }}</p>
                <p class="card-text"><strong>Alergias:</strong> {{ $event['alergias'] }}</p>
                <p class="card-text"><strong>Comensales:</strong> {{ $event['comensales'] }}</p>
                <p class="card-text"><strong>Numero de mesa:</strong> {{ $event['table_id'] }}</p>
            </div>
        </div>
    @endforeach

</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush
