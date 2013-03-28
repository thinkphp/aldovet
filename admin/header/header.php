<?php

    $config['menu'] = array("Home","Despre noi","Servicii","Ce sa aduceti","IP Table","Sign Out");

?>
<ul class="meta">
  <li><a href="index.php"><?php echo$config['menu'][0];?></a></li>
  <li><a href="about/"><?php echo$config['menu'][1];?></a></li>
  <li><a href="services/"><?php echo$config['menu'][2];?></a></li>
  <li><a href="bring/"><?php echo$config['menu'][3];?></a></li>
  <li><a href="iptable/"><?php echo$config['menu'][4];?></a></li>
  <li><a href="logout.php"><?php echo$config['menu'][5];?></a></li>
</ul>
