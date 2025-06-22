{{-- resources/views/components/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<style>
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
</style>
<head>
  <meta charset="UTF-8">
  <title>{{ $title ?? 'Cinema Dashboard' }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  @livewireStyles
</head>
<body class="d-flex">
    
  {{-- Main Area --}}
  <div class="" style="flex-grow: 1;">
    {{ $slot }} {{-- This is where your Livewire view gets inserted --}}
  </div>

  @livewireScripts
</body>
</html>
