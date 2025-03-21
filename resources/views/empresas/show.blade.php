<!DOCTYPE html>
<html>
<head>
    <title>Detalle de la Empresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Detalle de la Empresa</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $empresa->razon_social }}</h5>
                <p class="card-text"><strong>RIF:</strong> {{ $empresa->rif }}</p>
                <p class="card-text"><strong>Dirección:</strong> {{ $empresa->direccion }}</p>
                <p class="card-text"><strong>Teléfono:</strong> {{ $empresa->telefono }}</p>
                <p class="card-text"><strong>Fecha de Creación:</strong> {{ $empresa->fecha_creacion }}</p>
            </div>
        </div>

        <a href="{{ route('empresas.index') }}" class="btn btn-primary">Volver</a>
    </div>
</body>
</html>
