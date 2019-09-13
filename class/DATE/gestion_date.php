<?php


namespace DATE;
use Exception;

class gestion_date {


    /**
     * @param string $delimiter
     * @return string
     */
    public function day_date ($delimiter = "/") {

        $x = $this->extract_date($this->make_date($delimiter), $delimiter);
        $x = $this->format_zero($x);

        return $x[0].$delimiter.$x[1].$delimiter.$x[2];

    }

    /**
     * @return array
     * @throws Exception
     */
    private function get_date(){
        $x = getdate();
        if (!isset($x["year"])){
            throw new Exception("<i>00/00/00(date temporairement indisponible)</i>");
        }
        return $x;
    }

    /**
     * @param $delimiter
     * @return array|string
     */
    private function make_date($delimiter){
        try{
            $x = $this->get_date();
            return $x["mday"].$delimiter.$x["mon"].$delimiter.$x["year"];
        } catch (Exception $e) {
            $x = $e->getMessage();
            return $x;
        }
    }

    /**
     * @param $date
     * @param string $delimiter
     * @return array
     */
    private function extract_date($date, $delimiter = "/"){
        $x = explode($delimiter, $date);
        return $x;
    }

    /**
     * @param $numbers_of_date
     * @return array
     */
    private function format_zero($numbers_of_date){
        $result = [];
        foreach ($numbers_of_date as $number){
            if ((int) $number < 10){
                $number = '0'.$number;
            }
            $result []= $number;
        }
        return $result;
    }
}