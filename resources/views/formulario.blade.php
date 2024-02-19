@extends('layouts.app')

@section('content') 
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route('confirmacion') }}" id="formulario">
                    @csrf

                    {{-- Nombre --}}
                    <div class="form-group">
                        <label for="nombre">Nombre completo</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre completo"
                            name="nombre">
                        <span id="nombreError" name="nombreError" class="nombreError">Error</span>
                    </div>

                    {{-- Mensaje --}}
                    <div class="form-group">
                        <label for="mensaje">Mensaje</label>
                        <input type="text" class="form-control" id="mensaje" placeholder="Mensaje" name="mensaje">
                        <span id="mensajeError" name="mensajeError" class="mensajeError">Error</span>
                    </div>

                    {{-- Fecha --}}
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="text" class="form-control"
                            value="{{ $fecha_convertida = date('y-m-d H:i', strtotime($objeto . '+2 hours')) }}"
                            id="fecha" readonly name="fecha">
                    </div>

                    {{-- Menu --}}
                    <div class="form-group">
                        <label for="mensaje">Menú:</label>
                        {{-- <input type="text" class="form-control" id="mensaje" placeholder="Mensaje" name="mensaje"> --}}
                        <br>
                        <select name="menu" id="menu" class="form-control">
                            <option value="1">Menu 1</option>
                            <option value="2">Menu 2</option>
                            <option value="3">Menu 3</option>
                        </select>
                    </div>

                    {{-- Tarjeta de credito --}}
                    <div class="form-group">
                        <label for="tarjeta">Selecciona una tarjeta</label>
                        <select name="tarjeta" id="tarjeta" class="form-control">
                            @foreach ($tarjetas as $tarjeta)
                                <option value="">{{ $tarjeta->number }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Comensales --}}
                    <div class="form-group">
                        <label for="tarjeta">Numero de comensales (Maximo 4)</label>
                        <select name="comensales" id="comensales" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" id="boton" disabled>Enviar</button>
                    <div class="spinner" id="spinner" name="spinner"></div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @vite(['resources/js/formulario.js'])
@endpush
