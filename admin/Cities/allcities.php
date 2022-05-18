<?php 
require '../../config.php' ;
//  require_once BL.'/functions/validate.php';
 require_once BL.'/functions/db.php' ;
 require BLA.'/inc/header.php'; 
  ?>
<table style="margin-left: 200px; width: 1200px; margin-top: 150px;" class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">City Name </th>
      <th scope="col">CreatedAt</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      <?php $data=getRows('cities'); $x=1 ;?>
      <?php  foreach($data as $row) { ?>
    <tr>
      <th scope="row"><?php echo $x ; ?></th>
      <td><?php echo  $row['city_name'] ; ?></td>
      <td><?php echo  $row['city_createdAt'] ;?></td>
      <td>                    
              <a href="<?php echo BURLA.'/Cities/edit.php?id='.$row['city_id']; ?>" class="btn btn-info">Edit</a>


      <a href="#" class="btn btn-danger delete" data-field="city_id" data-id="<?php echo $row['city_id']; ?>" data-table="cities" >Delete</a>
      </td>
</tr>
    <?php  $x++;}?>
  </tbody>
</table>
  <?php require BLA.'/inc./footer.php' ?>