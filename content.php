<?php
$m = $_GET['m'];

if ($m == 'league') {
    include "module/m_league/league.php";
} elseif ($m == 'team') {
    include "module/m_team/team.php";
}

?>
