
<?php

include 'caseName.php';

$caseId = mysqli_fetch_array(mysqli_query($conn, 
    "SELECT case_id FROM cases WHERE case_name = '$caseName'"))[0];

$result = mysqli_query($conn, 
    "SELECT s.weapon,s.weapon_skin,s.FactoryNew,s.MinimalWear,s.FieldTested,s.WellWorm,s.BattleScared,s.FactoryNewSt,s.MinimalWearSt,s.FieldTestedSt,s.WellWormSt,s.BattleScaredSt,
    o.minFloat,o.maxFloat,o.FactoryNewO,o.MinimalWearO,o.FieldTestedO,o.WellWormO,o.BattleScaredO 
    FROM skins s JOIN odds o ON s.odds = o.odds_id 
    WHERE case_id = '$caseId'");

$numSkins = 0;
$i = 0;
    while($row = $result->fetch_assoc()) {

        ++$i;
        $class = '';

        if($i == 1){ 
            $class = "active";
        };


        echo '<div class="img-text '.$class.'">
                <img src="images/'.$caseFolder.'/'.$i.'.png" alt="">
                <div class="text">
                    <div class="ime">
                        <h2>'.$row['weapon'].' | '.$row['weapon_skin'].'</h2>
                    </div>

                    <div class="tabela">
                        <table>
                            <tr>
                                <th></th>
                                <th>Price</th>
                                <th>StatTrack Price</th>
                                <th>Odds</th>
                            </tr>
                            <tr>
                                <th>Factory New</th>
                                <td>$'.$row['FactoryNew'].'</td>
                                <td>$'.$row['FactoryNewSt'].'</td>
                                <td>'.($row['FactoryNewO']*100).'%</td>
                            </tr>
                            <tr>
                                <th>Minimal Wear</th>
                                <td>$'.$row['MinimalWear'].'</td>
                                <td>$'.$row['MinimalWearSt'].'</td>
                                <td>'.($row['MinimalWearO']*100).'%</td>
                            </tr>
                            <tr>
                                <th>Field-Tested</th>
                                <td>$'.$row['FieldTested'].'</td>
                                <td>$'.$row['FieldTestedSt'].'</td>
                                <td>'.($row['FieldTestedO']*100).'%</td>
                            </tr>
                            <tr>
                                <th>Well Worm</th>
                                <td>$'.$row['WellWorm'].'</td>
                                <td>$'.$row['WellWormSt'].'</td>
                                <td>'.($row['WellWormO']*100).'%</td>
                            </tr>
                            <tr>
                                <th>Battle Scared</th>
                                <td>$'.$row['BattleScared'].'</td>
                                <td>$'.$row['BattleScaredSt'].'</td>
                                <td>'.($row['BattleScaredO']*100).'%</td>
                            </tr>
                    </table>
                    <p> Float : <b>'.$row['minFloat'].' - '.$row['maxFloat'].'</b></p>
                
                    </div>
                </div>                
            </div>';
    };


    
?>