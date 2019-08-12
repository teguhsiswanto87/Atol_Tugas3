<?php

class LeagueDetail
{
    function getLeagueDetail($league_id)
    {
        $league_detail_url = "https://www.thesportsdb.com/api/v1/json/1/lookupleague.php?id=$league_id";

        $league_detail_json = file_get_contents($league_detail_url);
        $league_detail_array = json_decode($league_detail_json, true);

        $league_detail = $league_detail_array['leagues'];

        return $league_detail[0];
    }
}