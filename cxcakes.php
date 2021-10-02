<?php
  // display 0 = all
  // display 1 = classics
  // display 2 = themed
  // display 3 = FYai
  // display 4 = FYbestseller
  // display 5 = search 

  if(isset($_GET['type'])){
    $type = $_GET['type'];
  }
  else{
    $type = 0;
  }
  
  
  if($type == 0){
    $pagename = "All Collections";
  }
  if($type == 1){
    $pagename = "Classics";
  }
  if($type == 2){
    $pagename = "Themed";
  }
  $title = 'CakeHub | '.$pagename;
  include './cxnav.php';

?>
<style>
  .img-container {
        height: 100%;
        object-fit: cover;
        object-position: 50% 50%;
        padding: 10px;
    }
  .prod-container {       
        width: auto;
        height: 15em;
        border-radius: 0.5rem;
        overflow: hidden;
        text-align: center;
        background-image: linear-gradient(var(--clr-red-light), transparent);
  }
  .prod-container:hover {
    background-image: linear-gradient( transparent, #fcf8f7);
  } 
  
</style>

<nav aria-label="breadcrumb " class="bg-transparent fs-5 ms-3 mt-3" style="box-shadow: unset;">
  <ol class="breadcrumb ">
    <li class="breadcrumb-item"><a href="index.php" class="link-ftr">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $pagename ?></li>
  </ol>
</nav>

<h3 class="text-noah text-center fw-bold mt-5"><?php echo $pagename ?></h3> 
<hr class="w-75 m-auto">

<div class="row m-0 px-5">
  <?php include "./includes/caketypelist.inc.php"; ?>

</div>

<?php

  include './cxfooter.php';
?>