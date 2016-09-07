<?php

class MLB {

    public function get($GameDate = '') {
        //date needs to be Month/Date/Year
        if ($GameDate) {
            //get specified date
            $date = explode('/', $GameDate);
            $this->url = 'http://gd2.mlb.com/components/game/mlb/year_' . $date[2] . '/month_' . $date[0] . '/day_' . $date[1] . '/master_scoreboard.json';
        } else {
            //otherwise, check out todays games
            $this->url = 'http://gd2.mlb.com/components/game/mlb/year_' . date('Y') . '/month_' . date('m') . '/day_' . date('d') . '/master_scoreboard.json';
        }        
        $games = $this->request();
        if (!empty($games['data']['games'])) {
            return $games['data']['games'];
        } 
        return 'No games found.';
    }

    public function request() { 
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); 
        $result = curl_exec($curl);
        $data = json_decode($result, true);
        if ($data === NULL) {
            return $result;
        }
        return $data;
    }

}
