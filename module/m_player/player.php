<?php
$player_id = isset($_GET['id']) ? $_GET['id'] : '';
//$dataTeam = $player->getTeamDetail($player_id);
$dataPlayer = $player->getPlayerDetail($player_id);
?>
<div class="ui grid">
    <!--Back Button -->
    <div class="four wide column">
        <a onclick="self.history.back()" class="ui labeled icon button">
            <i class="arrow left icon"></i>
            Back
        </a>
    </div>

    <!--Header-->
    <div class="eight wide column">
        <h1 class="ui header centered"><?php echo "$dataPlayer[strPlayer]"; ?>
            <div class="sub header"><?php echo "$dataPlayer[strPosition]"; ?></div>
        </h1>
    </div>
</div>
<br>

<!--        Content-->
<h2 class="ui medium grey header"><i class="list ul icon"></i> Profile League</h2>
<div class="ui two column grid">
    <div class="column">
        <table class="ui very basic collapsing table">
            <tbod>
                <tr>
                    <th>Formed Year</th>
                    <td>: <?php echo $dataTeam['intFormedYear']; ?></td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td>: <?php echo $dataTeam['strCountry']; ?></td>
                </tr>
                <tr>
                    <th>League</th>
                    <td>: <?php echo $dataTeam['strLeague']; ?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>:
                        <?php
                        $icon = ($dataTeam['strGender'] == 'Male') ? 'mars' : 'venus';
                        echo "<i class='icon $icon'></i> $dataTeam[strGender]";
                        ?>
                    </td>
                </tr>
            </tbod>
        </table>
    </div>
    <div class="column">
        <div class="ui tiny header">Badge</div>
        <div class="ui placeholder" style="width: 200px; height: 200px;"></div>
        <img class="ui medium bordered image" src="<?php echo $dataTeam['strTeamBadge']; ?>"
             style="width: 200px; height: 200px; display: none;">
    </div>
</div>
<br>

<!--List Team in a League-->
<div class="ui accordion">
    <div class="ui header title">
        <i class="dropdown icon"></i>
        List of <?php echo "$dataTeam[strTeam]"; ?> players
    </div>
    <div class="content">
        <div class="ui six column grid">
            <?php
            if (!(empty($dataPlayer))) {
                foreach ($dataPlayer as $player) {
                    echo "<div class='column'>
                        <a href='media.php?m=player&id=$player[idPlayer]' title='Click to see details of this player'>
                        <div class='ui placeholder' style='width: 80px; height: 80px;'></div>
                        <img class='ui tiny circular image' src='$player[strThumb]' style='display: none;'>        
                            $player[strPlayer]
                        </a>
                      </div>";
                }
            }
            ?>
        </div>
        <!--        <p class="transition hidden"></p>-->
    </div>

</div>
<br>

<!--Description-->
<h2 class="ui medium grey header"><i class="align left icon"></i> Description</h2>
<div class="ui two column grid">
    <div class="column four wide">
        <div class="ui placeholder" style="width: 230px; height: 300px;"></div>
        <?php
        if (!(empty($dataTeam['strTeamLogo']))) { ?>
            <img class="ui medium rounded image" src="<?php echo $dataTeam['strTeamLogo']; ?>"
                 style="display: none;">
        <?php } else {
            echo "<img class='ui medium rounded image' src='$dataTeam[strTeamBadge]' style='display: none'>";
        } ?>
    </div>
    <div class="column eleven wide">
        <div class="description" style="height: 20rem; overflow: hidden;" id="description_detail_league">
            <?php
            $texts = $leagueDetail->breakLongText($dataTeam['strDescriptionEN']);
            foreach ($texts as $text) {
                echo "<p>$text </p>";
            }
            ?>
            <button class="ui grey basic button fluid" style="margin: 2rem auto; display: none;"
                    id="btn_description_less">
                Show less
            </button>
        </div>
        <div class="column two wide">
            <div class="ui grid column two wide centered">
                <button class="ui primary basic button " style="margin: 2rem auto;" id="btn_description_more">Show more
                </button>
            </div>
        </div>
    </div>
</div>
<br><br>

