<?php
function prev_page($prev){
    echo '<header class=button><div><a href="'.$prev.'.php"><span class="material-symbols-outlined">keyboard_backspace</span></a></div></header>';
}

function next_page($next){
    echo '<footer><a href="'.$next.'.php"><p>Suivant</p><span class="material-symbols-outlined">arrow_right_alt</span></a></footer>';
}
?>
