<?php
//deklarasi model dan instansiasi objek disimpan di media.php

$halaman = isset($_GET['p']) ? (int)$_GET['p'] : 1;
$dataLeague = $league->getAllLeaguePaging("Soccer", $halaman);
$dataLeagueNoPaging = $league->getAllLeague("Soccer");

?>
<!--Statistic-->
<div class="ui mini horizontal statistic">
    <div class="value first-capitalize" style="text-transform: lowercase;">
        <?php
        // total seluruh data
        $data_total = count($dataLeagueNoPaging);
        //data awal
        $data_awal = $league->getIndexHalamanAwal();
        $start = $data_awal[$halaman - 1] + 1;
        //data akhir
        $data_akhir = $league->getIndexHalamanAwal();
        $jumlah_total_data = $league->getPageCount("Soccer");
        $finish = ($halaman >= $jumlah_total_data) ? $data_total : $data_akhir[$halaman];

        echo "Showing $start to $finish of $data_total leagues";
        ?>
    </div>
</div>
<!--Cards-->
<div class="ui link cards " id="wakw">
    <h3 id="demo"></h3>
    <?php

    foreach ($dataLeague as $liga) {
        $countTeam = $team->getNumberTeamOfLeague($liga['idLeague']);
        $league_detail = $leagueDetail->getLeagueDetail($liga['idLeague']);
        ?>
        <div class="card">
            <div class="ui placeholder" style="width: 290px; height: 290px;"></div>
            <div class="image" style="display: none;">
                <img alt="" src="<?php
                if (empty($league_detail['strBadge'])) {
                    echo "https://semantic-ui.com/images/wireframe/white-image.png";
                }
                echo "$league_detail[strBadge]";
                ?>"
                     data-src="<?php echo "$league_detail[strBadge]"; ?>"
                ><!--end of img-->
            </div>
            <div class="content">
                <a class="header"
                   href="<?php echo "media.php?m=detailleague&id=$liga[idLeague]"; ?>"><?php echo "$liga[strLeague]"; ?></a>
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

<!--Pagination-->
<div class="ui grid">
    <div class="row">
        <div class="ui grid ten column centered">
            <div class="ui pagination menu">
                <?php
                $jumlah_halaman = $league->getPageCount("Soccer");
                for ($i = 1; $i <= $jumlah_halaman; $i++) {
                    $active_page = ($halaman == $i) ? 'active' : '';
                    echo "
                    <a class='ui button item $active_page' href='media.php?m=league&p=$i'
                     data-tooltip='Go to page $i ' data-position='top center'>
                        $i
                    </a>";
                    ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="ui large centered inline text loader">
    Adding more content...
</div>