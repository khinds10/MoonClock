<?php
/**
 * Sun and Solstice class for moon clock project
 **/
class Sun {
	
    public $equinoxSolsticeDates = array (
        2018 => array ('Mar 20 12:15 pm EDT', 'Jun 21 6:07 am EDT','Sep 22 9:54 pm EDT', 'Dec 21 5:22 pm EST'),
        2019 => array ('Mar 20 5:58 pm EDT', 'Jun 21 11:54 am EDT','Sep 23 3:50 am EDT', 'Dec 21 11:19 pm EST'),
        2020 => array ('Mar 19 11:49 pm EDT','Jun 20 5:43 pm EDT', 'Sep 22 9:30 am EDT', 'Dec 21 5:02 am EST'),
        2021 => array ('Mar 20 5:37 am EDT', 'Jun 20 11:32 pm EDT','Sep 22 3:21 pm EDT', 'Dec 21 10:59 am EST'),
        2022 => array ('Mar 20 11:33 am EDT','Jun 21 5:13 am EDT', 'Sep 22 9:03 pm EDT', 'Dec 21 4:48 pm EST'),
        2023 => array ('Mar 20 5:24 pm EDT', 'Jun 21 10:57 am EDT','Sep 23 2:50 am EDT', 'Dec 21 10:27 pm EST'),
        2024 => array ('Mar 19 11:06 pm EDT','Jun 20 4:50 pm EDT', 'Sep 22 8:43 am EDT', 'Dec 21 4:20 am EST'),
        2025 => array ('Mar 20 5:01 am EDT', 'Jun 20 10:42 pm EDT','Sep 22 2:19 pm EDT', 'Dec 21 10:03 am EST'),
        2026 => array ('Mar 20 10:45 am EDT','Jun 21 4:24 am EDT', 'Sep 22 8:05 pm EDT', 'Dec 21 3:50 pm EST'),
        2027 => array ('Mar 20 4:24 pm EDT', 'Jun 21 10:10 am EDT','Sep 23 2:01 am EDT', 'Dec 21 9:42 pm EST'),
        2028 => array ('Mar 19 10:17 pm EDT','Jun 20 4:01 pm EDT', 'Sep 22 7:45 am EDT', 'Dec 21 3:19 am EST'),
        2029 => array ('Mar 20 4:02 am EDT', 'Jun 20 9:48 pm EDT', 'Sep 22 1:38 pm EDT', 'Dec 21 9:14 am EST'),
        2030 => array ('Mar 20 9:51 am EDT', 'Jun 21 3:31 am EDT', 'Sep 22 7:26 pm EDT', 'Dec 21 3:09 pm EST'),
        2031 => array ('Mar 20 3:41 pm EDT', 'Jun 21 9:17 am EDT', 'Sep 23 1:15 am EDT', 'Dec 21 8:55 pm EST'),
        2032 => array ('Mar 19 9:21 pm EDT', 'Jun 20 3:08 pm EDT', 'Sep 22 7:10 am EDT', 'Dec 21 2:55 am EST'),
        2033 => array ('Mar 20 3:22 am EDT', 'Jun 20 9:01 pm EDT', 'Sep 22 12:51 pm EDT','Dec 21 8:45 am EST'),
        2034 => array ('Mar 20 9:17 am EDT', 'Jun 21 2:44 am EDT', 'Sep 22 6:39 pm EDT', 'Dec 21 2:33 pm EST'),
        2035 => array ('Mar 20 3:02 pm EDT', 'Jun 21 8:33 am EDT', 'Sep 23 12:38 am EDT','Dec 21 8:30 pm EST'),
        2036 => array ('Mar 19 9:02 pm EDT', 'Jun 20 2:32 pm EDT', 'Sep 22 6:23 am EDT', 'Dec 21 2:12 am EST'),
        2037 => array ('Mar 20 2:50 am EDT', 'Jun 20 8:22 pm EDT', 'Sep 22 12:13 pm EDT','Dec 21 8:07 am EST'),
        2038 => array ('Mar 20 8:40 am EDT', 'Jun 21 2:09 am EDT', 'Sep 22 6:02 pm EDT', 'Dec 21 2:02 pm EST'),
        2039 => array ('Mar 20 2:31 pm EDT', 'Jun 21 7:57 am EDT', 'Sep 22 11:49 pm EDT','Dec 21 7:40 pm EST'),
        2040 => array ('Mar 19 8:11 pm EDT', 'Jun 20 1:46 pm EDT', 'Sep 22 5:44 am EDT', 'Dec 21 1:32 am EST'),
        2041 => array ('Mar 20 2:06 am EDT', 'Jun 20 7:35 pm EDT', 'Sep 22 11:26 am EDT','Dec 21 7:18 am EST'),
        2042 => array ('Mar 20 7:53 am EDT', 'Jun 21 1:15 am EDT', 'Sep 22 5:11 pm EDT', 'Dec 21 1:04 pm EST'),
        2043 => array ('Mar 20 1:27 pm EDT', 'Jun 21 6:58 am EDT', 'Sep 22 11:06 pm EDT','Dec 21 7:01 pm EST'),
        2044 => array ('Mar 19 7:20 pm EDT', 'Jun 20 12:51 pm EDT','Sep 22 4:47 am EDT', 'Dec 21 12:43 am EST'),
        2045 => array ('Mar 20 1:07 am EDT', 'Jun 20 6:33 pm EDT', 'Sep 22 10:32 am EDT','Dec 21 6:35 am EST'),
        2046 => array ('Mar 20 6:57 am EDT', 'Jun 21 12:14 am EDT','Sep 22 4:21 pm EDT', 'Dec 21 12:28 pm EST'),
        2047 => array ('Mar 20 12:52 pm EDT','Jun 21 6:03 am EDT', 'Sep 22 10:08 pm EDT','Dec 21 6:07 pm EST'),
        2048 => array ('Mar 19 6:33 pm EDT', 'Jun 20 11:53 am EDT','Sep 22 4:00 am EDT', 'Dec 21 12:02 am EST'),
        2049 => array ('Mar 20 12:28 am EDT','Jun 20 5:47 pm EDT', 'Sep 22 9:42 am EDT', 'Dec 21 5:52 am EST'));
	
