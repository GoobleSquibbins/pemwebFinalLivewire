<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh">
  <div class="card shadow p-4" style="width: 100%; max-width: 400px">
    <h3 class="text-center mb-4">Login</h3>
    <form method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}

      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required />
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required />
      </div>

      @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      @endif

      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
    <a href="{{ route('register') }}">Register</a>
  </div>
</body>
</html>
