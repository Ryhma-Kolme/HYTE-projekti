
<?php
// Luodaan taulukko johon syötetään arvot 
echo("
<table>
  <tr>
    <th>Ruoka-aineet yht.</th>
    <th>Määrä yht.</th>
    <th>Kalorit yht.</th>
    <th>Rasvat yht.</th>
    <th>Hiilihydraatit yht.</th>
    <th>Proteiinit yht.</th>
  </tr>
");

while	($row=$kysely->fetch()){	
  echo("
    <tr>
        <td>".$row['COUNT(foodName)']."kpl</td>
        <td>".$row['SUM(quantity)']."g</td>
        <td>".$row['SUM(calories)']."g</td>
        <td>".$row['SUM(fat)']."g</td>
        <td>".$row['SUM(carbohydrates)']."g</td>
        <td>".$row['SUM(proteins)']."g</td>
    </tr>
  ");
}

echo("
</table>
");


?>