<?php
header("Content-Type: text/html; charset=ISO-8859-1", true); 
$maxNumKB = 4096;
$defNumKB = 1024;
if (!isset($_GET['numKB']) || intval($_GET['numKB']) > $maxNumKB)
{
    header("Location: http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}?numKB=$defNumKB");
}
$numKB = intval($_GET['numKB']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Velocimetro de Download</title>
<head>
    
    <style type="text/css">
    <!--
    html
    {
        font-family: sans-serif;
        color: #000;
        background: #fff;
    }
    *
    {
        font-size: medium;
    }
    #wait
    {
        border-bottom: thin dotted black;
    }
    #wait abbr
    {
        border: none;
    }
    #done
    {
        font-weight: bold;
    }
    #benchmark
    {
        padding: 1em;
        border: 1px solid black;
        background: #ffe;
        color: #000;
    }
    //-->
    </style>
</head>
<body>

<h1>Testando...</h1>
<p>

<p id="wait">Transferindo <?php echo $numKB; ?> <abbr title="kilobyte">KBs</abbr></p>
<!--
<?php
function getmicrotime()
{ 
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

flush();
$timeStart = getmicrotime();
$nlLength = strlen("\n");
for ($i = 0; $i < $numKB; $i++)
{
    echo str_pad('', 1024 - $nlLength, '/*\\*') . "\n";
    flush();
}
$timeEnd = getmicrotime();
$timeDiff = round($timeEnd - $timeStart, 3);
?>
-->
<p id="done">
    <?php
        echo "Transferido {$numKB} <abbr title=\"kilobyte\">KBs</abbr> em {$timeDiff} segundos, seu download é de: " . 
             ($timeDiff <= 1 ? "more than {$numKB}" : round($numKB / $timeDiff, 3)) . 
             ' <abbr title="kilobytes per second">KB/s</abbr>';
    ?>
</p>
</body>
</html>