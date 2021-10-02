<link href="SBAdmin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="SBAdmin2/vendor/select2/select2.min.css" rel="stylesheet">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
    <div>
        <form action="SBAdmin2/includes/transactsync1.inc.php">
            <button name="sync-submit" id="btnSyncProd" class="btn btn-sm" style="background-color: #294C60; color: white;">
                <i class="fas fa-sync"></i> 
                Sync Product Quantity
            </button>
        </form>
    </div>
</div>

<!-- table here - start -->
<div style="font-family: Arial; ">
    <div class="card shadow mb-3">       
        <div class="card-body" cellspacing="0" style="border-bottom: 0.25rem solid #001B2E;">
                    <table class="table table-sm text-gray-800" width="100%" id="TransactionsTable" style="text-align: center;">
                        <thead>
                            <tr role="row">
                                <th class="text-center sorting" style="width: 230px;">Name</th>
                                <th class="text-center sorting" style="width: 100px;">Quantity</th>
                                <th class="text-center sorting_asc" style="width: 100px;">Price</th>
                                <th class="text-center sorting_asc" style="width: 127.2px;">Date</th>
                                <th class="text-center sorting_asc" style="width: 180px; font-size: 95%">Customer Reference</th>
                                <th class="text-center sorting_asc" style="width: 130px; font-size: 95%">Order Reference</th> 
                                <th class="text-center sorting_asc" style="width: 100px;">Status</th>
                                <th class="text-center sorting" style="width: 75px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                require_once "SBAdmin2/includes/dbh.inc.php";       

                                $sql = "SELECT cxcakeorder.*, cxcartorder.*, product.prodName
                                FROM cxcakeorder 
                                JOIN cxcartorder
                                ON cxcakeorder.cakeOrderID = cxcartorder.cartCakeOID
                                JOIN product
                                ON cxcakeorder.cakeProdID = product.ProdID
                                WHERE cartStat = '2'  
                                ORDER BY cartDate DESC";
                                if($result = mysqli_query($conn, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                            $id = $row['cartCakeOID'];                 
                                            echo "<tr>";
                                                echo "<td>" . $row['prodName'] . "</td>";
                                                echo "<td>" . $row['cakeQty'] . "</td>";
                                                echo "<td>" . $row['cakeCompPrice'] . "</td>";
                                                echo "<td>" . $row['cartDate'] . "</td>"; 
                                                echo "<td>" . $row['cartCxID'] . "</td>";
                                                echo "<td>" . $row['cartCakeOID'] . "</td>";
                                                 if ($row['cartStat'] == 2){
                                                    echo "<td> Pending Payment </td>";
                                                }
                                                echo "<form action='adTransactions.php'>";
                                                    echo "<td class=' text-center' style='border-bottom: 1px solid lightgrey'>
                                                        <button name='view-submit' value='".$id."' type='submit' class='btn btn-sm' style='font-size: 12px; border: none; background-color: #294C60; color: white;' data-toggle='modal' data-target='#ModalViewTransaction'  ><i class='fa fa-eye'></i> View</button>
                                                    </td>";
                                                echo "</form>";
                                            echo "</tr>";
                                        }
                                    }
                                }    mysqli_close($conn);    
                            ?>
                        </tbody>
                    </table>                
            
        </div>
    </div>
</div>
<!-- table here - end -->


