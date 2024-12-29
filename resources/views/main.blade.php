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
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="{{ asset('slide.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('PrayTimes.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript">
    function waktuSholat() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    h = checkTime(h);
    m = checkTime(m);
    s = checkTime(s);

    var date = today.getDate();
    var month = today.getMonth();
    var montharr =["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
    month=montharr[month];
    var year = today.getFullYear();

    var day = today.getDay();
    var dayarr =["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
    day=dayarr[day];

    document.getElementById('jam').innerHTML = h + ":" + m + ":" + s;
    document.getElementById('hari').innerHTML = day+",";
    document.getElementById('tgl').innerHTML = date+" "+month+" "+year;


    // MANUAL SETTINGS --------------------------------------------------------
    prayTimes.setMethod('MWL'); // perhitungan
    var Ptimes = prayTimes.getTimes(today, [-6.2, 106.8], 7); // jakarta (longitude, Latitude, Time Zone)
    // ------------------------------------------------------------------------

    document.getElementById('subuh').innerHTML =   Ptimes.fajr;
    document.getElementById('terbit').innerHTML =  Ptimes.sunrise;
    document.getElementById('zuhur').innerHTML =   Ptimes.dhuhr;
    document.getElementById('ashar').innerHTML =   Ptimes.asr;
    document.getElementById('maghrib').innerHTML = Ptimes.maghrib;
    document.getElementById('isya').innerHTML =    Ptimes.isha;

    // Azan

    var waktu = h + ":" + m;

    if (waktu == Ptimes.fajr) {
        showModalWithTimeout("Subuh", Ptimes.fajr);
    }

    if (waktu == Ptimes.dhuhr) {
        showModalWithTimeout("Dhuhr", Ptimes.dhuhr);
    }

    if (waktu == Ptimes.asr) {
        showModalWithTimeout("Asr", Ptimes.asr);
    }

    if (waktu == Ptimes.maghrib) {
        showModalWithTimeout("Maghrib", Ptimes.maghrib);
    }

    if (waktu == Ptimes.isha) {
        showModalWithTimeout("Isha", Ptimes.isha);
    }

    function showModalWithTimeout(prayerName, prayerTime) {
        // Menampilkan modal dengan keterangan jam dan waktu sholat
        $('#ModalAzan').modal('show');
        $('#modalTime').text(waktu); // Memperbarui waktu modal
        $('#ModalAzan .modal-body p').html(`Saat ini pukul ${waktu}, <br> Memasuki Waktu sholat ${prayerName}.`);
        
        // Menyembunyikan modal setelah 60 detik (1 menit)
        setTimeout(function() {
            $('#ModalAzan').modal('hide');
        }, 60000);
    }



    // colors

    var akhirwaktu = "23:59";

    if (waktu  >= Ptimes.fajr && waktu < Ptimes.sunrise) {
        document.getElementById('csubuh').style.backgroundColor = "red";
    } else {
        document.getElementById('csubuh').style.backgroundColor = "#1cbb8c";
    }

    if (waktu  >= Ptimes.sunrise && waktu < Ptimes.dhuhr) {
        document.getElementById('cterbit').style.backgroundColor = "red";
    } else {
        document.getElementById('cterbit').style.backgroundColor = "#1cbb8c";
    }

    if (waktu  >= Ptimes.dhuhr && waktu < Ptimes.asr) {
        document.getElementById('czuhur').style.backgroundColor = "red";
    } else {
        document.getElementById('czuhur').style.backgroundColor = "#1cbb8c";
    }

    if (waktu  >= Ptimes.asr && waktu < Ptimes.maghrib) {
        document.getElementById('cashar').style.backgroundColor = "red";
    } else {
        document.getElementById('cashar').style.backgroundColor = "#1cbb8c";
    }

    if (waktu  >= Ptimes.maghrib && waktu < Ptimes.isha) {
        document.getElementById('cmaghrib').style.backgroundColor = "red";
    } else {
        document.getElementById('cmaghrib').style.backgroundColor = "#1cbb8c";
    }
    if (waktu  >= Ptimes.isha && waktu < akhirwaktu) {
        document.getElementById('cisya').style.backgroundColor = "red";
    } else {
        document.getElementById('cisya').style.backgroundColor = "#1cbb8c";
    }

    var t = setTimeout(waktuSholat, 1000);
    }
    function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
    }   
    </script>


<style type="text/css">
@keyframes blink {
    0% { opacity: 1; }
    50% { opacity: 0; }
    100% { opacity: 1; }
}

.blink {
    animation: blink 2s infinite;
}

