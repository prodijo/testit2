<?php
// --- Shuffle-versio ---
$numerot = range(1, 40);
shuffle($numerot);
$rivi_shuffle = array_slice($numerot, 0, 7);
sort($rivi_shuffle);

// --- Rand-versio ---
$rivi_rand = [];
while (count($rivi_rand) < 7) {
    $luku = rand(1, 40);
    if (!in_array($luku, $rivi_rand)) {
        $rivi_rand[] = $luku;
    }
}
sort($rivi_rand);
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Lotto vertailu</title></head>
<body>
<h2>Shuffle-versio</h2>
<table border="1" cellpadding="5">
  <tr>
    <?php foreach ($rivi_shuffle as $n): ?>
      <td><?php echo $n; ?></td>
    <?php endforeach; ?>
  </tr>
</table>

<h2>Rand-versio</h2>
<table border="1" cellpadding="5">
  <tr>
    <?php foreach ($rivi_rand as $n): ?>
      <td><?php echo $n; ?></td>
    <?php endforeach; ?>
  </tr>
</table>
</body>
</html>