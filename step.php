<?php
// ambil vaitabel get
$m = $_GET['m'];
$id = (($m == 'detailleague')) ? $_GET['id'] : '';

// ambil data detail league berdasarkan id
$dataDetailLeague = $leagueDetail->getLeagueDetail($id);

if ($m == 'league') {
    $active_league = "active";
    $active_detail_league = "";
    $active_team = "";
    $active_player = "";

    $disabled_detail_league = "disabled";
    $disabled_team = "disabled";
    $disabled_player = "disabled";
} elseif ($m == 'detailleague' && $id != '') {
    $active_league = "";
    $active_detail_league = "active";
    $active_team = "";
    $active_player = "";

    $disabled_detail_league = "";
    $disabled_team = "disabled";
    $disabled_player = "disabled";
} elseif ($m == 'team') {
    $active_league = "";
    $active_detail_league = "";
    $active_team = "active";
    $active_player = "";

    $disabled_detail_league = "";
    $disabled_team = "";
    $disabled_player = "disabled";
} elseif ($m == 'player') {
    $active_league = "";
    $active_detail_league = "";
    $active_team = "";
    $active_player = "active";

    $disabled_detail_league = "";
    $disabled_team = "";
    $disabled_player = "";
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
    <a class="<?php echo "$active_detail_league $disabled_detail_league"; ?> step" href="media.php?m=team">
        <i class="trophy icon"></i>
        <div class="content">
            <div class="title">Detail League</div>
            <div class="description">
                <?php
                if ($m == 'detailleague' && $id != '') {
                    echo "You choose " . $leagueDetail->getAcronym($dataDetailLeague['strLeague']);
                } else {
                    echo "Selected league details";
                }

                ?>
            </div>
        </div>
    </a>
    <a class="<?php echo "$active_team
    $disabled_team"; ?> step">
        <i class="users icon"></i>
        <div class="content">
            <div class="title">Team</div>
            <div class="description">Selected team</div>
        </div>
    </a>
    <a class="<?php echo "$active_player
    $disabled_player"; ?> step">
        <i class="user icon"></i>
        <div class="content">
            <div class="title">Player</div>
            <div class="description">Selected player by team</div>
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