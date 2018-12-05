<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
   /* Create two equal columns that floats next to each other */
.column {
    float: left;
    width: 50%;
    padding: 10px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
} 
</style>
<br/>
<br/>


<?php
if(!empty($cart_sessaion))
{
	$total_amount=0;
  foreach ($cart_sessaion as $pl)
  {
    ?>
    <div class="row">
      <div class="column" style="background-color:#aaa;">
        <h2><?php echo $pl['p_name']; ?></h2>
        <p><?php echo $pl['p_price']; ?></p>
        <p><button onclick="remove_from_cart(<?php echo $pl['p_id']; ?>)" type="button">Remove From Cart!</button></p>
      </div>
    </div>
    <?php
    $total_amount=$total_amount+$pl['p_price'];
  }
}
else
{
  ?>

  <div class="row">
    <div class="column" style="background-color:#aaa;">
      <h2>Product Not Available..</h2>
    </div>
  </div>
  <?php
  $total_amount=0;
} 
?>
<br/>
<div class="row">
    <div class="column" style="background-color:#aaa;">
      <h2>Total Amount : <?php echo $total_amount; ?></h2>
    </div>
  </div>
<script type="text/javascript">
  function remove_from_cart(p_id) 
  {
    var base_url="<?php echo base_url(); ?>";
    var path=base_url+"index.php/category/remove_from_cart";
    $.ajax({
        url: path,
        type: "POST",
        data: {p_id:p_id},
        success: function(data)
        {
          //alert(data);
          location.reload();
        },  
     });
  }
</script>