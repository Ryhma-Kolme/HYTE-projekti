<div class="row-buttons">
    <button onclick="document.location = 'aamiainen.php'">Aamiainen</button>
    <button onclick="document.location = 'lounas.php'">Lounas</button>
    <button onclick="document.location = 'välipala.php'">Välipala</button>
    <button onclick="document.location = 'päivällinen.php'">Päivällinen</button>
    <button onclick="document.location = 'iltapala.php'">Iltapala</button>
</div>

<div class="row">
    <div class="column">
        <div class="blue-title">
            <h3>Tämän päivän ruoat</h3>
        </div>

        <?php // userID lisäys 
            $currentUserID = $_SESSION['suserID'];
            $clickedDay = $_SESSION['valittu']; // haetaan valittu päivä
        ?>      

        <?php // Taulukko kaikille aterioille
            echo("  
                <table style='border:0; margin:0;'>
                <tr class='laptop'>
                    <th>Ruokailu</th>
                    <th>Määrä yht.</th>
                    <th>Kalorit yht.</th>
                    <th>Rasvat yht.</th>
                    <th>Hiilihydraatit yht.</th>
                    <th>Proteiinit yht.</th>
                </tr>
            ");
        ?>
                    
        <?php // Aamiainen       
            // Lasketaan tämän päivän lisättyjen ruoka-aineiden määärä SQL:stä ja kalorien jne summat
            $sql="SELECT COUNT(foodName), SUM(quantity), SUM(calories), SUM(fat), SUM(carbohydrates), SUM(proteins)
            FROM app_breakfast
            WHERE DATE(`timeOfEating`) = '$clickedDay' AND userID = '$currentUserID';";
            $kysely=$DBH->prepare($sql);				
            $kysely->execute();
            $row=$kysely->fetch();
                
            // Lisätään alkuperäinen määrä muuttujaan
            $bretotalQ = $row["SUM(quantity)"]; 
            $bretotal = $row['COUNT(foodName)'];
            $bretotalC = $row["SUM(calories)"]; 
            $bretotalF = $row["SUM(fat)"]; 
            $bretotalCh = $row["SUM(carbohydrates)"]; 
            $bretotalP = $row["SUM(proteins)"]; 

            //Suoritetaan kysely uudestaan
            $kysely=$DBH->prepare($sql);				
            $kysely->execute();

            // Jos ateriaan ei ole vielä lisätty mitään 
            if ($bretotal==0){
            ?>
            <tr class='laptop'>               
                <th>Aamiainen</th>
                <td class="lisaa">
                    <button class="plus" onclick="window.location.href = 'aamiainen.php'">+</button>    
                    <p>Et ole vielä lisännyt aamiaista</p>
                </td>
            </tr>

            <tr class="mobile">
                <th colspan='3' class='ateria-th'>Aamiainen</th>
                <td class="respo"><button class="plus" onclick="window.location.href = 'aamiainen.php'">Lisää</button></td>
            </tr>
            <?php
            } else {

            //Jos ateriaan on lisätty joku/joitain ruoka-aineita luodaan taulukko
                while	($row=$kysely->fetch()){	
                    echo("
                        <tr class='laptop'>               
                            <th>Aamiainen".$row[""]."</th>
                            <td>".$row['SUM(quantity)']." g</td>
                            <td>".$row['SUM(calories)']." kcal</td>
                            <td>".$row['SUM(fat)']." g</td>
                            <td>".$row['SUM(carbohydrates)']." g</td>
                            <td>".$row['SUM(proteins)']." g</td>
                        </tr>

                        <tr class='mobile'>
                            <th colspan='4' class='ateria-th'>Aamiainen</th>
                        </tr>
                        <tr class='mobile'>
                            <th>Kalorit</th>
                            <th>Hiilihydraatit</th>
                            <th>Rasvat</th>
                            <th>Proteiinit</th>
                        </tr>
                        <tr class='mobile'>
                            <td>".$row['SUM(calories)']." kcal</td>
                            <td>".$row['SUM(carbohydrates)']." g</td>
                            <td>".$row['SUM(fat)']." g</td>
                            <td>".$row['SUM(proteins)']." g</td>
                        </tr>
                    ");
                }
            }
        ?>        
                
        <?php // Lounas
            // Lasketaan tämän päivän lisättyjen ruoka-aineiden määärä SQL:stä ja kalorien jne summat
            $sql="SELECT COUNT(foodName), SUM(quantity), SUM(calories), SUM(fat), SUM(carbohydrates), SUM(proteins)
            FROM app_lunch
            WHERE DATE(`timeOfEating`) = '$clickedDay' AND userID = '$currentUserID';";
            $kysely=$DBH->prepare($sql);				
            $kysely->execute();
            $row=$kysely->fetch();

            // Lisätään alkuperäinen määrä muuttujaan
            $lunchtotalQ = $row["SUM(quantity)"]; 
            $lunchtotal = $row['COUNT(foodName)'];
            $lunchtotalC = $row["SUM(calories)"]; 
            $lunchtotalF = $row["SUM(fat)"]; 
            $lunchtotalCh = $row["SUM(carbohydrates)"]; 
            $lunchtotalP = $row["SUM(proteins)"]; 
            // Suoritetaan kysely uudelleen
            $kysely=$DBH->prepare($sql);				
            $kysely->execute();

            // Jos ateriaan ei ole vielä lisätty mitään 
            if ($lunchtotal==0){
            ?>
            <tr class='laptop'>               
                <th>Lounas</th>
                <td class="lisaa">
                    <button class="plus" onclick="window.location.href = 'lounas.php'">+</button>    
                    <p>Et ole vielä lisännyt lounasta</p>
                </td>
            </tr>
            <tr class='mobile'>
                <th colspan='3' class='ateria-th'>Lounas</th>
                <td class="respo">
                    <button class="plus" onclick="window.location.href = 'lounas.php'">Lisää</button>
                </td>
            </tr>
            <?php
            } else {
            //Jos ateriaan on lisätty joku/joitain ruoka-aineita luodaan taulukko
                while	($row=$kysely->fetch()){	    
                echo("
                    <tr class='laptop'>               
                        <th>Lounas</th>
                        <td>".$row['SUM(quantity)']." g</td>
                        <td>".$row['SUM(calories)']." kcal</td>
                        <td>".$row['SUM(fat)']." g</td>
                        <td>".$row['SUM(carbohydrates)']." g</td>
                        <td>".$row['SUM(proteins)']." g</td>
                    </tr>

                    <tr class='mobile'>
                        <th colspan='4' class='ateria-th'>Lounas</th>
                    </tr>
                    <tr class='mobile'>
                        <th>Kalorit</th>
                        <th>Hiilihydraatit</th>
                        <th>Rasvat</th>
                        <th>Proteiinit</th>
                    </tr>
                    <tr class='mobile'>
                        <td>".$row['SUM(calories)']." kcal</td>
                        <td>".$row['SUM(carbohydrates)']." g</td>
                        <td>".$row['SUM(fat)']." g</td>
                        <td>".$row['SUM(proteins)']." g</td>
                    </tr>
                    ");
                }
            }
        ?>     
                
        <?php // Välipala
            // Lasketaan tämän päivän lisättyjen ruoka-aineiden määärä SQL:stä ja kalorien jne summat
            $sql="SELECT COUNT(foodName), SUM(quantity), SUM(calories), SUM(fat), SUM(carbohydrates), SUM(proteins)
            FROM app_snacks
            WHERE DATE(`timeOfEating`) = '$clickedDay' AND userID = '$currentUserID';";
            $kysely=$DBH->prepare($sql);				
            $kysely->execute();
            $row=$kysely->fetch();
                
            // Lisätään alkuperäinen määrä muuttujaan
            $sntotalQ = $row["SUM(quantity)"]; 
            $sntotal = $row['COUNT(foodName)'];
            $sntotalC = $row["SUM(calories)"]; 
            $sntotalF = $row["SUM(fat)"]; 
            $sntotalCh = $row["SUM(carbohydrates)"]; 
            $sntotalP = $row["SUM(proteins)"]; 

            // Suoritetaan kysely uudelleen
            $kysely=$DBH->prepare($sql);				
            $kysely->execute();

            // Jos ateriaan ei ole vielä lisätty mitään 
            if ($sntotal==0){
            ?>
            <tr class="laptop">               
                <th>Välipala</th>
                <td class="lisaa">
                    <button class="plus" onclick="window.location.href = 'välipala.php'">+</button>    
                    <p>Et ole vielä lisännyt välipalaa</p>
                </td>
            </tr>

            <tr class="mobile">
                <th colspan='3' class='ateria-th'>Välipala</th>
                <td class="respo">
                    <button class="plus" onclick="window.location.href = 'välipala.php'">Lisää</button>
                </td>
            </tr>
            <?php
            } else {

            //Jos ateriaan on lisätty joku/joitain ruoka-aineita luodaan taulukko
                while	($row=$kysely->fetch()){	
                    echo("
                        <tr class='laptop'>               
                            <th>Välipala</th>
                            <td>".$row['SUM(quantity)']." g</td>
                            <td>".$row['SUM(calories)']." kcal</td>
                            <td>".$row['SUM(fat)']." g</td>
                            <td>".$row['SUM(carbohydrates)']." g</td>
                            <td>".$row['SUM(proteins)']." g</td>
                        </tr>
                        
                        <tr class='mobile'>
                        <th colspan='4' class='ateria-th'>Välipala</th>
                        </tr>
                        <tr class='mobile'>
                            <th>Kalorit</th>
                            <th>Hiilihydraatit</th>
                            <th>Rasvat</th>
                            <th>Proteiinit</th>
                        </tr>
                        <tr class='mobile'>
                            <td>".$row['SUM(calories)']." kcal</td>
                            <td>".$row['SUM(carbohydrates)']." g</td>
                            <td>".$row['SUM(fat)']." g</td>
                            <td>".$row['SUM(proteins)']." g</td>
                        </tr>
                    ");
                }
            }
        ?>     
                            
        <?php // Päivällinen
            // Lasketaan tämän päivän lisättyjen ruoka-aineiden määärä SQL:stä ja kalorien jne summat
            $sql="SELECT COUNT(foodName), SUM(quantity), SUM(calories), SUM(fat), SUM(carbohydrates), SUM(proteins)
            FROM app_dinner
            WHERE DATE(`timeOfEating`) = '$clickedDay' AND userID = '$currentUserID';";
            $kysely=$DBH->prepare($sql);				
            $kysely->execute();
            $row=$kysely->fetch();
                
            // Lisätään alkuperäinen määrä muuttujaan
            $dintotalQ = $row["SUM(quantity)"]; 
            $dintotal = $row['COUNT(foodName)'];
            $dintotalC = $row["SUM(calories)"]; 
            $dintotalF = $row["SUM(fat)"]; 
            $dintotalCh = $row["SUM(carbohydrates)"]; 
            $dintotalP = $row["SUM(proteins)"]; 


            // Suoritetaan kysely uudelleen
            $kysely=$DBH->prepare($sql);				
            $kysely->execute();

            // Jos ateriaan ei ole vielä lisätty mitään 
            if ($dintotal==0){
            ?>
            <tr class="laptop">               
                <th>Päivällinen</th>
                <td class="lisaa">
                    <button class="plus" onclick="window.location.href = 'päivällinen.php'">+</button>    
                    <p>Et ole vielä lisännyt päivällistä</p>
                </td>
            </tr>
            <tr class="mobile">
                <th colspan='3' class='ateria-th'>Päivällinen</th>
                <td class="respo">
                    <button class="plus" onclick="window.location.href = 'päivällinen.php'">Lisää</button>
                </td>
            </tr>
            <?php
            } else {
            //Jos ateriaan on lisätty joku/joitain ruoka-aineita luodaan taulukko
                while	($row=$kysely->fetch()){	
                    echo("
                        <tr class='laptop'>               
                            <th>Päivällinen</th>
                            <td>".$row['SUM(quantity)']." g</td>
                            <td>".$row['SUM(calories)']." kcal</td>
                            <td>".$row['SUM(fat)']." g</td>
                            <td>".$row['SUM(carbohydrates)']." g</td>
                            <td>".$row['SUM(proteins)']." g</td>
                        </tr>

                        <tr class='mobile'>
                        <th colspan='4' class='ateria-th'>Päivällinen</th>
                        </tr>
                        <tr class='mobile'>
                            <th>Kalorit</th>
                            <th>Hiilihydraatit</th>
                            <th>Rasvat</th>
                            <th>Proteiinit</th>
                        </tr>
                        <tr class='mobile'>
                            <td>".$row['SUM(calories)']." kcal</td>
                            <td>".$row['SUM(carbohydrates)']." g</td>
                            <td>".$row['SUM(fat)']." g</td>
                            <td>".$row['SUM(proteins)']." g</td>
                        </tr>
                    ");
                }
            }
        ?>     

        <?php // Iltapala
            // Lasketaan tämän päivän lisättyjen ruoka-aineiden määärä SQL:stä ja kalorien jne summat
            $sql="SELECT COUNT(foodName), SUM(quantity), SUM(calories), SUM(fat), SUM(carbohydrates), SUM(proteins)
            FROM app_eveningmeal
            WHERE DATE(`timeOfEating`) = '$clickedDay' AND userID = '$currentUserID';";
            $kysely=$DBH->prepare($sql);				
            $kysely->execute();
            $row=$kysely->fetch();
                
            // Lisätään alkuperäinen määrä muuttujaan
            $emtotalQ = $row["SUM(quantity)"]; 
            $emtotal = $row['COUNT(foodName)'];
            $emtotalC = $row["SUM(calories)"]; 
            $emtotalF = $row["SUM(fat)"]; 
            $emtotalCh = $row["SUM(carbohydrates)"]; 
            $emtotalP = $row["SUM(proteins)"]; 

            // Suoritetaan kysely uudelleen
            $kysely=$DBH->prepare($sql);				
            $kysely->execute();

            // Jos ateriaan ei ole vielä lisätty mitään 
            if ($emtotal==0){
            ?>
            <tr class="laptop">               
                <th>Iltapala</th>
                <td class="lisaa">
                    <button class="plus" onclick="window.location.href = 'iltapala.php'">+</button>    
                    <p>Et ole vielä lisännyt iltapalaa</p>
                </td>
            </tr>
            <tr class="mobile">
                <th colspan='3' class='ateria-th'>Iltapala</th>
                <td class="respo">
                    <button class="plus" onclick="window.location.href = 'iltapala.php'">Lisää</button>
                </td>
            </tr>
            <?php
            } else {
                //Jos ateriaan on lisätty joku/joitain ruoka-aineita luodaan taulukko
                while($row=$kysely->fetch()){	
                    echo("
                        <tr class='laptop'>               
                            <th>Iltapala</th>
                            <td>".$row['SUM(quantity)']." g</td>
                            <td>".$row['SUM(calories)']." kcal</td>
                            <td>".$row['SUM(fat)']." g</td>
                            <td>".$row['SUM(carbohydrates)']." g</td>
                            <td>".$row['SUM(proteins)']." g</td>
                        </tr>

                        <tr class='mobile'>
                        <th colspan='4' class='ateria-th'>Iltapala</th>
                        </tr>
                        <tr class='mobile'>
                            <th>Kalorit</th>
                            <th>Hiilihydraatit</th>
                            <th>Rasvat</th>
                            <th>Proteiinit</th>
                        </tr>
                        <tr class='mobile'>
                            <td>".$row['SUM(calories)']." kcal</td>
                            <td>".$row['SUM(carbohydrates)']." g</td>
                            <td>".$row['SUM(fat)']." g</td>
                            <td>".$row['SUM(proteins)']." g</td>
                        </tr>
                    ");
                }
            }                              
        ?>  

        <?php // Yhteenveto

            // Luodaan muuttujat joissa lasketaan yhteen kaikki

            // Ruoka-aineita yhteensä
            $foodstotal = $bretotal + $lunchtotal + $dintotal + $sntotal + $emtotal;
            // Kaloreita yhteensä
            $caloriestotal = $bretotalC + $lunchtotalC + $dintotalC + $sntotalC + $emtotalC;
            // Grammoja yhteensä
            $quanttotal = $bretotalQ + $lunchtotalQ + $dintotalQ + $sntotalQ + $emtotalQ;
            // Rasvaa yhteensä
            $fatstotal = $bretotalF + $lunchtotalF + $dintotalF + $sntotalF + $emtotalF;
            // Hiilihydraatteja yhteensä
            $chtotal = $bretotalCh + $lunchtotalCh + $dintotalCh + $sntotalCh + $emtotalCh;
            // Proteiinia yhteensä
            $proteinstotal = $bretotalP + $lunchtotalP + $dintotalP + $sntotalP + $emtotalP;

            // Luodaan taulukko jossa on yhteenveto kaikista ravintomääristä 
            echo("
                <tr class='laptop'>
                    <th>Yhteenveto</th>
                    <td>".$quanttotal." g</td>
                    <td>".$caloriestotal." kcal</td>
                    <td>".$fatstotal." g</td>
                    <td>".$chtotal." g</td>
                    <td>".$proteinstotal." g</td>
                </tr>

                <tr class='mobile'>
                <th colspan='4' class='ateria-th'>Yhteensä</th>
                </tr>
                <tr class='mobile'>
                    <th>Kalorit</th>
                    <th>Hiilihydraatit</th>
                    <th>Rasvat</th>
                    <th>Proteiinit</th>
                </tr>
                <tr class='mobile'>
                    <td>".$caloriestotal." kcal</td>
                    <td>".$chtotal." g</td>
                    <td>".$fatstotal." g</td>
                    <td>".$proteinstotal." g</td>
                </tr>
                </table>
            ");
        ?>
    </div>
</div>