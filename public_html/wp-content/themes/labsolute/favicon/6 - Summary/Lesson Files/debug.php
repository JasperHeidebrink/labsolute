<h1>Vraag</h1>
<ul>
    <li>Op deze pagina wil ik graag een lijst met namen weergegeven.</li>
    <li>Ik heb alleen een paar problemen met het gebruik van quotes en variabelen.</li>
    <li>Kunnen jullie mij helpen?</li>
</ul>
<?php
	
$namenArray = ['naam1'=>'Jasper', 'naam2'=>'bert', "naam3"=>"kees", "naam4"=>"ernie"];

echo $namenArray['naam1'];
echo '<br>"\n"';

echo $namenArray['naam2'];
echo '<br>' . "\n";

echo $namenArray['naam3'];
echo "<br>\"\n";

echo $namenArray['ernie'];
echo "<br>" . "\n";

echo 'regel ." __LINE__ . " is laatste regel";
?>



