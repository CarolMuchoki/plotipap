<?php
    include('include/config.php');
    session_start();

    $db = new Database;
 
    $id=$_GET['id'];
    //$id=4;
    
    $sections = mysqli_query($db->getConnection(),"SELECT * FROM sections WHERE property = $id");
   
?>
<!DOCTYPE html>
<html>
<head>
       <style>
    input[type="checkbox"]{
  width: 30px; /*Desired width*/
  height: 30px; /*Desired height*/
} 
input title.hover {
    font-size: =13px;
}
 tr{
    background-color: #990000;
 }
 .blank_row
{
    
    background-color: #990000 !important;
}

</style>
</head>
<body>
   <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
   <script type="text/javascript" src="jquery.js"></script>
   <h2 margin_top=4px class="text-center">Plots Layout </h2>
<br>
<script type="text/javascript">
    function checktotal()
    {
        document.listform.total.value='';
        var sum=0;
        for(i=0;i<document.listform.choice.length;i++)
        {
            if(document.listform.choice[i].checked)
            {
                sum=sum+parseInt(document.listform.choice[i].value);
            }
        }
        document.listform.total.value=sum;
    }
    function addUnitToCart(unitId,cost){
        $.post(
            "addToCart.php",
            {
                "unitId":unitId,
                "cost":cost
            },
            function(data,status){
                console.log(data);
                document.listform.total.value=JSON.parse(data).total;
            }
            );
    }
</script>

<form method="post" name="listform" action="payment.php">
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
                        <span class ="blank_row" style ="background-color:#990000" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <?php } elseif($unit['type'] == 'river'){ ?> 
                        <tr><td>River</tr></td>
                    <?php }  else if($unit['type'] == 'plot'){ ?> 
                        <input type="checkbox" name="choice" value="<?php echo $cost ?>" onchange="addUnitToCart(<?=$unit['id']?>,<?=$cost?>)"  style="border:none; width:30px; padding:2px; margin:2px;"/>   

                    <?php } ?>
 
               <?php } ?>
                <br>         
            <?php } ?>
        </div>
        <br>
    <?php } ?>
       <p>
             <strong>Amount (Ksh)</strong> <input type="text" name="total" value="0">
     </p>

<p><button type="submit" name="submit">Checkout</button></p>

</div>
</form>

<?php

if(isset($_POST ['submit'])) {
    $totals=$_POST['total'];
    $_SESSION ['totals']= $totals;
}

if (isset($_SESSION['totals']))
{
    header("location: payment.php");
    ?>
<!-- <script type="text/javascript">
    window.location.assign(checkout.php);
</script> -->

<?php

}

?>

</body>
</html>
