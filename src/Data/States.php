<?php

namespace Oceanapplications\Veloxcrmphp\Data;

class States
{
    public static $states = [
            2	=>	["Alaska", "AK"],
            1	=>	["Alabama", "AL"],
            4	=>	["Arkansas", "AR"],
            3	=>	["Arizona", "AZ"],
            5	=>	["California", "CA"],
            6	=>	["Colorado", "CO"],
            7	=>	["Connecticut", "CT"],
            9	=>	["Washington DC", "DC"],
            8	=>	["Delaware		DE"],
            10	=>	["Florida", "FL"],
            11	=>	["Georgia", "GA"],
            12	=>	["Hawaii", "HI"],
            15	=>	["Iowa", "IA"],
            13	=>	["Idaho", "ID"],
            14	=>	["Illinois", "IL"],
            51	=>	["Indiana", "IN"],
            16	=>	["Kansas", "KS"],
            17	=>	["Kentucky", "KY"],
            18	=>	["Louisiana", "LA"],
            21	=>	["Massachusetts", "MA"],
            20	=>	["Maryland", "MD"],
            19	=>	["Maine", "ME"],
            22	=>	["Michigan", "MI"],
            23	=>	["Minnesota", "MN"],
            25	=>	["Missouri", "MO"],
            24	=>	["Mississippi", "MS"],
            26	=>	["Montana", "MT"],
            33	=>	["North Carolina", "NC"],
            34	=>	["North Dakota", "ND"],
            27	=>	["Nebraska", "NE"],
            29	=>	["New Hampshire", "NH"],
            30	=>	["New Jersey", "NJ"],
            31	=>	["New Mexico", "NM"],
            28	=>	["Nevada", "NV"],
            32	=>	["New York", "NY"],
            35	=>	["Ohio", "OH"],
            36	=>	["Oklahoma", "OK"],
            37	=>	["Oregon", "OR"],
            38	=>	["Pennsylvania", "PA"],
            39	=>	["Rhode Island", "RI"],
            40	=>	["South Carolina", "SC"],
            41	=>	["South Dakota", "SD"],
            42	=>	["Tennessee", "TN"],
            43	=>	["Texas", "TX"],
            44	=>	["Utah", "UT"],
            45	=>	["Virginia", "VA"],
            46	=>	["Vermont", "VT"],
            47	=>	["Washington", "WA"],
            49	=>	["Wisconsin", "WI"],
            48	=>	["West Virginia", "WV"],
            50	=>	["Wyoming", "WY"]
    ];

    public static function GetStateId($name){

        foreach (self::$states as $n=>$c) {
            if (in_array($name, $c)) {
                return $n;
            }
        }
        return false;
    }
}