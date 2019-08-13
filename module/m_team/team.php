<?php

$dataTeam = $team->getAllTeamOfLeague("4328");

foreach ($dataTeam as $item) {
    echo "<li>$item[idTeam] - $item[strTeam]</li>";
}

?>
