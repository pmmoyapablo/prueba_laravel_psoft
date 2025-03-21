<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Empresas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Reporte de Empresas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>RIF</th>
                <th>Razón Social</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Fecha de Creación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empresas as $empresa)
                <tr>
                    <td>{{ $empresa->id_empresa }}</td>
                    <td>{{ $empresa->rif }}</td>
                    <td>{{ $empresa->razon_social }}</td>
                    <td>{{ $empresa->direccion }}</td>
                    <td>{{ $empresa->telefono }}</td>
                    <td>{{ $empresa->fecha_creacion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
