<link href="SBAdmin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="SBAdmin2/vendor/select2/select2.min.css" rel="stylesheet">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
    <div>
    <?php
        if($_SESSION['urid'] == 3 || $_SESSION['urid'] == 4 ){
            echo '
                <button id="btnAddNewUser" class="btn btn-sm" style="background-color: #294C60; color: white;" data-toggle="modal" data-target="#ModalAddNewProduct">
                    <i class="fas fa-plus"></i> 
                    Add New Product
                </button>
                ';
            }
        ?>
    </div>
</div>



<!-- table here - start -->
<div style="font-family: Arial;">
    <div class="card shadow mb-3">       
        <div class="card-body" cellspacing="0" style="border-bottom: 0.25rem solid #001B2E;">

                <table class="table table-sm text-gray-800" width="100%" id="FileManagementTable" style="text-align: center;">
                        <thead>
                            <tr role="row">
                                <th class="text-center sorting_asc" style="width: 127.2px;">Product ID</th>
                                <th class="text-center sorting" style="width: 200px;">Name</th>
                                <?php
                                    $currseller = $_SESSION['userId'];
                                    $currrole = $_SESSION['urid'];
                                    if($currrole == 3 || $currrole == 4 ){
                                        echo '
                                        <th class="text-center sorting_asc" style="width: 300px;">Description</th>
                                        ';
                                    }
                                    else{
                                        echo '
                                        <th class="text-center sorting_asc" style="width: 300px;">Bakery Name</th>
                                        ';
                                    }
                                ?>
                                
                                
                                <th class="text-center sorting" style="width: 100px;">Type</th>
                                <th class="text-center sorting_asc" style="width: 100px;">Price</th>
                                <th class="text-center sorting" style="width: 100px;">Quantity</th>
                                <th class="text-center sorting_asc" style="width: 100px;">Status</th>
                                <th class="text-center sorting" style="width: 100.2px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                                require_once 'SBAdmin2/includes/dbh.inc.php';

                                if($currrole == 3 || $currrole == 4 ){
                                    $sql = "SELECT * FROM product WHERE (prodStat = 1 OR prodStat = 2) AND prodSellerID = '$currseller';"; 
                                }
                                else{
                                    $sql = "SELECT product.*, person.personBakeryName FROM product JOIN person
                                    ON product.prodSellerID = person.personID WHERE prodStat = 1 OR prodStat = 2;"; 
                                }
                                
                                if($result = mysqli_query($conn, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                            $id = $row['prodID'];                 
                                            
                                            echo "<tr>";
                                                echo "<td>" . $row['prodID'] . "</td>";
                                                echo "<td>" . $row['prodName'] . "</td>";
                                                ;
                                                if($currrole == 3 || $currrole == 4 ){
                                                    echo "<td>" . $row['prodDesc'] . "</td>";
                                                }
                                                else{
                                                    echo "<td>" . $row['personBakeryName'] . "</td>";
                                                }
                                                
                                                if ($row['prodTypeID'] == 1){
                                                    echo "<td> Classics </td>";
                                                } 
                                                else if ($row['prodTypeID'] == 2){
                                                    echo "<td> Themed </td>";
                                                }
                                                else if ($row['prodTypeID'] == 3){
                                                    echo "<td> Custom </td>";
                                                }

                                                echo "<td>" . $row['prodPrice'] . "</td>";
                                                echo "<td>" . $row['prodQty'] . "</td>";
                                                if ($row['prodStat'] == 1){
                                                    echo "<td> Active </td>";
                                                } 
                                                else if ($row['prodStat'] == 2){
                                                    echo "<td> Inactive </td>";
                                                }
                                                echo "<form action='adFileManagement.php#'>";
                                                    echo "<td class=' text-center' style='border-bottom: 1px solid lightgrey'>
                                                    <button name='view-submit' value='$id' type='submit' class='btn btn-sm' style='font-size: 12px; border: none; background-color: #294C60; color: white;' data-toggle='modal' data-target='#ModalViewProduct'  ><i class='fa fa-eye'></i> View</button></td>";
                                                echo "</form>";
                                            echo "</tr>";

                                        }
                                    }
                                }
                                mysqli_close($conn);
                            ?>

                        </tbody>
                    </table>                
                
        </div>
    </div>
</div>
<!-- table here - end -->

