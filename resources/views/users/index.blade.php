<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <!-- lo primero que se hace es importar a bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        
    </head>
    <body>
       <div class="container">
            <div class="row">
                <div class="col-sm-8 mx-auto">
                    <div class="card border-0 shadow"><!-- creamos una tarjeta --> 
                        <div class="card-body">
                            @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                - {{$error}} <br>
                                @endforeach

                            </div>
                            @endif
                        <form action=" {{route('users.store')}}" method="POST">
                                <div class="form-row">
                                    <div class="col-sm-3">
                                        <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{old('name')}}">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                    </div>
                                    <div class="col-auto">
                                        @csrf
                                        <button type="submit" class="btn btn-primary"> enviar</button>
                                    </div>
                                </div>
                        </form>
                       </div>
                    </div>
                <table class="table">
                    <thead>  <!-- encabezado de tabla -->
                        <tr> <!-- fila de tabla -->
                            <!-- columnas de tabla -->
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>&nbsp;</th> <!-- &nbsp para colocar espacio en blanco-->
                        </tr>
                    </thead>
                    <tbody> <!-- contenido de la tabla -->
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id}}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>
                                <form action="{{route('users.destroy',$user)}}" method="POST"> <!-- usamos la ruta que creamos y pasamos el parametro -->
                                    @method('DELETE') <!-- helper llamado metodo, laravel espera que queremos eliminar-->
                                    @csrf <!-- es un metodo, genera untoquen en el formulario. que va decir que no es un formualrio externo -->
                                    <!-- configuramos nuestro boton, utilizamos un input del tipo enviar -->
                                    <input
                                    type="submit"
                                    value="Eliminar"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Desea eliminar... ?')" >
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
       </div>
    </body>
</html>
