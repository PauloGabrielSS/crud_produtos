<?php
function dump($data, $title="", $background="#EEEEEE", $color="#000000"){
    $style = "background-color: ".$background."; color: ".$color."; font-family: monospace; font-size: 12px; text-align: left; padding: 5px; margin:2px; border: 1px solid #CCCCCC;";
    echo "<pre style='".$style."'>";
    if($title != "") echo "<h2>".$title."</h2>";
    print_r($data);
    echo "</pre>";
}
?>