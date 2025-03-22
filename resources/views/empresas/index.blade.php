<!DOCTYPE html>
<html>
<head>
    <title>Listado de Empresas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Listado de Empresas</h1>

        <form action="{{ route('empresas.index') }}" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="id" placeholder="Buscar por ID">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="razon_social" placeholder="Buscar por Razón Social">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Limpiar</a>
                </div>
            </div>
        </form>
        <br>

        <a href="{{ route('empresas.create') }}" class="btn btn-success">Crear Nueva Empresa</a>
        <a href="{{ route('empresas.pdf') }}" class="btn btn-danger">Generar PDF</a>
        <a href="{{ route('empresas.json') }}" class="btn btn-info">Exportar JSON</a>
        <br><br>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>RIF</th>
                <th>Razón Social</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Fecha de Creación</th>
                <th>Acciones</th>
            </tr>
            @foreach ($empresas as $empresa)
                <tr>
                    <td>{{ $empresa->id }}</td>
                    <td>{{ $empresa->rif }}</td>
                    <td>{{ $empresa->razon_social }}</td>
                    <td>{{ $empresa->direccion }}</td>
                    <td>{{ $empresa->telefono }}</td>
                    <td>{{ $empresa->fecha_creacion }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('empresas.show',$empresa->id) }}">Ver</a>
                        <a class="btn btn-primary" href="{{ route('empresas.edit',$empresa->id) }}">Editar</a>
                        <form action="{{ route('empresas.destroy',$empresa->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
