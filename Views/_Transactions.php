<link href="SBAdmin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="SBAdmin2/vendor/select2/select2.min.css" rel="stylesheet">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
    <div>
        <button id="btnEditUser" class="btn btn-sm" style="background-color: #294C60; color: white;" data-toggle="modal" data-target="#ModalPaymentLookup">
            <i class="fas fa-edit"></i> Pending Payment 
        </button>
        <a name="" id="" class="btn btn-primary btn-sm" href="SBAdmin2/includes/transactsync1.inc.php" role="button" style="background-color: #294C60; color: white;"><i class="fas fa-sync"></i> 
            Sync Product Quantity
        </a>
    </div>
</div>


<!-- table here - start -->
<div style="font-family: Arial;">
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
                        WHERE cartStat = '2'  OR cartStat = '3' OR cartStat = '4' OR cartStat = '5'   
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
                                            else if ($row['cartStat'] == 3){
                                                echo "<td> Baking in Progress </td>";
                                            }
                                            else if ($row['cartStat'] == 4){
                                                echo "<td> Pending Delivery </td>";
                                            }
                                            else if ($row['cartStat'] == 5){
                                                echo "<td> Completed </td>";
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
                    <div style="display: flex; align-items: center;" class="mb-1">
                        <label class="form-control-static mr-2 mt-1 ml-5" style="font-weight: normal; width:150px;">Status: </label>
                                <select class="form-control select2 " name="stat" style="width: 200px;"  disabled>
                                    <option> <?php echo $stat; ?></option>
                                </select>
                    </div>                           
                </div>
            </div>

            <div class="modal-footer">
                <button id="btnEditTransact" class="btn btn-sm" style="background-color: #294C60; color: white;" data-toggle="modal" data-target="#ModalEditTransaction">
                    <i class="fas fa-edit"></i> Edit
                </button>
                <button id="btnDeactTransact" class="btn btn-sm" style="background-color: #294C60; color: white;" data-toggle="modal" data-target="#ModalDeleteTransact">
                        <i class="fas fa-trash-alt"></i> Deactivate
                    </button>
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
                <form action="SBAdmin2/includes/transactedit1.inc.php" method="post">
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
                                            <option value="2">Pending Payment</option>
                                            <option value="3">Baking in Process</option>
                                            <option value="4">Pending Delivery</option>
                                            <option value="5">Completed</option>
                                            <option value="6">Cancelled Order</option>
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

<div id="ModalDeleteTransact" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
    <?php ?>
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">Delete Transaction</h5>
                    <button class="close" id="ANUCloseModal" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <?php
                    require_once 'SBAdmin2/includes/transactviewdetails.inc.php';
                ?>

                <div class="modal-body">
                    Are you sure you want to deactivate this transaction? This action cannot be undone.
                </div>
                
                <div class="modal-footer">
                    <form action="SBAdmin2/includes/transacthide1.inc.php" method="get">
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

<div id="ModalPaymentLookup" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payment Lookup</h5>
                <button class="close" id="ANUCloseModal" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-sm text-gray-800" width="100%" id="FileManagementTable" style="text-align: center;">
                    <thead>
                        <tr>
                            <th>Recipient Number</th>
                            <th>Cake Order ID</th>
                            <th>Reference ID</th>
                            <th>Amount Sent</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            
                            include './SBAdmin2/includes/dbh.inc.php';

                            $sql = "SELECT * FROM payment WHERE stat = 1;";

                            if($result = mysqli_query($conn, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                        echo '
                                            <tr>
                                                <td>'.$row["cnum"].'</td>
                                                <td>'.$row["cakeID"].'</td>
                                                <td>'.$row["refID"].'</td>
                                                <td>'.$row["amount"].'</td>
                                                <td>
                                                    <a name="approve" id="" class="btn btn-primary btn-sm" href="./SBAdmin2/includes/transactpaymentappr.inc.php?id='.$row["id"].'&cakeID='.$row["cakeID"].'&refID='.$row["refID"].'" role="button" style="background-color: #294C60; color: white;"><i class="fas fa-check"></i> Confirm</a>
                                                    <a name="remove" id="" class="btn btn-danger btn-sm" href="./SBAdmin2/includes/transactpaymentrem.inc.php?id='.$row["id"].'" role="button" ><i class="fas fa-times"></i> Remove</a>
                                                </td>
                                            </tr>
                                        ';
                                    }
                                }
                            }
                            
                        ?>
                        
                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer text-left">
                <small>By clicking by the <strong class="text-success">confirm button</strong>, you hereby confirm that you recieved the correct amount for the assigned Cake Order ID.</small>
        
            </div>
        </div>
    </div>
</div>

<?php   
include './SBAdmin2/includes/alertmodal.inc.php';
    
if(isset($_GET['error'])){
    if($_GET['error'] == 'editemptyfields'){
        echo "
            <script>var alertEmptyFields = true; </script>                    
        ";
    }
    else if($_GET['error'] == 'paymentError'){
        echo "
            <script>var alertPaymentError = true; </script>                    
        ";
    }
    
}
else if(isset($_GET['success'])){
    if($_GET['success'] == 'sync'){
        echo "
            <script>var alertSyncTransact = true; </script>                    
        ";
    }
    else if($_GET['success'] == 'transactedited'){
        echo "
            <script>var alertTransactUpdated = true; </script>                    
        ";
    }
    else if($_GET['success'] == 'transactdeact'){
        echo "
            <script>var alertTransactDeact = true; </script>                    
        ";
    }
    else if($_GET['success'] == 'paymentapproved'){
        echo "
            <script>var alertPaymentApproved = true; </script>                    
        ";
    }
    else if($_GET['success'] == 'paymentremoved'){
        echo "
            <script>var alertPaymentRemoved = true; </script>                    
        ";
    }
    
}