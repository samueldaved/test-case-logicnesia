<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User and File Management</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark w-100" style="background-color:rgb(74, 58, 211)">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Management Application</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page" href="/">Home</a>
                  </li>
                  @cannot('is-vendor')
                    <li class="nav-item">
                      <a class="nav-link {{ (request()->is('/users/*')) ? 'active' : '' }}" href="/users">User Management</a>
                    </li>
                  @endcannot
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('/files/*')) ? 'active' : '' }}" href="/files">Vendor</a>
                  </li>
                </ul>   
              </div>

              <div class="d-flex">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome {{ Auth::user()->username }}
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="/users/{{ Auth::id() }}">Profile</a></li>
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                  </ul>
                </li>
              </div>

            </div>
        </nav>

        <main>{{$slot}}</main>
</body>
</html>