<!DOCTYPE html>
<head>
    <link rel="shortcut icon" type="x-icon" href="{{ asset('img/bell.png')}} ?>" />
    <title>Aplikasi - Bell Sekolah Otomatis</title>
    <script type="text/javascript">
        function menunggumu() {
            jam();
            PlayTimer();
        }
        
        function PlayNow() {
            var param = document.getElementById("txt_audio_manual").value;
            var url = "play.php"
            url = url + "?s=" + param;
            window.open(url, "playNOW", "toolbar=no,scrollbars=no,resizable=no,top=200,left=200,width=200,height=200,menubar=no,titlebar=no,location=no");
        }
        function jam() {
            setTimeout("jam()", 1000);
            var Tgl = new Date().toDateString();
            var tglPisah = Tgl.split(' ');
            var hari = replaceDay(tglPisah[0]);
            var tgl = tglPisah[2];
            var bln = tglPisah[1];
            var thn = tglPisah[3];
            Tgl = hari + ", " + tgl + "-" + bln + "-" + thn;
            var Jam = new Date().toTimeString().replace(/.*(\d{2}:\d{2}:\d{2}).*/, "$1");
            document.getElementById("jam").innerHTML = "<span style='width:100%;'><span>Jam : </span><span style='font-size:34px;'>" + Jam + "</span></span>";
            document.getElementById("tgl").innerHTML = "<span style='font-size:12px;float:right;color:#f0f0f0;'>Hari ini : <span style='font-weight:bold;color:#fff;'>" + Tgl + "</span></span>";
        }
        function replaceDay(hariEng) {
            switch (hariEng) {
                case"Mon":
                    return"Senin";
                    break;
                case"Tue":
                    return"Selasa";
                    break;
                case"Wed":
                    return"Rabu";
                    break;
                case"Thu":
                    return"Kamis";
                    break;
                case"Fri":
                    return"Jum'at";
                    break;
                case"Sat":
                    return"Sabtu";
                    break;
                case"Sun":
                    return"Minggu";
                    break;
                default:
                    return hariEng;
                break;
            }
        }
    </script>
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}" />
</head>
<body onload="menunggumu()">
    <div id="global">
        <div id="wrapper">
            <div id="navigasi">
                <div>
                    <a href="">
                        <img src="{{ asset('img/bg-icon.png')}}" style="background-image: url('img/glyphicons-halflings-white.png');background-position: 0px -24px;background-repeat: no-repeat;margin-right:3px;"/>
                    Beranda
                    </a>
                    <a href="">
                        <img src="{{ asset('img/bg-icon.png')}}" style="background-image: url('img/glyphicons-halflings-white.png');background-position: -360px -144px;background-repeat: no-repeat;margin-right:3px;"/>
                    Pengaturan
                    </a>
                    <a href="">
                        <img src="{{ asset('img/bg-icon.png')}}" style="background-image: url('img/glyphicons-halflings-white.png');background-position: -336px -24px;background-repeat: no-repeat;margin-right:3px;"/>
                    Unggah MP3
                    </a>
                    <a href="" target="_blank" title="Bantuan">
                        <img src="{{ asset('img/bg-icon.png')}}" style="background-image: url('img/glyphicons-halflings-white.png');background-position: -96px -96px;background-repeat: no-repeat;margin-right:3px;" title="Bantuan"/>
                    </a>
                    <span id="tgl"></span>
                </div>
            </div>
            <div style="clear:both;"></div>
            <div id="header">
                <h1 style="font-size:34px;"><img src="{{ asset('img/bell.png')}}" align="left" /><span style="color:gold;">BELL</span></h1>
                <span style="font-family:fixedsys;"> Aplikasi - <span style="color:gold;font-weight:bold;">Bell</span> Sekolah Otomatis</span>
                <div id="jam"></div>
            </div>
            <div style="clear:both;"></div>
            <div id="content">
             isi
            </div>
            <div style="clear:both;"></div>
            <div id="footer">
                <i>
                <?php
                if (!empty($_SESSION['usernamebell'])) {
                    echo "<div><a href='p_logout.php' title='logout'>Logout</a></div>";
                }
                ?>
            </div>
        </div>
    </div>

</body>
</html>