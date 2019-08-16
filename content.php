<?php
$m = $_GET['m'];

if ($m == 'league') {
    include "module/m_league/league.php";
} elseif ($m == 'detailleague') {
    include "module/m_detailleague/detailleague.php";
} elseif ($m == 'team') {
    include "module/m_team/team.php";
} elseif ($m == 'player') {
    include "module/m_player/player.php";
} else {
    echo "Halaman $m sedang dibuat";
}


