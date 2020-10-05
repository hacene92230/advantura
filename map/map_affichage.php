<?php
if ($result['grade'] == 1)
{
    echo "x: ".$result['x'].'<br /> y:  '.$result['y']."<br />";
}
echo '<p><a href="../map/map_deplacement.php?id_perso='.$result['id'].'&amp;x='.$result['x'].'&amp;y='.$result['y'].'&amp;dirrection=nord">nord</a></p>';
echo '<p><a href="../map/map_deplacement.php?id_perso='.$result['id'].'&amp;x='.$result['x'].'&amp;y='.$result['y'].'&amp;dirrection=est">est</a></p>';
echo '<p><a href="../map/map_deplacement.php?id_perso='.$result['id'].'&amp;x='.$result['x'].'&amp;y='.$result['y'].'&amp;dirrection=ouest">ouest</a></p>';
echo '<p><a href="../map/map_deplacement.php?id_perso='.$result['id'].'&amp;x='.$result['x'].'&amp;y='.$result['y'].'&amp;dirrection=sud">sud</a></p>';
include "map_zone.php";
include "map_lieux.php";
?>