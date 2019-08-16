<?php

class Player
{
//get semua tim di liga berdasarkan league_id
    function getAllPlayerOfTeam($player_id = "")
    {
        $player_url = "https://www.thesportsdb.com/api/v1/json/1/lookup_all_players.php?id=$player_id";

        $player_json = file_get_contents($player_url);
        $player_array = json_decode($player_json, true);

        $player = $player_array['player'];

        if (empty($player)) {
            return null;
        } else {
            return $player;
        }
    }

// get detail team based idTeam
    function getPlayerDetail($player_id)
    {
        $player_detail_url = "https://www.thesportsdb.com/api/v1/json/1/lookupplayer.php?id=$player_id";

        $player_detail_json = file_get_contents($player_detail_url);
        $player_detail_array = json_decode($player_detail_json, true);

        $player_detail = $player_detail_array['players'];

        return $player_detail[0];
    }

//get jumlah team di liga berdasasrkan league_id
//    function getNumberTeamOfLeague($league_id = "")
//    {
//        $allTeam = $this->getAllTeamOfLeague($league_id);
//
//        if (empty($allTeam)) {
//            return null;
//        } else {
//            $count = 0;
//            foreach ($allTeam as $team) {
//                $count++;
//            }
//            return $count;
//        }
//
//    }

}