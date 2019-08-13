<?php
//deklarasi model dan instansiasi objek


$league_id = isset($_GET['id']) ? $_GET['id'] : '';
$dataDetailLeague = $leagueDetail->getLeagueDetail($league_id);
$dataTeam = $team->getAllTeamOfLeague($league_id);

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
        <h1 class="ui header"><?php echo "$dataDetailLeague[strLeague]"; ?>
            <div class="sub header"><?php echo "$dataDetailLeague[strLeagueAlternate]"; ?></div>
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
                    <td>: <?php echo $dataDetailLeague['intFormedYear']; ?></td>
                </tr>
                <tr>
                    <th>Date First Event</th>
                    <td>: <?php echo tgl_english($dataDetailLeague['dateFirstEvent']); ?></td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td>: <?php echo $dataDetailLeague['strCountry']; ?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>:
                        <?php
                        $icon = ($dataDetailLeague['strGender'] == 'Male') ? 'mars' : 'venus';
                        echo "<i class='icon $icon'></i> $dataDetailLeague[strGender]";
                        ?>
                    </td>
                </tr>
            </tbod>
        </table>
    </div>
    <div class="column">
        <div class="ui tiny header">Badge</div>
        <div class="ui placeholder" style="width: 200px; height: 200px;"></div>
        <img class="ui medium bordered image" src="<?php echo $dataDetailLeague['strBadge']; ?>"
             style="width: 200px; height: 200px; display: none;">
    </div>
</div>
<br>

<!--List Team in a League-->
<div class="ui accordion">
    <div class="ui header title">
        <i class="dropdown icon"></i>
        List of Teams
    </div>
    <div class="content">
        <div class="ui six column grid">
            <?php
            foreach ($dataTeam as $team) {
                echo "<div class='column'>
                        <a href='media.php?m=team&id=$team[idTeam]' title='Go to detail this team'>
                        <div class='ui placeholder' style='width: 80px; height: 80px;'></div>
                        <img class='ui tiny image' src='$team[strTeamBadge]' style='display: none;'>        
                            $team[strTeam]
                        </a>
                      </div>";
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
        if (!(empty($dataDetailLeague['strPoster']))) { ?>
            <img class="ui medium rounded image" src="<?php echo $dataDetailLeague['strPoster']; ?>"
                 style="display: none;">
        <?php } else {
            echo "<img class='ui medium rounded image' src='$dataDetailLeague[strLogo]' style='display: none'>";
        } ?>
    </div>
    <div class="column eleven wide">
        <div class="description">
            <?php
            $texts = $leagueDetail->breakLongText($dataDetailLeague['strDescriptionEN']);
            foreach ($texts as $text) {
                echo "<p class='right aligned'>$text </p>";
            }
            ?>
        </div>
    </div>
</div>
<br><br>

<!--Trophy & Gallery-->
<div class="ui two column grid">
    <div class="column four wide">
        <h2 class="ui medium grey header"> Trophy</h2>
        <div class="ui placeholder" style="width: 230px; height: 240px;"></div>
        <img class="ui medium rounded image" src="<?php echo $dataDetailLeague['strTrophy']; ?>" style="display: none;">
    </div>
    <div class="column twelve wide">
        <h2 class="ui medium grey header"> Gallery</h2>
        <div class="ui medium images">
            <div class="ui placeholder" style="width: 600px; height: 400px;"></div>

            <?php
            for ($i = 1; $i <= 4; $i++) {
                $link_image = "strFanart" . $i;
                if (!empty($dataDetailLeague[$link_image])) {
                    echo "<img class='ui image' src='$dataDetailLeague[$link_image]' style='display: none'>";
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
            if (!(empty($dataDetailLeague['strWebsite']))) { ?>
                <div class="item">
                    <a class="header" href="https://<?php echo "$dataDetailLeague[strWebsite]"; ?>" target="_blank">
                        <i class="icon linkify"></i> <?php echo "$dataDetailLeague[strWebsite]"; ?>
                    </a>
                </div>
            <?php } ?>

            <?php
            if (!(empty($dataDetailLeague['strFacebook']))) { ?>
                <div class="item">
                    <a class="header" href="https://<?php echo "$dataDetailLeague[strFacebook]"; ?>" target="_blank">
                        <i class="icon facebook f"></i> <?php echo "$dataDetailLeague[strFacebook]"; ?>
                    </a>
                </div>
            <?php } ?>

            <?php
            if (!(empty($dataDetailLeague['strTwitter']))) { ?>
                <div class="item">
                    <a class="header" href="https://<?php echo "$dataDetailLeague[strTwitter]"; ?>" target="_blank">
                        <i class="icon twitter"></i> <?php echo "$dataDetailLeague[strTwitter]"; ?>
                    </a>
                </div>
            <?php } ?>

            <?php
            if (!(empty($dataDetailLeague['strYoutube']))) { ?>
                <div class="item">
                    <a class="header" href="https://<?php echo "$dataDetailLeague[strYoutube]"; ?>" target="_blank">
                        <i class="icon youtube"></i> YouTube Channel
                    </a>
                </div>
            <?php } ?>

            <?php
            if (!(empty($dataDetailLeague['strRSS']))) { ?>
                <div class="item">
                    <a class="header" href="<?php $link_rss = $dataDetailLeague['strRSS'];
                    $http = (strpos($link_rss, "ttp")) ? '' : 'https://';
                    echo "$http$dataDetailLeague[strRSS]";
                    ?>" target="_blank">
                        <i class="icon rss"></i> <?php echo "$dataDetailLeague[strRSS]"; ?>
                    </a>
                </div>
            <?php } ?>

        </div>
    </div>
</div>

<div class="ui large centered inline text loader">
    Adding more content...
</div>
