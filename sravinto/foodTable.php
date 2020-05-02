<!-- Luodaan taulukko johon syötetään arvot  -->
<table lang="fi">
  <tr class="laptop">
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
    <tr class='laptop'>
      <td>".$row["foodName"]."</td>
      <td>".$row["quantity"]." g</td>
      <td>".$row["calories"]." kcal</td>
      <td>".$row["fat"]." g</td>
      <td>".$row["carbohydrates"]." g</td>
      <td>".$row["proteins"]." g</td>
    </tr>

    <tr class='mobile'>
      <th colspan='2'>Ruoka-aine</th>
      <th colspan='2'>Määrä</th>
    </tr>
    <tr class='mobile'>
      <td colspan='2'>".$row["foodName"]."</td>
      <td colspan='2'>".$row["quantity"]." g</td>
    </tr>
    <tr class='mobile'>
      <th>Kalorit</th>
      <th>Rasva</th>
      <th>Hiilihydraatit</th>
      <th>Proteiinit</th>
    </tr>
    <tr class='mobile' style='border-bottom: 1px solid #beccc9;'>
      <td>".$row["calories"]." kcal</td>
      <td>".$row["fat"]." g</td>
      <td>".$row["carbohydrates"]." g</td>
      <td>".$row["proteins"]." g</td>
    </tr>
  ");
}
?>
</table>

<!-- <table>
    <tr>
      <th>Ruoka-aine</th>
      <th>Määrä</th>
    </tr>
    <tr>
      <td>".$row["foodName"]."</td>
      <td>".$row["quantity"]." g</td>
    </tr>
    <tr>
      <th>Kalorit</th>
      <th>Rasva</th>
      <th>Hiilihydraatit</th>
      <th>Proteiinit</th>
    </tr>
    <tr>
      <td>".$row["calories"]." kcal</td>
      <td>".$row["fat"]." g</td>
      <td>".$row["carbohydrates"]." g</td>
      <td>".$row["proteins"]." g</td>
    </tr>
    </table> -->