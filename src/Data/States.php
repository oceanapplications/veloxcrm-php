<?php

namespace Oceanapplications\Veloxcrmphp\Data;

class States
{
    public static $states = [
                        "2"=>"Alaska",
                        "1"=>"Alabama",
                        "4"=>"Arkansas",
                        "3"=>"Arizona",
                        "5"=>"California",
                        "6"=>"Colorado",
                        "7"=>"Connecticut",
                        "9"=>"Washington DC",
                        "8"=>"Delaware",
                        "10"=>"Florida",
                        "11"=>"Georgia",
                        "12"=>"Hawaii",
                        "15"=>"Iowa",
                        "13"=>"Idaho",
                        "14"=>"Illinois",
                        "51"=>"Indiana",
                        "16"=>"Kansas",
                        "17"=>"Kentucky",
                        "18"=>"Louisiana",
                        "21"=>"Massachusetts",
                        "20"=>"Maryland",
                        "19"=>"Maine",
                        "22"=>"Michigan",
                        "23"=>"Minnesota",
                        "25"=>"Missouri",
                        "24"=>"Mississippi",
                        "26"=>"Montana",
                        "33"=>"North Carolina",
                        "34"=>"North Dakota",
                        "27"=>"Nebraska",
                        "29"=>"New Hampshire",
                        "30"=>"New Jersey",
                        "31"=>"New Mexico",
                        "28"=>"Nevada",
                        "32"=>"New York",
                        "35"=>"Ohio",
                        "36"=>"Oklahoma",
                        "37"=>"Oregon",
                        "38"=>"Pennsylvania",
                        "39"=>"Rhode Island",
                        "40"=>"South Carolina",
                        "41"=>"South Dakota",
                        "42"=>"Tennessee",
                        "43"=>"Texas",
                        "44"=>"Utah",
                        "45"=>"Virginia",
                        "46"=>"Vermont",
                        "47"=>"Washington",
                        "49"=>"Wisconsin",
                        "48"=>"West Virginia",
                        "50"=>"Wyoming"
            ];

    public static function GetStateId($name){
        return array_search($name,  self::$states);
    }
}