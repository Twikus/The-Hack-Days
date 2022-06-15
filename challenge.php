<?php
require 'inc/head.php';
require 'inc/lib_crud.inc.php';

/*-----Données-----*/
$next='challenge_verif';
if (empty($_SESSION['challenges_names'])){
    $_SESSION['challenges_names']=array('groupe_defi_1' => 'Le Cr’Hack du Dev',
                                        'groupe_defi_2' => 'Hack n’ Snap', 
                                        'groupe_defi_3' => 'Wall Hack', 
                                        'groupe_defi_4' => 'Tr’Hack It !');
}
/*-----Données-----*/

echo '
<form method="GET" action="inc/'.$next.'.php" name="form" enctype="multipart/form-data">
<main>
    <section>
        <h1>Sélectionne le défi :</h1>
        <select name="challenge" placeholder="Sélection du défi" id="challenge">';
            foreach($_SESSION['challenges_names'] as $key => $value){
                echo '<option value="'.$key.'">'.$value.'</option>';
            }
        echo'
        </select>
        </section>

    <section>
        <h1>La clé du défi :</h1>
        <input type="text" name="response" id="response" placeholder="La clé">';
        if (!empty($_SESSION['second_error'])) {
            echo $_SESSION['second_error'];
            unset ($_SESSION['second_error']);
        }
        echo'
    </section>
</main>';

nextpage_form();
echo '</form>';

require 'inc/end.php';