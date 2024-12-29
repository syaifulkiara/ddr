<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <link rel="shortcut icon" href="{{ asset('templates/backend/img/icons/ico.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('templates/backend/css/light.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('style.css') }}" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script type="text/javascript">
    // window.onload = function() {jamatas();}
    // function jamatas(){
    //   var a = document.getElementById('jamatas'),
    //   d = new Date(), h, m, s;
    //   h = d.getHours();
    //   m = set(d.getMinutes());
    //   s = set(d.getSeconds());

    //   a.innerHTML = h + ":" + m + ":" + s;

    //   setTimeout('jamatas()', 1000);
    // }

    // function set(a) {
    //   a = a < 10 ? '0' + a : a;
    //   return a;
    // }
  </script>
  <script>
    function updateDateTime() {
        const dateTimeElement = document.getElementById('date-time');
        const now = new Date();
        const days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jum`at','Sabtu'];
        const day = days[now.getDay()];
        
        const dd = String(now.getDate()).padStart(2, '0');
        const mm = String(now.getMonth() + 1).padStart(2, '0');
        const yy = String(now.getFullYear());
        
        const formattedDate = day + ', ' + dd + '-' + mm + '-' + yy;
        dateTimeElement.textContent = formattedDate;
    }

    setInterval(updateDateTime, 1000);
</script>
    @stack('styles')
</head>

<body onload="waktuSholat()">
<div class="wrapper">

    <div class="main" style="background-color: #2e4851;">
            <main class="content">
                
                    @yield('content')

            </main>
        </div>
    </div>

    <script src="{{ asset('templates/backend/js/app.js') }}"></script>
  @stack('scripts')

</body>

</html>