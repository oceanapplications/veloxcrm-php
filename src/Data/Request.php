<?php

namespace Oceanapplications\Veloxcrmphp\Data;


class Request
{

    public $OS;
    public $Browser;
    public $IPAddress;

    public function __construct()
    {
        if (!empty($_SERVER['HTTP_USER_AGENT']))
        {
            $this->Browser = $this->getBrowser();
            $this->OS = $this->getOS();
        }
        $this->IPAddress = $this->get_client_ip();

    }

    private function getOS()
    {
        try {
            $user_agent = $_SERVER['HTTP_USER_AGENT'];
            $os_platform = "Unknown OS Platform";
            $os_array = array(
                '/windows nt 10/i' => 'Windows 10',
                '/windows nt 6.3/i' => 'Windows 8.1',
                '/windows nt 6.2/i' => 'Windows 8',
                '/windows nt 6.1/i' => 'Windows 7',
                '/windows nt 6.0/i' => 'Windows Vista',
                '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
                '/windows nt 5.1/i' => 'Windows XP',
                '/windows xp/i' => 'Windows XP',
                '/windows nt 5.0/i' => 'Windows 2000',
                '/windows me/i' => 'Windows ME',
                '/win98/i' => 'Windows 98',
                '/win95/i' => 'Windows 95',
                '/win16/i' => 'Windows 3.11',
                '/macintosh|mac os x/i' => 'Mac OS X',
                '/mac_powerpc/i' => 'Mac OS 9',
                '/linux/i' => 'Linux',
                '/ubuntu/i' => 'Ubuntu',
                '/iphone/i' => 'iPhone',
                '/ipod/i' => 'iPod',
                '/ipad/i' => 'iPad',
                '/android/i' => 'Android',
                '/blackberry/i' => 'BlackBerry',
                '/webos/i' => 'Mobile'
            );
            foreach ($os_array as $regex => $value) {
                if (preg_match($regex, $user_agent)) {
                    $os_platform = $value;
                }
            }
        } catch (\Exception $e) {
            error_log($e->getMessage() . "#" . PHP_EOL);
        }
        return $os_platform;
    }

    private function getBrowser()
    {
        try {
            $user_agent = $_SERVER['HTTP_USER_AGENT'];
            $browser = "Unknown Browser";
            $browser_array = array(
                '/msie/i' => 'Internet Explorer',
                '/firefox/i' => 'Firefox',
                '/safari/i' => 'Safari',
                '/chrome/i' => 'Chrome',
                '/edge/i' => 'Edge',
                '/opera/i' => 'Opera',
                '/netscape/i' => 'Netscape',
                '/maxthon/i' => 'Maxthon',
                '/konqueror/i' => 'Konqueror',
                '/mobile/i' => 'Handheld Browser'
            );
            foreach ($browser_array as $regex => $value) {
                if (preg_match($regex, $user_agent)) {
                    $browser = $value;
                }
            }
        } catch (\Exception $e) {
            error_log($e->getMessage() . "#" . PHP_EOL);
        }
        return $browser;
    }

    private function get_client_ip()
    {
        $ipaddress = '';
        try {
            if (getenv('HTTP_CLIENT_IP'))
                $ipaddress = getenv('HTTP_CLIENT_IP');
            else if (getenv('HTTP_X_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
            else if (getenv('HTTP_X_FORWARDED'))
                $ipaddress = getenv('HTTP_X_FORWARDED');
            else if (getenv('HTTP_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_FORWARDED_FOR');
            else if (getenv('HTTP_FORWARDED'))
                $ipaddress = getenv('HTTP_FORWARDED');
            else if (getenv('REMOTE_ADDR'))
                $ipaddress = getenv('REMOTE_ADDR');
            else
                $ipaddress = 'UNKNOWN';
        } catch (\Exception $e) {
            error_log($e->getMessage() . "#" . PHP_EOL);
        }
        return $ipaddress;
    }

    public function getCardType($cardNumber){
        $detector = new \CardDetect\Detector();
        $type = $detector->detect($cardNumber);

        switch ($type){
            case("Visa"):
                return 1;
            case("Amex"):
                return 3;
            case("MasterCard"):
                return 2;
            case("Discover"):
                return 4;
        }
    }
}