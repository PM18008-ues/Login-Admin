<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina Privada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6e61736f09.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            Pagina privada @auth
                de {{Auth::user()->name}}
            @endauth
        </a>
        <div class="col-md-2 ">
            <a href="{{ route('nuevo-usuario') }}">
            <button type="button" class="btn btn-outline-primary me-2">Crear Usuario</button>
            </a>
        </div>
        <div class="col-md-2">
            <a href="{{ route('logout') }}">
            <button type="button" class="btn btn-outline-primary me-2">Salir</button>
            </a>
        </div>
    </header>
    </div>
    <div class="p-5 table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="bg-primary text-white">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Full name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            
                    @foreach ($data as $user)
                        <tr>
                            
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach ($user->roles->pluck('name') as $role)
                                    {{$role}}
                                @endforeach
                            </td>
                            <td class="text-center">
                                <form action="{{ route('borrar-usuario', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    @if ($user->hasRole('User'))
                                        <button type="submit" class="btn btn-danger me-2">
                                            <i class="fa-solid fa-ban"></i>
                                        </button>      
                                @endif
                                </form>
                                
                                
                            </td>
                        </tr>
                    @endforeach 
               
                
            </tbody>
          </table>
    </div>
</body>
</html>