<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
    <link rel="stylesheet" href="index.css">
    @vite(['resources/css/index.css'])
</head>
<body>
    <div class="Portada">
        <h1 class="esquina">restaurante Restaurante</h1>
        <div class="fondoClaro">
          <h1>restaurante Restaurante</h1>
          <h1>La mejor comida casera de toda Andalucía</h1>
          <button class="center"><a href="{{ route('calendario') }}">Realizar reserva</a></button>
        </div>
      </div>
</body>
</html>