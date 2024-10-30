<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Nesas')</title>
  
  @include('admin.templet.css')
</head>
<body>
  @include('admin.templet.header')
  @include('admin.templet.sidebar')




  <main id="main" class="main">



    
    <section class="section dashboard">
      <div class="row">
        @yield('content')
      </div>
    </section>
  </main>

 

  @include('admin.templet.js')
</body>
</html>
