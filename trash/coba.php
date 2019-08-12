<?php

class Leagueee
{

    private $posisi_terakhir;
    var $indexHalamanAwal = array();

    /**
     * @return int
     */
    public function getPosisiTerakhir()
    {
        return $this->posisi_terakhir;
    }

    /**
     * @param int $posisi_terakhir
     */
    public function setPosisiTerakhir($posisi_terakhir)
    {
        $this->posisi_terakhir = $posisi_terakhir;
    }

    function getAllLeague($genre = "")
    {
        $league_url = "https://www.thesportsdb.com/api/v1/json/1/all_leagues.php";

        $league_json = file_get_contents($league_url);
        $league_array = json_decode($league_json, true);

        $league = $league_array['leagues'];

        if (empty($genre)) {
            return $league;
        } else {

//            $leagues = array();
//            foreach ($league as $liga) {
//                if ($liga['strSport'] == $genre) {
//                    $leagues[] = $liga;
//                }
//            }
//            return $leagues;
            $leagues = array();
            $no = 0;
            foreach ($league as $liga) {
                if ($liga['strSport'] == $genre) {
                    $leagues[] = $liga;

                    if (($no % 18) == 0) {
                        array_push($this->indexHalamanAwal, $no);
                    }

                    $no++;
                }
            }
            return $leagues;
        }
    }


    function getAllLeaguePaging($genre, $halaman)
    {
        $league = $this->getAllLeague($genre);

        $batas = 18;
        if ($halaman == 1) {
            $posisi = 0;
        } else {
            $posisi = (int)$this->indexHalamanAwal[$halaman - 1];
        }

        $leagues = array();
        for ($i = $posisi; $i < ($batas * $halaman); $i++) {
            if (!empty($league[$i])) {
                $leagues[] = $league[$i];
            }
        }

        return $leagues;
    }
}

$league = new Leagueee();
$hasil = $league->getAllLeaguePaging("Soccer", 5);
$w = 0;
foreach ($hasil as $item) {
//    if (empty($item)) {
//
//    } else {

    echo "<li>" . $item['idLeague'] . " - " . $item['strLeague'];
//    }
    $w++;
}

echo "<h3>Total : $w </h3>";
echo "Posisi Terakhir : " . $league->getPosisiTerakhir();

$arraynya = $league->indexHalamanAwal;
print_r($arraynya);

