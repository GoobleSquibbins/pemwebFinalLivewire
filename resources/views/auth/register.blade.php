<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh">
  <div class="card shadow p-4" style="width: 100%; max-width: 400px">
    <h3 class="text-center mb-4">Register User</h3>

    <form action="{{ route('store.user') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="password_confirm" class="form-label">Confirm Password</label>
        <input type="password" id="password_confirm" name="password_confirm" class="form-control" required>
      </div>

      @if (session('error'))
        <div class="alert alert-danger text-center">
          {{ session('error') }}
        </div>
      @endif

      <button type="submit" class="btn btn-primary w-100">Add User</button>
    </form>

    <div class="mt-3 text-center">
      <a href="{{ route('showLogin') }}">Back to Login</a>
    </div>
  </div>
</body>
</html>
