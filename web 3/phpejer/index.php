<?php
function hora_inversa($hora, $minutos) {
    $hora = $hora % 12;
    $hora_opuesta = ($hora + 6) % 12;
    if ($hora_opuesta == 0) {
        $hora_opuesta = 12;
    }
    return array($hora_opuesta, $minutos);
}

$resultado = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $h = (int)$_POST['hora'];
    $m = (int)$_POST['minutos'];
    if ($h < 0 || $h > 23 || $m < 0 || $m > 59) {
        $resultado = 'Datos inválidos';
    } else {
        // invertir hora sobre 12: 1->11, 2->10, etc.
        $h12 = $h % 12;
        $inv_h = 12 - $h12;
        if ($inv_h == 0) $inv_h = 12;
        // invertir minutos sobre 60
        $inv_m = 60 - $m;
        if ($inv_m == 60) $inv_m = 0;
        $resultado = 'Hora inversa: ' . $inv_h . ':' . ($inv_m < 10 ? '0'.$inv_m : $inv_m);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hora inversa - PHP</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; margin:0; padding:20px; }
        h1 { color:#333; }
        form { background:#fff; padding:15px; border-radius:5px; box-shadow:0 0 10px rgba(0,0,0,.1); max-width:300px; }
        label { display:block; margin-bottom:8px; }
        input { width:100%; padding:5px; box-sizing:border-box; margin-top:2px; }
        button { margin-top:10px; padding:8px 12px; background:#4CAF50; color:#fff; border:none; border-radius:3px; cursor:pointer; }
        button:hover { background:#45a049; }
        #resultado { margin-top:15px; font-weight:bold; }
    </style>
</head>
<body>
    <h1>Calculadora de hora inversa (PHP)</h1>
    <form method="post" action="">
        <label>Hora (0-23): <input type="number" name="hora" min="0" max="23" required></label><br>
        <label>Minutos (0-59): <input type="number" name="minutos" min="0" max="59" required></label><br>
        <button type="submit">Calcular</button>
    </form>
    <?php echo $resultado; ?>
</body>
</html>