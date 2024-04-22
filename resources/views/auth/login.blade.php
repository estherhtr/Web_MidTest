<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="d-flex gap-3 flex-column mx-auto" style="max-width:600px;">
        <h1>Login</h1>
        @if (session('alert') && session('alertType') == 'danger') 
    <div class="alert alert-danger">
        {{ Session::get('alert') }}
    </div>
@endif
        <form action="/login" method="post">
            @csrf
        <div class="form-floating mb-3">
  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name='email'>
  <label for="floatingInput" >Email address</label>
</div>
<div class="form-floating">
  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
  <label for="floatingPassword">Password</label>
</div>
<div class="mt-3">

  <button type="submit" class="btn btn-primary">Login</button>
</div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>