.mySlides {
    display:none;
}
#header {
    background:#3e06b9;
    color:#f9f9f9;
    padding: 10px;
    border-radius:10px;
    background:-webkit-linear-gradient(top, #3e06b9, #4b1759);
    background: -moz-linear-gradient(top, #3e06b9, #4b1759);
    background: -ms-linear-gradient(top, #3e06b9, #4b1759);
    background: -o-linear-gradient(top, #3e06b9, #4b1759);
}

#header img{
    width:10%;
}

#jam {
    font-family: digital7;
    text-align: center;
    font-weight: bold;
    color: #ffd700;
    padding:10px;
    border-radius:20px;
    background:-webkit-linear-gradient(right, #ff12fb, transparent);
    background: -moz-linear-gradient(right, #ff12fb, transparent);
    background: -ms-linear-gradient(right, #ff12fb, transparent);
    background: -o-linear-gradient(right, #ff12fb, transparent);
}

/*.jam {
    font-size: 150px;
    font-family: digital7;
    text-shadow: 0 0 20px #fff;
    letter-spacing: 5px;
    color: #fff;
    user-select: none;
    opacity:1;
}*/

#runtext {
    color: #ffd700;
    padding:10px;
    background:-webkit-linear-gradient(right, #ff12fb, transparent);
    background: -moz-linear-gradient(right, #ff12fb, transparent);
    background: -ms-linear-gradient(right, #ff12fb, transparent);
    background: -o-linear-gradient(right, #ff12fb, transparent);
}
.tengah{
    margin-bottom: -15px;
}

.hari {
    text-shadow: 0 0 8px #fff;
    color: #fff;
    user-select: none;
}

.tgl {
    text-shadow: 0 0 8px #fff;
    color: #fff;
    user-select: none;
}

@font-face {
    font-family: digital7;
    src: url('{{ asset('digital-7.woff') }}') format('woff');
}

.jam2 {
    font-size: 55px;
    font-family: digital7;
}


/* CSS untuk efek zoom */
@keyframes zoomAnimation {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.2);
    }
    100% {
        transform: scale(1);
    }
}

.col-lg {
    height: ;
    transition: transform 0.3s ease-in-out; 
}

.col-lg:hover {
    transform: perspective(500px) rotateY(10deg);
    animation: zoomAnimation 1s infinite; 
    transform-origin: center; 
}

</style>
</head>

<body onload="waktuSholat()">
<div class="wrapper">

<div class="main" style="background-color: #2e4851;">
<main class="content">
    <div class="container-fluid mb-2" id="header">
        <div class="row">
            @foreach($settings as $rows)
            <div class="col-md-9">
                <a href="{{ url('/')}}"><h1 style="font-size:60px; color: white; text-decoration: none;"><img src="{{ asset('img/Bekasi.png')}}" align="left" />YPI<span style="color:gold;"> {{ $rows->judul }}</span></h1></a>
                &nbsp; &nbsp; <span style="font-family:fixedsys;">{{ $rows->alamat }}</span><br>
                &nbsp; &nbsp; <span style="color:gold;font-weight:bold;">{{ $rows->slogan }}</span>
            </div>
            @endforeach
            <div class="col-md-3 text-center">
                <h1 class="jam" id="jam" style="font-size: 60px; color: gold;"></h1>
                <b class="hari" id="hari" style="font-size:30px; font-weight: bold; color: white;"></b><b class="tgl" id="tgl" style="font-size:30px; font-weight: bold; color: white;"></b>
                
            </div>
        </div>
    </div>

    <div class="row tengah">
        <div class="col-md-3 text-center">
            <div class="card bg-warning py-2" style="height: 550px; border: 3px solid #ccc;">
                <h1 style="color: navy; font-weight: bold;">Jadwal Hari Senin</h1>
                <table class="table table-striped mb-4" style="color: black; font-weight: bold;">
                    <thead>
                        <tr style="font-size: 25px;">
                            <th>Jam Ke</th>
                            <th>Jam</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>07:00</td>
                            <td>Upacara Bendera</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>07:45</td>
                            <td>Pelajaran Pertama</td>
                        </tr>
                        <tr class="blink">
                            <td>3</td>
                            <td>09:45</td>
                            <td style="color: red;">Istirahat Pertama</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>10:00</td>
                            <td>Pelajaran Kedua</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>10:45</td>
                            <td>Pelajaran Ketiga</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>11:30</td>
                            <td>Pelajaran Keempat</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>12:15</td>
                            <td style="color: red;">Istirahat Kedua</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>13:00</td>
                            <td>Pelajaran Kelima</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>14:00</td>
                            <td>Jam Pulang</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="col-md-6">
            <div class="card" style="height: 550px; border: 3px solid #ccc;">
            @foreach($videos as $vid)
            <iframe width="100%" height="595px" 
            src="https://www.youtube.com/embed/{{ $vid->code_youtube }}?autoplay={{ $vid->autoplay }}&mute={{ $vid->mute }}">
            </iframe> 
            @endforeach
        </div>
    </div>
    <div class="col-md-3 text-center">
        <div class="card bg-info py-2" style="height: 550px; border: 3px solid #ccc;">
            <img class="mySlides w3-animate-fading" src="{{ asset('img/slide/44.png')}}" style="width:100%; height: 550px; margin-top: 50px;">
            <img class="mySlides w3-animate-fading" src="{{ asset('img/slide/55.png')}}" style="width:100%; height: 550px;">
            <img class="mySlides w3-animate-fading" src="{{ asset('img/slide/66.png')}}" style="width:100%; height: 550px; margin-top: 10px;">
        </div>
    </div>
</div>

<div class="container-fluid text-center mb-2">
    <div class="row">          
        <div id="csubuh" class="col-lg border m-1"> 
            <img src="{{ asset('img/jws/moon.png') }}" width="64" height="40"> 
            <h1>SUBUH</h1>
            <h1><div class="jam2" id="subuh"></div></h1>
        </div>
        <div id="cterbit" class="col-lg border m-1"> 
            <img src="{{ asset('img/jws/sunrise.png') }}" width="64" height="40"> 
            <h1>TERBIT</h1>
            <h1><div class="jam2" id="terbit"></div></h1>
        </div>
        <div id="czuhur" class="col-lg border m-1"> 
            <img src="{{ asset('img/jws/sun.png') }}" width="64" height="40"> 
            <h1>ZUHUR</h1>        
            <h1><div class="jam2" id="zuhur"></div></h1>
        </div>
        <div id="cashar" class="col-lg border m-1"> 
            <img src="{{ asset('img/jws/sun.png') }}" width="64" height="40">
            <h1>ASHAR</h1>
            <h1><div class="jam2" id="ashar"></div></h1>
        </div>
        <div id="cmaghrib" class="col-lg border m-1"> 
            <img src="{{ asset('img/jws/sunrise.png') }}" width="64" height="40"> 
            <h1>MAGHRIB</h1>
            <h1><div class="jam2" id="maghrib"></div></h1>
        </div>
        <div id="cisya" class="col-lg border m-1"> 
            <img src="{{ asset('img/jws/moon.png') }}" width="64" height="40"> 
            <h1>ISYA</h1>        
            <h1><div class="jam2" id="isya"></div></h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 text-center">
        <div class="card-body">
            <center><marquee style="font-size:30px;color: white; font-weight:bold;" id="runtext">
                Loading...
            </marquee></center>
        </div>
    </div>
</div>

<script>
    // Mengatur token CSRF jika metode POST
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    function fetchRunText() {
        $.ajax({
            url: "{{ route('main.runtext') }}",
            type: "GET", // Pastikan menggunakan GET jika hanya mengambil data
            success: function(response) {
                if (response.runtext) {
                    document.getElementById("runtext").innerHTML = response.runtext;
                } else {
                    document.getElementById("runtext").innerHTML = 'No text available';
                }
            },
            error: function(xhr, status, error) {
                console.error("Error loading data: " + error);
                document.getElementById("runtext").innerHTML = 'Error loading data.';
                console.log(xhr.responseText); // Melihat detail error
            }
        });
    }

    $(document).ready(function() {
        fetchRunText(); // Panggil saat pertama kali halaman dimuat
        setInterval(fetchRunText, 10000); // Ubah sesuai kebutuhan
    });
</script>


<!-- Modal Azan-->
<div class="modal fade" id="ModalAzan" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
       <div class="modal-content" style="border-radius:20px;">
            <div class="modal-header" style="background-color: #1cbb8c;">
                <h5 class="modal-title" style="font-size: 30px; color: red; font-weight: bold; text-align: center;">Memasuki Waktu Sholat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height:200px;">
                <p class="blink" style="font-size: 50px; font-weight: bold; color: navy; text-align: center;"></p>
            </div>
        </div>
    </div> 
</div>

<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#centeredModalSuccess">
    Success
</button>
<!-- BEGIN success modal -->
<div class="modal fade" id="centeredModalSuccess" tabindex="-100" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius:20px;">
            <div class="modal-header" style="background-color: #ff12fb;">
                <h5 class="modal-title" style="font-size: 30px; color: gold; font-weight: bold;">Bel Saat Ini</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height:400px; width: 100%;">
                <h1 style="font-size: 20px; font-weight: bold; color: navy; text-align: center;">Hari: Tgl: Tahun:</h1>
                <p style="font-size: 100px; text-align: center;"><img src="{{ asset('img/clock.png')}}" height="80px" style="margin-bottom: 2px;"><b> 07:00</b></p>
                <p style="font-size: 20px; font-weight: bold; color: navy; text-align: center;">Saatnya Masuk Jam Pelajaran Pertama</p>
            </div>
        </div>
    </div>
</div>
<!-- END success modal -->
</main>
</div>
</div>

<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 9000);    
    }
</script>
<script src="{{ asset('templates/backend/js/app.js') }}"></script>
</body>
</html>