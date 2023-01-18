<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Management Application</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body class="text-center">

<div class="d-flex align-items-center justify-content-center vh-100">

  <form action="/login" method="post">
    @csrf
    <h1 class="h3 mb-3 mt-3 fw-normal">Please sign in</h1>
    
        
    <div class="form-floating">
      <input type="username" id="username" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="name@example.com">
      <label for="username">Username</label>
      @error('username')
        <div class="text-danger text-start mb-3">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
      <label for="password">Password</label>
      @error('email')
        <div class="text-danger text-start mb-3">{{ $message }}</div>
      @enderror
    </div>

    <button class="w-100 btn btn-lg btn-primary mt-3 mb-3" type="submit">Sign in</button>
    
  </form>

</div>

    
  </body>
</html>