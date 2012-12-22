<?php

class Timehelper
{
    public static function human_readable_date($date)
    {
        return strftime("%A", strtotime($date)) . '&nbsp;' . strftime("%m/%d/%Y", strtotime($date));
    }

    /*
 * secToString returns a pretty formatted sentence of time from a MYSQL time field
 * @param MYSQL time $seconds
 * @return string
 */

    public static function secToString($seconds){

            $returnstring = "";
            $hours = intval(($seconds / 3600));
            $minutes = intval(($seconds) / 60);

            if ($hours < 1) {
                if ($minutes == 1){
                    return $minutes . " minute";
                } else {
                    return $minutes." minutes";
                }
            } else {
                if ($minutes > ($hours * 60)) {
                    $returnstring .= $hours . " hours";
                    $returnstring .= " and " . (($minutes) - ($hours * 60)) . " minutes";
                    return $returnstring;
                } else {
                    $returnstring .= $hours . " hours";
                    return $returnstring;
                }
            }
    }

    /*
    * getElapsedHumanReadableTime returns a pretty formatted sentence of elapsed time between the two timestamps
    *
    * @param MYSQL time $start
    * @param MYSQL time $stop
    *
    * @return string
    */


    public static function getElapsedHumanReadableTime($start, $stop){
        return static::secToString(static::getElapsedTime($start,$stop));
    }

/*
* getElapsedTime returns the number of seconds between the two timestamps
*
* @param MYSQL time $start
* @param MYSQL time $stop
*
* @return int
*/

    protected static function getElapsedTime($start,$stop){

            $time_array5 = explode(':', $start);
            $hours5 = (int)$time_array5[0];
            $minutes5 = (int)$time_array5[1];
            $seconds5 = (int)$time_array5[2];

            $total_secondsTCstart5 = ($hours5 * 3600) + ($minutes5 * 60) + $seconds5;

            $time_array25 = explode(':', $stop);
            $hours25 = (int)$time_array25[0];
            $minutes25 = (int)$time_array25[1];
            $seconds25 = (int)$time_array25[2];

            $total_secondsTCstop5 = ($hours25 * 3600) + ($minutes25 * 60) + $seconds25;

            if (($total_secondsTCstop5) - ($total_secondsTCstart5) < 0) {

                $total_secondsTCstop5 = ($total_secondsTCstop5 + 86400);

                //----------

                $totaltime = $total_secondsTCstop5 - $total_secondsTCstart5;
                return $totaltime;

                //echo $totaltime.'<br>';

            } else {
                $time_array = explode(':', $start);
                $hours = (int)$time_array[0];
                $minutes = (int)$time_array[1];
                $seconds = (int)$time_array[2];

                $total_secondsTCstart = ($hours * 3600) + ($minutes * 60) + $seconds;

                $time_array2 = explode(':', $stop);
                $hours2 = (int)$time_array2[0];
                $minutes2 = (int)$time_array2[1];
                $seconds2 = (int)$time_array2[2];

                $total_secondsTCstop = ($hours2 * 3600) + ($minutes2 * 60) + $seconds2;

                $totaltime = $total_secondsTCstop - $total_secondsTCstart;

                return $totaltime;
            }
    }

}