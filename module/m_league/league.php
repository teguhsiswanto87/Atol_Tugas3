<div class="ui link cards " id="wakw">
    <h3 id="demo"></h3>
    <?php
    include "model/League.php";
    include "model/LeagueDetail.php";
    include "model/Team.php";
    $league = new League();
    $leagueDetail = new LeagueDetail();
    $team = new Team();

    $dataLeague = $league->getAllLeague("Soccer");

    foreach ($dataLeague as $liga) {
        $countTeam = $team->getNumberTeamOfLeague($liga['idLeague']);
        $league_detail = $leagueDetail->getLeagueDetail($liga['idLeague']);
        ?>
        <div class="card">
            <div class="ui placeholder" style="width: 290px; height: 290px;"></div>
            <div class="image" style="display: none;">
                <img src="<?php
                if (empty($league_detail['strBadge'])) {
                    echo "https://semantic-ui.com/images/wireframe/white-image.png";
                }
                echo "$league_detail[strBadge]";
                ?>"
                     data-src="<?php echo "$league_detail[strBadge]"; ?>"
                >
            </div>
            <div class="content">
                <a class="header"><?php echo "$liga[strLeague]"; ?></a>
                <div class="meta">
                    <?php
                    $country_name_lower = strtolower($league_detail['strCountry']);
                    if ($country_name_lower == 'holland') {
                        $country_name_lower = 'netherlands';
                    }
                    if ($country_name_lower == 'usa') {
                        $country_name_lower = 'united states';
                    }

                    ?>
                    <span class="date"><?php echo "$liga[strLeagueAlternate] <br> 
                                    <i class='$country_name_lower flag'></i> $league_detail[strCountry]"; ?>
                                </span>
                </div>
                <!--                            <div class="description">-->
                <!--                                Kristy is an art director living in New York.-->
                <!--                            </div>-->
            </div>
            <div class="extra content">
                <a>
                    <i class="users icon"></i>
                    <?php echo "$countTeam Teams"; ?>

                </a>
            </div>
        </div>

    <?php } ?>
</div>

<div class="ui large centered inline text loader">
    Adding more content...
</div>