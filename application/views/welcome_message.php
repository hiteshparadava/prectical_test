<style type="text/css">
  ul {
  list-style: none;
  padding: 0;
  margin: 0;
  background: #1bc2a2;
}

ul li {
  display: block;
  position: relative;
  float: left;
  background: #1bc2a2;
}
li ul { display: none; }

ul li a {
  display: block;
  padding: 1em;
  text-decoration: none;
  white-space: nowrap;
  color: #fff;
}

ul li a:hover { background: #2c3e50; }

li:hover > ul {
  display: block;
  position: absolute;
}

li:hover li { float: none; }

li:hover a { background: #1bc2a2; }

li:hover li a:hover { background: #2c3e50; }

.main-navigation li ul li { border-top: 0; }

ul ul ul {
  left: 100%;
  top: 0;
}

ul:before,
ul:after {
  content: " "; /* 1 */
  display: table; /* 2 */
}

ul:after { clear: both; }

 /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5px auto; /* 15% from the top and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
    /* Position it in the top right corner outside of the modal */
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

/* Close button on hover */
.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
} 
 /* Bordered form */
form {
    border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
    opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
    width: 40%;
    border-radius: 50%;
}

/* Add padding to containers */
.container {
    padding: 16px;
}

/* The "Forgot password" text */
span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
        display: block;
        float: none;
    }
    .cancelbtn {
        width: 100%;
    }
} 
</style>
 <!-- Button to open the modal login form -->
<?php
$user_data=$this->session->userdata('user_sessaion');
if(empty($user_data))
{
  ?>
  <a href="<?php echo base_url(); ?>index.php/login">Login</a>&nbsp;&nbsp;
  <?php
}
else
{
  ?>
  <a href="<?php echo base_url(); ?>index.php/login/logout">Logout</a>&nbsp;&nbsp;
  <?php
}
?>
<a href="<?php echo base_url(); ?>index.php/cart">Cart</a>
<br/>
<br/>
<!-- The Modal -->
<div id="menu_div">
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function(){
   get_category();
});

function get_category()
{
    var base_url="<?php echo base_url(); ?>";
    var path=base_url+"index.php/category/get_all_category";
    $.ajax({
        url: path,
        type: "POST",
        data: {},
        success: function(data)
        {
          var obj = JSON.parse(data);
          console.log(obj);
          $('#menu_div').append(createItem(obj));
        },  
     });
}

function createItem(obj)
{
  var $obj = null;
  if (obj.ac_name) {
    var base_url="<?php echo base_url() ?>";
    var link=base_url+"index.php/category/get_product/"+obj.ac_id;
    $obj = $('<a>').attr('href',link).text(obj.ac_name);
    //$obj = $('<a>').attr('onclick','get_product('+obj.ac_id+')').text(obj.ac_name);
    $obj = $('<li>').append($obj);
    if (obj.sub_cat) {
      $obj.append(createItem(obj.sub_cat));
    }
  }
  else if (obj.length) {
    $obj = $('<ul>');
    for (var i = 0, l = obj.length; i < l; i++) {
      $obj.append( createItem( obj[i] ) );
    }
  }
  return $obj;
}
</script>