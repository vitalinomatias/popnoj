<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="card">        
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($instituciones as $key => $institucion)
                    <tr>
                        <td width = "100px">{{ $key }}</td>
                        <td>{{ $institucion->nombre_institucion }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>