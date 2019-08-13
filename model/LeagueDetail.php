<?php

class LeagueDetail
{
// get detail league based idLeague
    function getLeagueDetail($league_id)
    {
        $league_detail_url = "https://www.thesportsdb.com/api/v1/json/1/lookupleague.php?id=$league_id";

        $league_detail_json = file_get_contents($league_detail_url);
        $league_detail_array = json_decode($league_detail_json, true);

        $league_detail = $league_detail_array['leagues'];

        return $league_detail[0];
    }

// get akronim dari masukan kalimat (mengambil 1 huruf awal kemudian digabungkan)
    function getAcronym($kata_kata)
    {
        $words = explode(' ', $kata_kata);
        $acronym = '';

        foreach ($words as $word) {
            $acronym .= $word[0];
        }

        return $acronym;
    }

// split long text to many paragraph
    function breakLongText($text, $length = 200, $maxLength = 250)
    {
        //Text length
        $textLength = strlen($text);

        //initialize empty array to store split text
        $splitText = array();

        //return without breaking if text is already short
        if (!($textLength > $maxLength)) {
            $splitText[] = $text;
            return $splitText;
        }

        //Guess sentence completion
        $needle = '.';

        /*iterate over $text length
          as substr_replace deleting it*/
        while (strlen($text) > $length) {

            $end = strpos($text, $needle, $length);

            if ($end === false) {

                //Returns FALSE if the needle (in this case ".") was not found.
                $splitText[] = substr($text, 0);
                $text = '';
                break;

            }

            $end++;
            $splitText[] = substr($text, 0, $end);
            $text = substr_replace($text, '', 0, $end);

        }

        if ($text) {
            $splitText[] = substr($text, 0);
        }

        return $splitText;

    }
    

}