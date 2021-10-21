<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Instituciones</title>
  
    <style>
   .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 15cm;  
  height: 23.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: center;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: left;
  text-align: left;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
</style>
  </head>
  <body>
    <header class="clearfix">


    <div id="company" class="clearfix">
        <div>POPNOJ</div>
        <div>3a Avenida 0-80, Colonia Bran, Zona 3, Ciudad de Guatemala<br /></div>
        <div>Ciudad de Guatemala<br /></div>
        <div>+502 2238 0905
        +502 2251 5716</div>
        <div><a href="mailto:company@example.com">info@asociacionpopnoj.org</a></div>
      </div>
      <div id="logo">  
      <img src="vendor/adminlte/dist/img/logo.png">
      </div>
      <h1>Listado de Instituciones registradas</h1>
    </header>
    <main>
      <table>

      <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Contacto</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Direccion</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                </thead>     
          </tr>
        </thead>
        <tbody>
                    @foreach ($instituciones as $key => $institucion)
                    <tr>
                     
                        <td>{{ $institucion->nombre_institucion }}</td>
                        <td>{{ $institucion->contacto }}</td>
                        <td>{{ $institucion->telefono }}</td>
                        <td>{{ $institucion->correo }}</td>
                        <td>{{ $institucion->direciion_central }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
      </table>
     
    </main>
    
  </body>
</html>
