<?php 
 
  require_once'OpenWeather.php';

  $weather=new OpenWeather('03b4732dd5f5de0fbae180bc43d3f4a2');
  $forecast= $weather->getForecast('Abidjan,civ');

  var_dump($forecast);

?>

<?php /*
<div class="container"> 
      <ul>
          <?php foreach($forecast as $day): ?>
             <li> Date : <?= $day['date']->format('d/m/Y') ?> description : <?= $day['description'] ?>  Temperature : <?= $day['temp'] ?> °C  </li>
          <?php endforeach ?>
      </ul>
</div>

*/?>
