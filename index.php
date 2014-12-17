<?

include "php/Mobile_Detect.php";

$detect = new Mobile_Detect();

if ($detect->isMobile() && !$detect->isTablet()) {
	include 'mobile.php';
} else if ($detect->isTablet()) {
	include 'mobile.php';
} else {
	include 'desktop.php';
}

?>
