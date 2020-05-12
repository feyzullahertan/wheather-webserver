<html>
    <head>
        <title> Feyzullah ERTAN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.css" />
    </head>

    <body>
        <section class="hero is-warning">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                            Feyzullah Ertan - Distributed Systems - Hava Durumu
                    </h1>
                </div>
            </div>
        </section>
        <?php
            error_reporting(0);
            $get = json_decode(file_get_contents('http://ip-api.com/json/'),true);

            $sehir = $_GET['sehirekle'];
            $string = "http://api.openweathermap.org/data/2.5/weather?q=".$sehir."&units=metric&lang=tr&appid=417e63e4f294720b967a31fa817e4108";
            $data = json_decode(file_get_contents($string),true);
            

            $sicaklik = $data['main']['temp'];
            $icon = $data['weather'][0]['icon'];
            $ulke =  "<b>".$data['name'].",".$data['sys']['country']."</b>";
            $logo = "<img src='http://openweathermap.org/img/w/".$icon.".png'>";
            $aciklama = "<b><p>".$data['weather'][0]['description']."</p></b>";
            $sicaklikDegeri =  "<b>Sıcaklık:  ".$sicaklik."°C</b><br>";
            $koordinatlar= "<b class='x'> X:  ".$data['coord']['lon']." Y:  ".$data['coord']['lat']."</b>";
            
        ?>
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-offset-4 is-4">
                        <div class="box">
                            <article class="media">
                                <div class="media-left">
                                    <figure class="image is-60x60">
                                    <?php 
                                        echo $logo; 
                                    ?>
                                    </figure>
                                    </div>
                                    <div class="media-content">
                                        <div class="content">
                                            <p>
                                                <span class="subtitle"><?php echo $ulke; ?></span>
                                                <br>
                                                <span class="subtitle"><?php echo $sicaklikDegeri; ?></span>
                                                <?php echo "".$aciklama.""; ?>
                                                <span class="subtitle"><?php echo $koordinatlar; ?></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>            
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>