<div id="ModalAddNewProduct" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Product</h5>
                        <button class="close" id="ANUCloseModal" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    </div>
                <form action="SBAdmin2/includes/fileadd1.inc.php" method="post" enctype="multipart/form-data" >
                    <div class="row m-0 p-0">
                        <div class="col-sm-5 col-md-5 col-lg-5 modal-body pl-1" >
                            <div style="display:flex; justify-content: center; margin-bottom: 10px">
                            <img src="SBAdmin2/includes/produploads/defaultcake.jpg" alt="defaultpic" class="w-75">
                            </div>
                            <div class="ml-3">
                                <input type="file" name="THEfile">
                            </div>
                        </div>
                        
                        <div class="col-sm-7 col-md-7 col-lg-7 modal-body"> 
                            <h5 class="modal-title mb-3">Product Information</h5>
                            <div style="display: flex; align-items: center;" class="mb-1">
                                <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:150px;">Product Name: </label>
                                <input type="text" class="form-control form-control-user w-100"  name="pname">
                            </div>
                            <div style="display: flex; " class="mb-1">
                                <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:150px;">Description: </label>
                                <textarea style="width:100%; min-height:150px;" name="pdesc"  id="pdesc" class="form-control form-control-user" placeholder="Product Description here..."></textarea>
                            </div>
                            <div style="display: flex; align-items: center;" class="mb-1">
                                <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:150px;">Type: </label>
                                        <select class="form-control select2 w-100" name="ptype">
                                            <option value="0">Select...</option>
                                            <option value="1">Classic</option>
                                            <option value="2">Themed</option>
                                            <option value="3">Cake Custom Ingredient</option>
                                        </select>
                            </div>
                            <div style="display: flex; align-items: center;" class="mb-1">
                                <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:150px;">Price: </label>
                                <input type="text" class="form-control form-control-user w-100"  name="pprice">
                            </div>
                            <div style="display: flex; align-items: center;" class="mb-1">
                                <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:150px;">Quantity: </label>
                                <input type="text" class="form-control form-control-user w-100"  name="pqty">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="add-submit" class="btn btn-sm" style="background-color: #294C60; color: white;" type="submit">
                            <i class="fas fa-paper-plane"></i> Submit
                        </button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

<div id="ModalViewProduct" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">View Product</h5>
                    <button class="close" id="VUCloseModal" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                    
                    <?php
                        if(isset($_GET['view-submit'])){
                            echo "<script>var modalViewProduct = true;</script>";

                            require_once 'SBAdmin2/includes/fileviewdetails.inc.php';
                        }
                    ?>


                    <div class="row m-0 p-0">
                        <div class="col-sm-5 col-md-5 col-lg-5 modal-body pl-1 mt-5" style="display:flex; justify-content: center;">
                            <div style="display:flex; justify-content: center; margin-bottom: 10px; width: 300px; ">
                            <?php require_once 'SBAdmin2/includes/filedisp.inc.php';?>
                            </div>
                        </div>                       
                        <div class="col-sm-7 col-md-7 col-lg-7 modal-body">
                            <h5 class="modal-title mb-3">Product Information</h5>
                            <div style="display: flex; align-items: center;" class="mb-1">
                                <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:150px;">Product Name: </label>
                                <input type="text" class="form-control form-control-user w-100"  value="<?php echo $pname; ?>" disabled>
                            </div>
                            <div style="display: flex; " class="mb-1">
                                <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:150px;">Description: </label>
                                <textarea type="text" class="form-control form-control-user" style="width:100%; min-height:150px;" form="productform" disabled><?php echo $pdesc; ?></textarea>
                            </div>
                            <div style="display: flex; align-items: center;" class="mb-1">
                                <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:150px;">Type: </label>
                                        <select class="form-control select2 " style="width: 100%;" disabled>
                                            <option><?php echo $ptype; ?></option>
                                        </select>
                            </div>
                            <div style="display: flex; align-items: center;" class="mb-1">
                                <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:150px;">Price: </label>
                                <input type="text" class="form-control form-control-user w-100"  value="<?php echo $pprice; ?>" disabled>
                            </div>
                            <div style="display: flex; align-items: center;" class="mb-1">
                                <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:150px;">Quantity: </label>
                                <input type="text" class="form-control form-control-user w-100"  value="<?php echo $pqty; ?>" disabled>
                            </div>
                            <div style="display: flex; align-items: center;" class="mb-1">
                                <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:150px;">Status: </label>
                                        <select class="form-control select2 " style="width: 100%;" disabled>
                                            <option> <?php echo $stat; ?> </option>
                                        </select>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button id="btnEditUser" class="btn btn-sm" style="background-color: #294C60; color: white;" data-toggle="modal" data-target="#ModalEditProduct">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button id="btnEditUser" class="btn btn-sm" style="background-color: #294C60; color: white;" data-toggle="modal" data-target="#ModalDeleteProduct">
                        <i class="fas fa-trash-alt"></i> Deactivate
                    </button>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>

