<!-- Luodaan taulukko johon syötetään arvot  -->
<table lang="fi">
  <tr>
    <th>Ruoka-aine</th>
    <th>Määrä</th>
    <th>Kalorit</th>
    <th>Rasva</th>
    <th>Hiilihydraatit</th>
    <th>Proteiinit</th>
  </tr>
<?php
while	($row=$kysely->fetch()){	
  echo("
    <tr>
      <td>".$row["foodName"]."</td>
      <td>".$row["quantity"]." g</td>
      <td>".$row["calories"]." kcal</td>
      <td>".$row["fat"]." g</td>
      <td>".$row["carbohydrates"]." g</td>
      <td>".$row["proteins"]." g</td>
    </tr>
  ");
}
?>
</table>