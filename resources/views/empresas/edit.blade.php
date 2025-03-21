<!DOCTYPE html>
<html>
<head>
    <title>Editar Empresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Editar Empresa</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>¡Ups!</strong> Parece que hay errores en el formulario.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('empresas.update', $empresa->id_empresa) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="rif" class="form-label">RIF:</label>
                <input type="text" class="form-control" id="rif" name="rif" value="{{ old('rif', $empresa->rif) }}">
            </div>
            <div class="mb-3">
                <label for="razon_social" class="form-label">Razón Social:</label>
                <input type="text" class="form-control" id="razon_social" name="razon_social" value="{{ old('razon_social', $empresa->razon_social) }}">
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $empresa->direccion) }}">
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $empresa->telefono) }}">
            </div>
            <div class="mb-3">
                <label for="fecha_creacion" class="form-label">Fecha de Creación:</label>
                <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" value="{{ old('fecha_creacion', date('Y-m-d', strtotime($empresa->fecha_creacion))) }}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
