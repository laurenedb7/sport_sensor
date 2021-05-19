<?php 
$sql = 'SELECT * FROM test';   
$req = $bdd->query($sql);   
?>
    
    <table class="table-bordered">
    <caption>Général</caption>
    <tr>
        <th><p class="text-error">Date</p></th>
        <th><p class="text-error">Score</p></th>
    </tr>

    <tr>
    <?php while($row = $req->fetch()) { ?>
        <td><?php echo $row['idTest']; ?></td>
        <td><?php echo $row['resultatTest']; ?></td>
    </tr> 
    <?php }   $req->closeCursor();  
?> </table>