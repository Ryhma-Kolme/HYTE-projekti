<!-- Luodaan taulukko johon syötetään arvot  -->
<table>
  <tr class="laptop">
    <th>Ruoka-aineet yht.</th>
    <th>Määrä yht.</th>
    <th>Kalorit yht.</th>
    <th>Rasvat yht.</th>
    <th>Hiilihydraatit yht.</th>
    <th>Proteiinit yht.</th>
  </tr>
  <tr class="mobile">
    <th>Kalorit yht.</th>
    <th>Rasvat yht.</th>
    <th>Hiilihydraatit yht.</th>
    <th>Proteiinit yht.</th>
  </tr>

<?php
while	($row=$kysely->fetch()){	
  echo("
    <tr class='laptop'>
        <td>".$row['COUNT(foodName)']." kpl</td>
        <td>".$row['SUM(quantity)']." g</td>
        <td>".$row['SUM(calories)']." kcal</td>
        <td>".$row['SUM(fat)']." g</td>
        <td>".$row['SUM(carbohydrates)']." g</td>
        <td>".$row['SUM(proteins)']." g</td>
    </tr>
    <tr class='mobile'>
        <td>".$row['SUM(calories)']." kcal</td>
        <td>".$row['SUM(fat)']." g</td>
        <td>".$row['SUM(carbohydrates)']." g</td>
        <td>".$row['SUM(proteins)']." g</td>
    </tr>
  ");
}
?>
</table>