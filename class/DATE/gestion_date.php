<?php


namespace DATE;
use Exception;

class gestion_date {

    public function day_date ($delimiter = "/") {
        $x = $this->extract_date($this->make_date(), $delimiter);
        $x = $this->format_zero($x);
        return $x[0].$delimiter.$x[1].$delimiter.$x[2];

    }

    private function get_date(){
        $x = getdate();
        if (!isset($x["year"])){
            throw new Exception("<i>00/00/00(date temporairement indisponible)</i>");
        }
        return $x;
    }

    private function make_date(){
        try{
            $x = $this->get_date();
            return $x["mday"].'/'.$x["mon"].'/'.$x["year"];
        } catch (Exception $e) {
            $x = $e->getMessage();
            return $x;
        }
    }

    private function extract_date($date, $delimiter = "/"){
        $x = explode($delimiter, $date);
        return $x;
    }

    private function format_zero($numbers_of_date){
        $result = [];
        foreach ($numbers_of_date as $number){
            if ($number < 10){
                $number = '0'.$number;
            }
            $result []= $number;
        }
        return $result;
    }
}