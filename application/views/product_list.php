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
if(!empty($product_list))
{
  foreach ($product_list as $pl)
  {
    ?>
    <div class="row">
      <div class="column" style="background-color:#aaa;">
        <h2><?php echo $pl['p_name']; ?></h2>
        <p><?php echo $pl['p_price']; ?></p>
        <p><button onclick="add_to_cart(<?php echo $pl['p_id']; ?>)" type="button">Add to Cart!</button></p>
      </div>
    </div>
    <?php
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
} 
?>
<script type="text/javascript">
  function add_to_cart (p_id) 
  {
    var base_url="<?php echo base_url(); ?>";
    var path=base_url+"index.php/category/add_to_cart";
    $.ajax({
        url: path,
        type: "POST",
        data: {p_id:p_id},
        success: function(data)
        {
          alert('Product added to cart.')
        },  
     });
  }
</script>