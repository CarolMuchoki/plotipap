
<?php include ('checkout.php');?>
<script> 
	var total = <?=$_SESSION['total'];?>
 </script>
<html>
<head>
<title>Plotipap Payment plans</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/styles2.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>

<div class="container" >
      <div class="price-box">
        <div class="row">
          <div class="col-sm-6">
                <form class="form-horizontal form-pricing" role="form">

                  <div class="price-slider">
                    <h4 class="great">Amount</h4>
                    <span>Minimum <?=Database::formatCurrency(((.4) * (float)$_SESSION['total']))?> is required as booking fees</span>
                  <!--   <div class="col-sm-12">
                      <div id="slider_amirol"></div>
                    </div> -->
                  </div>
                
                  <div class="price-slider">
                    <h4 class="great">Plots selected</h4>
                  
                      <input name="sliderVal" type="hidden" id="sliderVal" value='0' readonly="readonly" />
                <input name="month" type="hidden" id="month" value='24month' readonly="readonly" />
                <input name="term" type="hidden" id="term" value='quarterly' readonly="readonly" />
                      <div class="btn-group btn-group-justified">
                        <div class="btn-group btn-group-lg">
                    <button type="button" class="btn btn-primary btn-lg btn-block term active-term selected-term" id='quarterly'>Quarterly</button>
                  </div>
                        <div class="btn-group btn-group-lg">
                          <button type="button" class="btn btn-primary btn-lg btn-block term" id='monthly'>Monthly</button>
                  </div>
                        <div class="btn-group btn-group-lg">
                          <button type="button" class="btn btn-primary btn-lg btn-block term" id='weekly'>Weekly</button>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="col-sm-6">
                <div class="price-form">

                  <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6">
                          <label for="amount_amirol" class="control-label">Annually (Ksh): </label>
                          <span class="help-text">Amount that you need to pay</span>
                        </div>
                        <div class="col-sm-6">
                            <input type="hidden" id="amount_amirol" class="form-control">
                            <!-- <p class="price lead" id="total"></p> -->
                            <input class="price lead" name="totalprice" type="text" id="total" disabled="disabled" style="" />
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6">
                          <label for="amount_amirol" class="control-label">Monthly (Ksh): </label>
                          <span class="help-text">Amount that you need to pay</span>
                        </div>
                        <div class="col-sm-6">
                            <input type="hidden" id="amount_amirol" class="form-control">
                            <!-- <p class="price lead" id="total12"></p> -->
                            <input class="price lead" name="totalprice12" type="text" id="total12" disabled="disabled" style="" />
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6">
                          <label for="amount_amirol" class="control-label">Weekly (Ksh): </label>
                          <span class="help-text">Amount that you need to pay</span>
                        </div>
                        <div class="col-sm-6">
                            <input type="hidden" id="amount_amirol" class="form-control">
                            <!-- <p class="price lead" id="total52"></p> -->
                            <input class="price lead" name="totalprice52" type="text" id="total52" disabled="disabled" style="" />
                        </div>
                    </div>
                    </div>
                    <div style="margin-top:30px"></div>
                    <hr class="style">

                  <div class="form-group">
                      <div class="col-sm-12">
                      	 <div class="d-block my-3">
                 
                   <div class="price-slider">
                    <h4 class="great">Duration</h4>
                    <span>Please choose one</span>
                      <div class="btn-group btn-group-justified">
                      <div class="btn-group btn-group-lg">
                        <button type="button" class="btn btn-primary btn-lg btn-block month active-month selected-month" id='24month'>24 Months</button>
                      </div>
                      <div class="btn-group btn-group-lg">
                        <button type="button" class="btn btn-primary btn-lg btn-block month" id='18month'>18 Months</button>
                      </div>
                      <div class="btn-group btn-group-lg">
                        <button type="button" class="btn btn-primary btn-lg btn-block month" id='12month'>12 Months</button>
                      </div>
                    </div>
                </div>

                  </div>

              </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Proceed <span class="glyphicon glyphicon-chevron-right"></span></button>
                      </div>
                  </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                          <img src="https://github.com/AmirolAhmad/Bootstrap-Calculator/blob/master/images/payment.png?raw=true" class="img-responsive payment" />
                      </div>
                    </div>

                  </div>

                </form>
            </div>
          
        </div>

          </div>


      </div>

    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
<script>
	// JavaScript Document

$(document).ready(function() {

    $("#total").val(total);

    

    $("#slider_amirol").slider({
        range: "min",
        animate: true,

        min: 0,
        max: 28,
        step: 1,
        slide: 
            function(event, ui) 
            {
                update(1,ui.value); //changed
                calcualtePrice(ui.value);
            }
    });

    $('.month').on('click',function(event) {
        var id = $(this).attr('id');

        $('.month').removeClass('selected-month');
        $(this).addClass('selected-month');
        $(".month").removeClass("active-month");
        $(this).addClass("active-month");

        $('#month').val(id);

        calcualtePrice()
    });

    $('.term').on('click',function(event) {
        var id = $(this).attr('id');

        $('.term').removeClass('selected-term');
        $(this).addClass('selected-term');
        $(".term").removeClass("active-term");
        $(this).addClass("active-term");
        $('#term').val(id);

        calcualtePrice()
    });

    update();
    calcualtePrice();
});
        

        
function update(slider,val) {

    if(undefined === val) val = 0;
    var amount = p[val];

    $('#sliderVal').val(val);

    $('#slider_amirol a').html('<label><span class="glyphicon glyphicon-chevron-left"></span> '+amount+' <span class="glyphicon glyphicon-chevron-right"></span></label>');
}

function calcualtePrice(val){
    
    if(undefined === val)
        val = $('#sliderVal').val();

var totalPrice = total;
    var month = $('#month').val();
if(month === '24month'){
	$("#total").val(totalPrice.toFixed(2));
    $("#total12").val(Math.round((totalPrice)/12).toFixed(2));
    $("#total52").val(Math.round((totalPrice)/104).toFixed(2));
}else if(month === '12month'){
	$("#total").val(totalPrice.toFixed(2));
    $("#total12").val(Math.round((totalPrice)/12).toFixed(2));
    $("#total52").val(Math.round((totalPrice)/52).toFixed(2));
}
else if(month === '18month'){
	$("#total").val(totalPrice.toFixed(2));
    $("#total12").val(Math.round((totalPrice)/18).toFixed(2));
    $("#total52").val(Math.round((totalPrice)/78).toFixed(2));
}

}
</script>