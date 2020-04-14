<?php // Luodaan taulukko johon syötetään arvot 

echo("
<table>
  <tr>
    <th>Ruoka-aine</th>
    <th>Määrä</th>
    <th>Kalorit</th>
    <th>Rasva</th>
    <th>Hiilihydraatit</th>
    <th>Proteiinit</th>
    <th>Lisätty</th>
  </tr>
");

while	($row=$kysely->fetch()){	
    echo("
      <tr>
        <td>".$row["foodName"]."</td>
        <td>".$row["quantity"]."g</td>
        <td>".$row["calories"]."kcal</td>
        <td>".$row["fat"]."g</td>
        <td>".$row["carbohydrates"]."g</td>
        <td>".$row["proteins"]."g</td>
        <td>".$row["timeOfEating"]."</td>
      </tr>
    ");
  }

  echo("
  </table>
  ");
  ?>