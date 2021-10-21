<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>instituciones</title>
  
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
  background: #FAFAFA;
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
  text-align: center;
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
        <img src="logo.png">
      </div>
      <h1>{{$institucione->nombre_institucion}} </h1>
      </header>

      <main>
      <table>

      <thead>
                    <tr>
                        <th>Dirección Central</th>
                        <th>Dirección Local</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Tipo de Institución</th>
                    </tr>
                </thead>     
        
        </thead>


        <tbody>
                    
                    <tr>
                     
                        <td>{{ $institucione->direciion_central }}</td>
                        <td>{{ $institucione->direciion_local }}</td>
                        <td>{{ $institucione->telefono }}</td>
                        <td>{{ $institucione->correo }}</td>
                        <td>{{ $tipo->tipo }}</td>
                       
                        
                    </tr>
                  
                </tbody>
                </table>
     
     </main>

     <main>
      <table>

      <thead>
                    <tr>
                        <th>Director</th>
                        <th>Contacto</th>
                        <th>Cargo</th>
                    </tr>
                </thead>     
                <tbody> 
                    <tr>
                        <td>{{ $institucione->director }}</td>
                        <td>{{ $institucione->contacto }}</td>
                        <td>{{ $institucione->cargo }}</td>
                    </tr>  
                </tbody>
                </table>
     </table>
     </main>

     <table>

<thead>
              <tr>
                  <th>Poblacion</th>
              </tr>
          </thead>     
  
  </thead>


  <tbody>
              <tr>
              
                                <td>@foreach ($institucione->poblaciones as $key => $poblacion)
                                {{$poblacion['poblacion']}},   
                                @endforeach  </td>
              </tr>
          </tbody>
          </table>

          <table>

<thead>
              <tr>
                  <th>Ejes de trabajo</th>
              </tr>
          </thead>     
  
  </thead>


  <tbody>
              <tr>
              
                                <td> @foreach ($institucione->ejes as $key => $eje)
                                {{$eje['eje']}},   
                                @endforeach  </td>
              </tr>
          </tbody>
          </table>

            
                   
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Pais</th>
                                    <th>Departamento</th>
                                    <th>Municipio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paises_guardados as $pais)
                                    <tr>
                                        <td> {{$pais->name}} </td>
                                        <td>
                                            <table>
                                                <tbody>
                                                    @foreach ($departamentos_guardados as $departamento)
                                                        @if ($departamento->id_pais == $pais->id)
                                                            <tr>
                                                                <td> {{$departamento->departamento}} </td>
                                                                <td>
                                                                    <table>
                                                                        <tbody>
                                                                            @foreach ($municipios_guardados as $municipio)
                                                                                @if ($municipio->id_departamento == $departamento->id)
                                                                                    <tr>
                                                                                        <td>&nbsp;</td>
                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>                                                                
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <table>
                                                <tbody>
                                                    @foreach ($departamentos_guardados as $departamento)
                                                        @if ($departamento->id_pais == $pais->id)
                                                            <tr>
                                                                <td>
                                                                    <table>
                                                                        <tbody>
                                                                            @foreach ($municipios_guardados as $municipio)
                                                                                @if ($municipio->id_departamento == $departamento->id)
                                                                                    <tr>
                                                                                        <td> {{$municipio->municipio}} </td>
                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>                                                                
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        

 
   