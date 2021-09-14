<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Municipios</title>
</head>
<body>
    <div class="card">
        <div class="card-body">        
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Departamento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($municipios as $key => $municipio)
                    <tr>
                        <td width = "100px">{{ $key }}</td>
                        <td>{{ $municipio->municipio }}</td>
                        <td> {{$municipio->departamentoNombre['departamento']}} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>