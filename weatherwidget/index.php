<?php
/**
 * Created by PhpStorm.
 * User: shane
 * Date: 16/08/2017
 * Time: 08:39
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(!isset($_SESSION))
{
    session_start();
}

//print_r($_SESSION);
$locationTest ="not Set";
$city = null;
$temperature = null;
$icon = null;
$airPressure = null;
$wind = null;
$direction = null;
$city = null;


require 'model/weatherModel.php';


?>


<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php
require 'includes/header.php';
require 'includes/body.php';
require 'includes/footer.php';
require 'includes/scripts.php';



?>





</body>
<!-- //Body -->


</html>

