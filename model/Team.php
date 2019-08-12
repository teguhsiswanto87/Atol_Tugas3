<?php


class Team
{
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