	public $importantDateDaysleft;
	public $importantDateName;
	public $importantDateUnit;
	
	/**
	 * construct the solstice object assigning the next upcoming important date
	 */
	function __construct () {
        $rightNow = time();
        $upcomingImportantDate = $importantDateName = "";
        foreach ($this->equinoxSolsticeDates[date("Y")] as $importantDate) {
            if (strtotime($importantDate) >= $rightNow){
                $upcomingImportantDate = $importantDate;
                break;
            }
        }
        if (!empty($upcomingImportantDate)) {
            $this->importantDateUnit = 'day(s)';
            $this->importantDateDaysleft = round((((strtotime($upcomingImportantDate)-$rightNow)/24)/60)/60);
            if ($this->importantDateDaysleft > 13) {
                $this->importantDateUnit = 'week(s)';
                $this->importantDateDaysleft = round((((strtotime($upcomingImportantDate)-$rightNow)/24)/60)/60/7);
            }
            if (strpos($upcomingImportantDate, 'Mar') !== false) $this->importantDateName = 'Vernal Equinox';
            if (strpos($upcomingImportantDate, 'Jun') !== false) $this->importantDateName = 'Summer Solstice';
            if (strpos($upcomingImportantDate, 'Sep') !== false) $this->importantDateName = 'Autumnal Equinox';
            if (strpos($upcomingImportantDate, 'Dec') !== false) $this->importantDateName = 'Winter Solstice';
        }
	}
	
	/**
	 * remove any spaces for image links on homepage
	 */
	function getImportantDateImage() {
	    return preg_replace("/ /", "", $this->importantDateName);
	}
	
	/**
	 * get how earth currently looks from the sun
	 */
	function getEarthFromSun() {
    	return date('m')."-".date('d')."/".date('H')."/earth_sun.jpg";
	}	
}
