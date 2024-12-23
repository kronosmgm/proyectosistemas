<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Productos</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color:rgb(39, 75, 46);
            color: white;
        }
        .photo {
            width: 50px;
            height: auto;
        }
    </style>
</head>
<body>
    <center><h1>Reporte de Productos</h1></center>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Marca</th>
                <th>Clasificación</th>
                <th>Procedencia</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->marca->nombre }}</td>
                    <td>{{ $producto->clasificacion->descripcion }}</td>
                    <td>{{ $producto->procedencia->nombre }}</td>
                    <td>
						<img src="{{ asset('storage').'/'.$producto->foto }}" alt="foo" width="50" class="photo">
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
