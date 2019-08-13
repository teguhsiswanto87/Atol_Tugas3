<?php

class Team
{
//get semua tim di liga berdasarkan league_id
    function getAllTeamOfLeague($league_id = "")
    {
        $team_url = "https://www.thesportsdb.com/api/v1/json/1/lookup_all_teams.php?id=$league_id";

        $team_json = file_get_contents($team_url);
        $team_array = json_decode($team_json, true);

        $team = $team_array['teams'];

        if (empty($team)) {
            return null;
        } else {
            return $team;
        }
    }

// get detail team based idTeam
    function getTeamDetail($team_id)
    {
        $team_detail_url = "https://www.thesportsdb.com/api/v1/json/1/lookupteam.php?id=$team_id";

        $team_detail_json = file_get_contents($team_detail_url);
        $team_detail_array = json_decode($team_detail_json, true);

        $team_detail = $team_detail_array['teams'];

        return $team_detail[0];
    }

//get jumlah team di liga berdasasrkan league_id
    function getNumberTeamOfLeague($league_id = "")
    {
        $allTeam = $this->getAllTeamOfLeague($league_id);

        if (empty($allTeam)) {
            return null;
        } else {
            $count = 0;
            foreach ($allTeam as $team) {
                $count++;
            }
            return $count;
        }

    }

}