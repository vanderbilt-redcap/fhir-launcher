<?php
namespace REDCap\FhirLauncher;
use REDCap\FhirLauncher\App\Launcher;
/**
 * PLUGIN NAME: Name Of The Plugin
 * DESCRIPTION: A brief description of the Plugin.
 * VERSION: The Plugin's Version Number, e.g.: 1.0
 * AUTHOR: Name Of The Plugin Author
 */

// Call the REDCap Connect file in the main "redcap" directory
require_once "../../redcap_connect.php";
require_once "vendor/autoload.php";



// OPTIONAL: Display the header
$HtmlPage = new \HtmlPage();
$HtmlPage->PrintHeaderExt();

$launcher = new Launcher();

$urls = $launcher->getConformanceUrls();

// Your HTML page content goes here
?>
<h3 style="color:#800000;">
	FHIR Standalone Launch
</h3>
<p>
	<a href="/standalone-launch.php" target="_BLANK">launch</a>
	<?php var_dump($urls) ?>
</p>
<?php

// OPTIONAL: Display the footer
$HtmlPage->PrintFooterExt();