<?php
    include('include/config.php');
    $db = new Database;
    $id=$_GET['id'];
    $sections = mysqli_query($db->getConnection(),"SELECT * FROM sections WHERE property = $id");
?>
Plot Layout 
<br>
<div style="display:flex;flex-wrap: wrap;border:1px solid red; padding:10px 5px; border-radius:5px; width: auto;">
    <?php while($section = mysqli_fetch_assoc($sections)) { 
        $sectionId = $section['id'];


        $rows = mysqli_query($db->getConnection(),"SELECT rowIndex FROM units WHERE section = $sectionId GROUP BY rowIndex");



    ?>

        <div style="width:fit-content;border: 1px solid green;margin:2px;padding:10px">

            <span style="display: block;" ><?=$section['name']?></span>
            <hr>
            <?php 

            while($row = mysqli_fetch_assoc($rows)){

            $rowIndex = $row['rowIndex'];

            $units = mysqli_query($db->getConnection(),"SELECT * FROM units WHERE section = $sectionId AND rowIndex = $rowIndex");

            ?>


                <?php while($unit = mysqli_fetch_assoc($units)){
                    $ri = $unit['rowIndex'];
                    $cost = $unit['cost'];
                    $ci = $unit['colIndex'];
                    $i = $unit['id'].' ( '.$ri.','.$ci.' ) ';


                 ?>
                    <?php if($unit['type'] == 'road'){ ?> 
                        <span>Road</span>
                    <?php } elseif($unit['type'] == 'river'){ ?> 
                        <span>River</span>
                    <?php }  else if($unit['type'] == 'plot'){ ?> 
                        <input title="<?=$cost?>" type="button" style="border:none; width:53px; padding:2px; margin:2px;" value="<?=$i?>" />
                    <?php } ?>
                      
                    

                <?php } ?>
                <br>
            <?php } ?>
        </div>
        <br>
    <?php } ?>
</div>