<div id="ModalViewTransaction" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">View Transaction</h5>
                <button class="close" id="VUCloseModal" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
                    
            <?php
                if(isset($_GET['view-submit'])){
                    echo "<script>var modalViewTransaction = true;</script>";
                    
                    require_once 'SBAdmin2/includes/transactviewdetails.inc.php';
                    
                }
            ?>
            <div style="display:flex; justify-content: space-between">                      
                <div class="modal-body">
                    <h5 class="modal-title mb-3">Transaction Details</h5>
                    <div style="display: flex; align-items: center;" class="mb-1">
                        <label class="form-control-static mr-2 mt-1 ml-5" style="font-weight: normal; width:150px;">Product Name: </label>
                        <input type="text" name="pname" class="form-control form-control-user" style="width:200px;" value="<?php echo $pname;?>" disabled>
                        <label class="form-control-static mr-2 mt-1 ml-3" style="font-weight: normal; width:125px;">Product ID: </label>
                        <input type="text" name="pid" class="form-control form-control-user" style="width:200px;" value="<?php echo $pid;?>" disabled>
                    </div>
                    <div style="display: flex; align-items: center;" class="mb-1">
                        <label class="form-control-static mr-2 mt-1 ml-5" style="font-weight: normal; width:150px;">Quantity: </label>
                        <input type="text" name="pqty" class="form-control form-control-user" style="width:200px;" value="<?php echo $cqty;?>"disabled>
                        <label class="form-control-static mr-2 mt-1 ml-3" style="font-weight: normal; width:125px;">Unit Price: </label>
                        <input type="text" name="pid" class="form-control form-control-user" style="width:200px;" value="<?php echo $uprice;?>" disabled>
                    </div>

                    <div style="display: flex; align-items: center;" class="mb-1">
                        <label class="form-control-static mr-2 mt-1 ml-5" style="font-weight: normal; width:150px;">Total Price: </label>
                        <input type="text" name="ptotal" class="form-control form-control-user" style="width:200px;" value="<?php echo $tprice;?>" disabled>
                    </div>

                    <div style="display: flex; align-items: center;" class="mb-1">
                        <label class="form-control-static mr-2 mt-1 ml-5" style="font-weight: normal; width:150px;">Date: </label>
                        <input type="text" name="pdate" class="form-control form-control-user" style="width:200px;" value="<?php echo $cdate;?>"  disabled>
                    </div>
                    
                    <div style="display: flex; align-items: center;" class="mb-1">
                        <label class="form-control-static mr-2 mt-1 ml-5" style="font-weight: normal; width:150px;">Customer Reference: </label>
                        <input type="text" name="pcxref" class="form-control form-control-user" style="width:200px;" value="<?php echo $cxref; ?>" disabled>
                        <label class="form-control-static mr-2 mt-1 ml-3" style="font-weight: normal; width:125px;">Customer Name: </label>
                        <input type="text" name="pcxname" class="form-control form-control-user" style="width:200px;" value="<?php echo $cxname;?>"disabled>
                    </div> 
                    
                    <div style="display: flex; align-items: center;" class="mb-1">
                        <label class="form-control-static mr-2 mt-1 ml-5" style="font-weight: normal; width:150px;">Order Reference: </label>
                        <input type="text" name="porderref" class="form-control form-control-user" style="width:200px;" value="<?php echo $oref;?>" disabled>
                    </div>
                    //d
                    <div style="display: flex; align-items: center;" class="mb-1">
                        <label class="form-control-static mr-2 mt-1 ml-5" style="font-weight: normal; width:150px;">Status: </label>
                                <select class="form-control select2 " name="stat" style="width: 200px;"  disabled>
                                    <option> <?php echo $stat; ?></option>
                                </select>
                    </div>                           
                </div>
            </div>

            <div class="modal-footer">
                <button id="btnEditUser" class="btn btn-sm" style="background-color: #294C60; color: white;" data-toggle="modal" data-target="#ModalEditTransaction">
                    <i class="fas fa-edit"></i> Edit
                </button>
                <form action="SBAdmin2/includes/transacthide.inc.php" method="post">
                    <button id="btnUndoEdit" name="hide-submit" class="btn btn-sm btn-danger" style="color: white;" value="<?php echo $_GET['view-submit']; ?>">
                        <i class="fas fa-trash-alt"></i> Delete 
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="ModalEditTransaction" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                    <div class="modal-header"><h5 class="modal-title">Edit Transaction</h5>
                        <button class="close" id="ANUCloseModal" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <?php
                            require_once 'SBAdmin2/includes/transactviewdetails.inc.php';
                        
                    ?>
                <form action="SBAdmin2/includes/transactedit.inc.php" method="post">
                    <div style="display:flex; justify-content: space-between">                    
                        <div class="modal-body">
                                <h5 class="modal-title mb-3">Transaction Details</h5>
                                <div style="display: flex; align-items: center;" class="mb-1">
                                    <label class="form-control-static mr-2 mt-1 ml-5" style="font-weight: normal; width:150px;">Product Name: </label>
                                    <input type="text" name="pname" class="form-control form-control-user" style="width:200px;" value=" <?php echo $pname; ?>" disabled>
                                    <label class="form-control-static mr-2 mt-1 ml-3" style="font-weight: normal; width:125px;">Product ID: </label>
                                    <input type="text" name="pid" class="form-control form-control-user" style="width:200px;" value=" <?php echo $pid; ?>" >
                                </div>
                                <div style="display: flex; align-items: center;" class="mb-1">
                                    <label class="form-control-static mr-2 mt-1 ml-5" style="font-weight: normal; width:150px;">Quantity: </label>
                                    <input type="text" name="pqty" class="form-control form-control-user" style="width:200px;" value=" <?php echo $cqty; ?>">
                                    <label class="form-control-static mr-2 mt-1 ml-3" style="font-weight: normal; width:125px;">Unit Price: </label>
                                    <input type="text" name="pid" class="form-control form-control-user" style="width:200px;" value=" <?php echo $uprice; ?>" disabled>
                                </div>
                                <div style="display: flex; align-items: center;" class="mb-1">
                                    <label class="form-control-static mr-2 mt-1 ml-5" style="font-weight: normal; width:150px;">Total Price: </label>
                                    <input type="text" name="ptotal" class="form-control form-control-user" style="width:200px;" value=" <?php echo $tprice; ?>" disabled>
                                </div>
                                <div style="display: flex; align-items: center;" class="mb-1">
                                    <label class="form-control-static mr-2 mt-1 ml-5" style="font-weight: normal; width:150px;">Date: </label>
                                    <input type="text" name="pdate" class="form-control form-control-user" style="width:200px;" value=" <?php echo $cdate; ?>" disabled>
                                </div>
                                <div style="display: flex; align-items: center;" class="mb-1">
                                    <label class="form-control-static mr-2 mt-1 ml-5" style="font-weight: normal; width:150px;">Customer Reference: </label>
                                    <input type="text" name="pcxref" class="form-control form-control-user" style="width:200px;" value=" <?php echo $cxref; ?>" disabled>
                                    <label class="form-control-static mr-2 mt-1 ml-3" style="font-weight: normal; width:125px;">Customer Name: </label>
                                    <input type="text" name="pcxname" class="form-control form-control-user" style="width:200px;" value=" <?php echo $cxname; ?>">
                                </div> 
                                <div style="display: flex; align-items: center;" class="mb-1">
                                    <label class="form-control-static mr-2 mt-1 ml-5" style="font-weight: normal; width:150px;">Order Reference: </label>
                                    <input type="text" name="porderref" class="form-control form-control-user" style="width:200px;" value=" <?php echo $oref; ?>" disabled>
                                </div>
                                <div style="display: flex; align-items: center;" class="mb-1">
                                    <label class="form-control-static mr-2 mt-1 ml-5" style="font-weight: normal; width:150px;">Status: </label>
                                            <select class="form-control select2 " name="stat" style="width: 200px;">
                                                <option value="0">Select...</option>
                                                <option value="1">Pending</option>
                                                <option value="2">Completed</option>
                                            </select>
                                </div>                           
                            
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button id="btnSubmitNewUser" name="edit-submit" class="btn btn-sm" style="background-color: #294C60; color: white;" type="submit" value="<?php echo $_GET['view-submit']; ?>">
                            <i class="fas fa-paper-plane"></i> Submit
                        </button>                       
                    </div>
                </form>
            
        </div>
    </div>
</div>
<?php   
    
    include './SBAdmin2/includes/alertmodal.inc.php';
    
    if(isset($_GET['error'])){
        if($_GET['error'] == 'signupemptyfields'){
            echo "
                <script>var alertEmptyFields = true; </script>                    
            ";
        }
        else if($_GET['error'] == 'invaliduid'){
            echo "
                <script>var alertInvalidUsername = true; </script>                    
            ";
        }

    }
    else if(isset($_GET['success'])){
        if($_GET['success'] == 'sync'){
            echo "
                <script>var alertSyncTransact = true; </script>                    
            ";
        }
        else if($_GET['success'] == 'useredited'){
            echo "
                <script>var alertUserUpdated = true; </script>                    
            ";
        }
        
    }