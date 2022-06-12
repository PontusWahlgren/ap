<?php

class Calendar {
    
    public $title;
    public $prev;
    public $next;
    public $weeks;

    public function __construct() {
        
        $id_customer = 1;
        $id_animal = 1;
        
//        $events = $this->getEvents($id_customer, $id_animal);
        
        $this->initCalendar();
        
        
    }
    
    public function initCalendar() {
        // default timezone set
        date_default_timezone_set("Europe/Stockholm");

        // Get prev and next month
        if (filter_input(INPUT_GET, "ym") !== null) {
            $ym = filter_input(INPUT_GET, "ym");
        } else {
            // This month
            $ym = date("Y-m");
        }

        // Check format
        $timestamp = strtotime($ym . "-01"); // first date of month
        if ($timestamp === false) {
            $ym = date("Y-m");
            $timestamp = strtotime($ym . "-01");
        }

        // Today (format: 2022-06-2)
        $today = date("Y-m-j");

        // Title (format: June, 2022)
        $this->title = date("F, Y", $timestamp);

        // Create prev and next month link 
        $this->prev = date("Y-m", strtotime("-1 month", $timestamp));
        $this->next = date("Y-m", strtotime("+1 month", $timestamp));

        // Number of days in month
        $day_count = date("t", $timestamp);

        // 1:Mon, 2:Tue, 3:Wed...7:Sun
        $str = date("N", $timestamp);
        
        $week = "";

        // Add empty cells
        $week .= str_repeat("<td></td>", $str - 1);

        for ($day = 1; $day <= $day_count; $day++, $str++) {
            $date = $ym . "-" . $day;

            if ($today == $date) {
                $week .= "<td class='today'>";
            } else {
                $week .= "<td>";
            }
            $week .= $day . "</td>";

            // Sunday OR last day of month
            if ($str % 7 == 0 || $day == $day_count) {
                // Last day of month
                if ($day == $day_count && $str % 7 != 0) {
                    // Add empty cells 
                    $week .= str_repeat("<td></td>", 7 - $str % 7);
                }

                $this->weeks[] = "<tr>" . $week . "</tr>";

                $week = "";
            }
        }
    }
    
    public function getEvents($id_customer, $id_animal) {
        $db = DB::getInstance();
        $id_calendar = $db->getValue("calendar", "id_customer = ".$id_customer."animal = ".$id_animal);
        $events = $db->get("calendar_event", "id_calendar = ".$id_calendar);
        
        return $events;
    }

}