<!--Stadium-->
<h2 class="ui medium grey header"><i class="hockey puck icon"></i> Stadium</h2>
<div class="ui two column grid">
    <div class="column sixteen wide">
        <table class="ui very basic collapsing table">
            <tbod>
                <tr>
                    <th>Stadium Name</th>
                    <td>: <?php echo $dataTeam['strStadium']; ?></td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td>: <?php echo $dataTeam['strStadiumLocation']; ?></td>
                </tr>
                <tr>
                    <th>Capacity</th>
                    <td>: <?php echo priceFormat($dataTeam['intStadiumCapacity']); ?> people</td>
                </tr>
            </tbod>
        </table>
        <div class="ui fluid placeholder" style="width: 1000px; height: 560px;"></div>
        <img class="ui fluid image" src="<?php echo $dataTeam['strStadiumThumb']; ?>" style="display: none;">
        <br><br>
        <!--Stadium Description-->
        <div class="ui accordion">
            <div class="ui header grey title">
                <i class="dropdown icon"></i>
                Stadium Description
            </div>
            <div class="content">
                <p><?php
                    $stadium_descs = $leagueDetail->breakLongText($dataTeam['strStadiumDescription']);
                    foreach ($stadium_descs as $stadium_desc) {
                        echo "<p>$stadium_desc</p>";
                    }
                    ?>
                </p>
            </div>

        </div>

    </div>
</div>

<!--Jersey & Gallery-->
<div class="ui two column grid">
    <div class="column four wide">
        <h2 class="ui medium grey header"> Jersey</h2>
        <div class="ui placeholder" style="width: 230px; height: 240px;"></div>
        <img class="ui medium rounded image" src="<?php echo $dataTeam['strTeamJersey']; ?>" style="display: none;">
    </div>
    <div class="column twelve wide">
        <h2 class="ui medium grey header"> Gallery</h2>
        <div class="ui medium images">
            <div class="ui placeholder" style="width: 600px; height: 400px;"></div>

            <?php
            for ($i = 1; $i <= 4; $i++) {
                $link_image = "strTeamFanart" . $i;
                if (!empty($dataTeam[$link_image])) {
                    echo "<img class='ui image' src='$dataTeam[$link_image]' style='display: none'>";
                }
            }
            ?>
        </div>
    </div>
</div>
<br><br>

<!--Social-->
<div class="ui grid">
    <div class="column ui">
        <h2 class="ui medium grey header"> Social</h2>
        <div class="ui relaxed list">
            <?php
            if (!(empty($dataTeam['strWebsite']))) { ?>
                <div class="item">
                    <a class="header" href="https://<?php echo "$dataTeam[strWebsite]"; ?>" target="_blank">
                        <i class="icon linkify"></i> <?php echo "$dataTeam[strWebsite]"; ?>
                    </a>
                </div>
            <?php } ?>

            <?php
            if (!(empty($dataTeam['strFacebook']))) { ?>
                <div class="item">
                    <a class="header" href="https://<?php echo "$dataTeam[strFacebook]"; ?>" target="_blank">
                        <i class="icon facebook f"></i> <?php echo "$dataTeam[strFacebook]"; ?>
                    </a>
                </div>
            <?php } ?>

            <?php
            if (!(empty($dataTeam['strTwitter']))) { ?>
                <div class="item">
                    <a class="header" href="https://<?php echo "$dataTeam[strTwitter]"; ?>" target="_blank">
                        <i class="icon twitter"></i> <?php echo "$dataTeam[strTwitter]"; ?>
                    </a>
                </div>
            <?php } ?>

            <?php
            if (!(empty($dataTeam['strYoutube']))) { ?>
                <div class="item">
                    <a class="header" href="https://<?php echo "$dataTeam[strYoutube]"; ?>" target="_blank">
                        <i class="icon youtube"></i> YouTube Channel
                    </a>
                </div>
            <?php } ?>

            <?php
            if (!(empty($dataTeam['strRSS']))) { ?>
                <div class="item">
                    <a class="header" href="<?php $link_rss = $dataTeam['strRSS'];
                    $http = (strpos($link_rss, "ttp")) ? '' : 'https://';
                    echo "$http$dataTeam[strRSS]";
                    ?>" target="_blank">
                        <i class="icon rss"></i> <?php echo "$dataTeam[strRSS]"; ?>
                    </a>
                </div>
            <?php } ?>

        </div>
    </div>
</div>

<div class="ui large centered inline text loader">
    Adding more content...
</div>

