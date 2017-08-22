<?php
/**
 * Created by PhpStorm.
 * User: shane
 * Date: 21/08/2017
 * Time: 11:02
 */
$appID = "2457a1a06421272ba3217d68bf4f47fa"; // sets the api key
echo "hello world2";
echo "var dumping";

$overcast = new \vender\VertigoLabs\Overcast\Overcast('2457a1a06421272ba3217d68bf4f47fa');
$forecast = $overcast->getForecast(37.8267,-122.423);
// check the number of API calls you've made with your API key for today
echo "var dumping";
var_dump($forecast);
echo $overcast->getApiCalls().' API Calls Today'."\n";


// temperature current information
echo 'Current Temp: '.$forecast->getCurrently()->getTemperature()->getCurrent()."\n";
echo 'Feels Like: '.$forecast->getCurrently()->getApparentTemperature()->getCurrent()."\n";
echo 'Min Temp: '.$forecast->getCurrently()->getTemperature()->getMin()."\n";
echo 'Max Temp: '.$forecast->getCurrently()->getTemperature()->getMax()."\n";