<div id="ModalEditProduct" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
    <?php ?>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">Edit Product</h5>
                    <button class="close" id="ANUCloseModal" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <?php
                    require_once 'SBAdmin2/includes/fileviewdetails.inc.php';
                ?>

                <form action="SBAdmin2/includes/fileedit.inc.php" method="post" enctype="multipart/form-data">
                    <div class="row m-0 p-0">
                        
                        <div class="col-sm-5 col-md-5 col-lg-5 modal-body pl-1 mt-5">
                            <div style="display:flex; justify-content: center; margin-bottom: 10px">
                                <?php
                                require "SBAdmin2/includes/filedisp.inc.php";
                                ?>
                            </div>
                            <div class="ml-3">
                                <input type="file" name="theFILE">
                            </div>
                        </div> 

                        <div class="col-sm-7 col-md-7 col-lg-7  modal-body" >
                            <h5 class="modal-title mb-3">Product Information</h5>
                            <div style="display: flex; align-items: center;" class="mb-1">
                                <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:150px;">Product Name: </label>
                                <input type="text" class="form-control form-control-user w-100"  name="pname" value="<?php echo $pname;?>" >
                            </div>
                            <div style="display: flex; " class="mb-1">
                                <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:150px;">Description: </label>

                                <textarea style="width:100%; min-height:150px;" class="form-control" name="pdesc"  id="pdesc"><?php echo $pdesc; ?></textarea>
                            </div>
                            <div style="display: flex; align-items: center;" class="mb-1">
                                <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:150px;">Type: </label>
                                        <select class="form-control select2 w-100" name="ptype">
                                            <option value="<?php echo $type; ?>"><?php echo $ptype; ?></option>
                                            <option value="1">Classic</option>
                                            <option value="2">Themed</option>
                                            <option value="3">Custom</option>
                                        </select>
                            </div>
                            <div style="display: flex; align-items: center;" class="mb-1">
                                <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:150px;">Price: </label>
                                <input type="text" class="form-control form-control-user w-100" name="pprice" value="<?php echo $pprice;?>">
                            </div>
                            <div style="display: flex; align-items: center;" class="mb-1">
                                <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:150px;">Quantity: </label>
                                <input type="text" class="form-control form-control-user w-100"  name="pqty" value="<?php echo $pqty;?>">
                            </div>
                            <div style="display: flex; align-items: center;" class="mb-1">
                                <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:150px;">Status: </label>
                                        <select class="form-control select2 w-100"  name="stat">
                                            <option value="<?php echo $pstat;?>"><?php echo $stat;?></option>
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btnSubmitNewUser" class="btn btn-sm" name="edit-submit"  value="<?php echo $_GET['view-submit'];?>" style="background-color: #294C60; color: white;" type="submit">
                            <i class="fas fa-paper-plane"></i> Submit
                        </button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="ModalDeleteProduct" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
    <?php ?>
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">Deactivate Product</h5>
                    <button class="close" id="ANUCloseModal" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <?php
                    require_once 'SBAdmin2/includes/fileviewdetails.inc.php';
                ?>

                <div class="modal-body">
                    Are you sure you want to deactivate this product?
                </div>
                
                <div class="modal-footer">
                    <form action="SBAdmin2/includes/filehide1.inc.php" method="get">
                        <button id="btnUndoEdit" class="btn btn-sm btn-danger" style="color: white;" name="hide-submit" type="submit" value="<?php echo $_GET['view-submit']; ?>">
                            <i class="fas fa-trash-alt"></i> Confirm Deactivate
                        </button>
                    </form>
                    
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button> 
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php
    include './SBAdmin2/includes/alertmodal.inc.php';
    
    if(isset($_GET['error'])){
        if($_GET['error'] == 'emptyfields'){
            echo "
                <script>var alertEmptyFields = true; </script>                    
            ";
        }
        else if($_GET['error'] == 'extensionnotallowed' || $_GET['error'] == 'filetoolarge'){
            echo "
                <script>var alertPictureUpload = true; </script>                    
            ";
        }
        else{
            echo "
                <script>var alertError = true; </script>                    
            ";
        }


    }
    else if(isset($_GET['success'])){
        if($_GET['success'] == 'prodadded'){
            echo "
                <script>var alertProdAdded = true; </script>                    
            ";
        }
        else if($_GET['success'] == 'produpdated'){
            echo "
                <script>var alertProdUpdated = true; </script>                    
            ";
        }
        else if($_GET['success'] == 'proddeact'){
            echo "
                <script>var alertProdDeleted = true; </script>                    
            ";
        }
        
        
    }
?>