<?php
// ambil vaitabel get
$m = $_GET['m'];
$id_detail_league = (($m == 'detailleague')) ? $_GET['id'] : '';
$id_team = (($m == 'team')) ? $_GET['id'] : '';
$id_player = (($m == 'player')) ? $_GET['id'] : '';

// ambil data detail league berdasarkan id
$dataDetailLeague = $leagueDetail->getLeagueDetail($id_detail_league);
$teamDetail = $team->getTeamDetail($id_team);
$playerDetail = $player->getPlayerDetail($id_player);

if ($m == 'league') {
    $active_league = "active";
    $active_detail_league = "";
    $active_team = "";
    $active_player = "";

    $disabled_detail_league = "disabled";
    $disabled_team = "disabled";
    $disabled_player = "disabled";
} elseif ($m == 'detailleague' && $id_detail_league != '') {
    $active_league = "";
    $active_detail_league = "active";
    $active_team = "";
    $active_player = "";

    $disabled_detail_league = "";
    $disabled_team = "disabled";
    $disabled_player = "disabled";
    $id_detail_league = $dataDetailLeague['idLeague'];
} elseif ($m == 'team' && $id_team != '') {
    $active_league = "";
    $active_detail_league = "";
    $active_team = "active";
    $active_player = "";

    $disabled_detail_league = "";
    $disabled_team = "";
    $disabled_player = "disabled";

    $id_detail_league = $teamDetail['idLeague'];

} elseif ($m == 'player' && $id_player != '') {
    $active_league = "";
    $active_detail_league = "";
    $active_team = "";
    $active_player = "active";

    $disabled_detail_league = "";
    $disabled_team = "";
    $disabled_player = "";

    $id_team = $playerDetail['idTeam'];
    $waw = $team->getTeamDetail($id_team);
    $id_detail_league = $waw['idLeague'];

} else {
    null;
}

?>

<div class="ui steps">
    <a class="<?php echo $active_league ?> step" href="media.php?m=league">
        <i class="flag icon"></i>
        <div class="content">
            <div class="title">Leagues</div>
            <div class="description">The best leagues in the world</div>
        </div>
    </a>


    <a class="<?php echo "$active_detail_league $disabled_detail_league"; ?> step"
       href="media.php?m=detailleague&id=<?php echo "$id_detail_league"; ?>">
        <i class="trophy icon"></i>
        <div class="content">
            <div class="title">Detail League</div>
            <div class="description">
                <?php
                if ($m == 'detailleague' && $id_detail_league != '') {
                    echo "You choose " . $leagueDetail->getAcronym($dataDetailLeague['strLeague']);
                } else {
                    echo "Selected league details";
                }

                ?>
            </div>
        </div>
    </a>

    <a class="<?php echo "$active_team
    $disabled_team"; ?> step ui button" href="media.php?m=team&id=<?php echo "$id_team"; ?>">
        <i class="users icon"></i>
        <div class="content">
            <div class="title" data-tooltip="Add users to your feed" data-inverted data-position="bottom center">Team</div>
            <div class="description">
                <?php
                if ($m == 'team' && $id_team != '') {
                    echo "You choose " . $teamDetail['strTeamShort'];
                } else {
                    echo "Selected team by league";
                }
                ?>
            </div>
        </div>
    </a>

    <a class="<?php echo "$active_player
    $disabled_player"; ?> step">
        <i class="user icon"></i>
        <div class="content">
            <div class="title">Player</div>
            <div class="description">
                <?php
                if ($m == 'player' && $id_player != '') {
                    echo $playerDetail['strPlayer'];
                } else {
                    echo "Selected Player by team";
                }
                ?>
            </div>
        </div>
    </a>

    <a class="<?php echo "$active_player
    $disabled_player"; ?> step">
        <div class="content">
            <div class="title">Billing</div>
            <div class="description">Enter billing information</div>

        </div>
    </a>

</div>