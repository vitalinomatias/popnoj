<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamentos</title>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th width = "100px">ID</th>
                        <th>Nombre</th>
                        <th>Pais</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departamentos as $key => $departamento)
                    <tr>
                        <td width = "100px">{{ $departamento->id }}</td>
                        <td>{{ $departamento->departamento }}</td>
                        <td> {{$departamento->paisnombre['name']}} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>