<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bola</title>
    <link rel="stylesheet" href="css/assets/app.css">
    <!-- Semantic CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
    <!--    additional-->
    <link rel="stylesheet" href="assets/css/app.css">

</head>


<body>


<div class="ui grid">
    <div class="row">
        <div class="column">
            <?php
            //deklarasi model
            include "model/League.php";
            include "model/LeagueDetail.php";
            include "model/Team.php";
            include "model/Player.php";
            include "utils/library.php";
            //instansiasi
            $league = new League();
            $leagueDetail = new LeagueDetail();
            $team = new Team();
            $player = new Player();

            include "step.php";
            ?>
        </div>
    </div>
    <div class="row">
        <!--        Left Grid-->
        <div class="two wide column">
            <img>
        </div>
        <!--        Center Grid-->
        <div class="twelve wide column">
            <?php include "content.php"; ?>
        </div>
        <!--        Right Grid-->
        <div class="two wide column">
            <img>
        </div>
    </div>
</div>

</body>
<script>

    //show more or show less desription on detail league


</script>
<script src="assets/js/app.js"></script>


</html>
