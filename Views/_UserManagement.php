<link href="SBAdmin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="SBAdmin2/vendor/select2/select2.min.css" rel="stylesheet">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
    <div>
        <?php
            if($_SESSION['urid'] == 1){
                echo '
                <button id="btnAddNewUser" class="btn btn-sm" style="background-color: #294C60; color: white;" data-toggle="modal" data-target="#ModalAddNewUser">
                    <i class="fas fa-plus"></i> 
                    Add New User
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

            <div id="UserManagementDiv" style="color: gray;">
                <div>
                    <table id="UserManagementTable" class="table table-sm text-gray-800" width="100%">
                        <thead>
                            <tr role="row">
                                <th class="text-center sorting_asc" style="width: 127.2px;">User ID</th>
                                <th class="text-center sorting" style="width: 271.2px;">Fullname</th>
                                <th class="text-center sorting_asc" style="width: 205.2px;">Username</th>
                                <th class="text-center sorting" style="width: 173.2px;">Role</th>
                                <th class="text-center sorting_asc" style="width: 141.2px;">Status</th>
                                <th class="text-center sorting" style="width: 162.2px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                       
                        <?php 
                            //code for printing table data -start                     
                            require 'SBAdmin2/includes/dbh.inc.php';

                            $sql = "SELECT * FROM user 
                            INNER JOIN person
                            ON user.userpersonID = person.personID WHERE userStat = 1 OR userStat = 2 OR userStat = 4;";
                            if($result = mysqli_query($conn, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            $id = $row['personID'];
                                            echo "<td class='text-center' style='border-bottom: 1px solid lightgrey;'>" .$row['userID']."</td>";


                                            if(strlen($row['personMname']) == 0){
                                                echo "<td class='text-center' style='border-bottom: 1px solid lightgrey;'>" .$row['personLname'].", ".$row['personFname']."</td>";
                                            }
                                            else{
                                            echo "<td class='text-center' style='border-bottom: 1px solid lightgrey;'>" .$row['personLname'].", ".$row['personFname']." ".$row['personMname'][0]."</td>";
                                            }


                                            echo "<td class='text-center' style='border-bottom: 1px solid lightgrey;'>" .$row['userName']."</td>";

                                            if ($row['userRoleID'] == 1){
                                                echo "<td class='text-center' style='border-bottom: 1px solid lightgrey;'>Super Admin</td>";
                                            }
                                            else if ($row['userRoleID'] == 2){
                                                echo "<td class='text-center' style='border-bottom: 1px solid lightgrey;'>Admin</td>";
                                            }
                                            else if ($row['userRoleID'] == 3){
                                                echo "<td class='text-center' style='border-bottom: 1px solid lightgrey;'>Baker</td>";
                                            }
                                            else if ($row['userRoleID'] == 4){
                                                echo "<td class='text-center' style='border-bottom: 1px solid lightgrey;'>Seller</td>";
                                            }
                                            else if ($row['userRoleID'] == 5){
                                                echo "<td class='text-center' style='border-bottom: 1px solid lightgrey;'>Customer</td>";
                                            }
                                            else if ($row['userRoleID'] == 6){
                                                echo "<td class='text-center' style='border-bottom: 1px solid lightgrey;'>Viewer</td>";
                                            }
                                            else{
                                                echo "<td class='text-center' style='border-bottom: 1px solid lightgrey;'>Undefined Role</td>"; 
                                            }

                                            if ($row['userStat'] == 1){
                                                echo "<td class='text-center' style='border-bottom: 1px solid lightgrey;'>Active</td>";
                                            }
                                            else if ($row['userStat'] == 2){
                                                echo "<td class='text-center' style='border-bottom: 1px solid lightgrey;'>Inactive</td>";
                                            }
                                            else if ($row['userStat'] == 4){
                                                echo "<td class='text-center' style='border-bottom: 1px solid lightgrey;'>Pending</td>";
                                            }
                                            else{
                                                echo "<td class='text-center' style='border-bottom: 1px solid lightgrey;'>Undefined Status</td>"; 
                                            }
                                            echo "<form action='adUserManagement.php'>";
                                            echo "<td class=' text-center' style='border-bottom: 1px solid lightgrey'>
                                            <button name='view-submit' value='$id' type='submit' class='btn btn-sm' style='font-size: 12px; border: none; background-color: #294C60; color: white;' data-toggle='modal' data-target='#ModalViewUser'  ><i class='fa fa-eye'></i> View User</button></td>";
                                            echo "</form>";
                                        echo "</tr>";
                                    }
                                } 
                            }
                            // Close connection 
                            $conn->close();
                            //code for printing table data -end                         
                        ?>
           
                        </tbody>
                    </table>                
                
                 </div>
            </div>
        </div>
    </div>
</div>
<!-- table here - end -->

<div id="ModalAddNewUser" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New User</h5>
                    <button class="close" id="ANUCloseModal" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
            <form action="SBAdmin2/includes/useradd1.inc.php" method="post" enctype="multipart/form-data">
                <div class="row m-0 p-0">
                    <div class="col-sm-6 col-md-6 col-lg-6 modal-body p-3 ">
                        <div style="display:flex; justify-content: center; margin-bottom: 10px; ">
                            <img src="SBAdmin2/includes/useruploads/defaultprofile.jpg" alt="defaultpic" width="75%" class="rounded-circle" >
                        </div>
                        <div class="ml-3 mb-4">
                            <input type="file" name="theFILE">
                        </div>

                    </div>
                    
                    <div class="col-sm-6 col-md-6 col-lg-6 modal-body pl-1 ">
                        <h5 class="modal-title mb-3">User Information</h5>


                        <div style="display: flex; align-items: center;" class="mb-1">
                            <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:125px;">Firstname: </label>
                            <input type="text" name="fname" class="form-control form-control-user" 
                            
                            <?php
                                if(isset($_GET['fname'])){
                                    echo 'value="'.$_GET['fname'].'"';
                                }
                            ?>

                            >

                        </div>
                        <div style="display: flex; align-items: center;" class="mb-1">
                            <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:125px;">Middlename: </label>
                            <input type="text" name="mname" class="form-control form-control-user"
                            
                            <?php
                                if(isset($_GET['mname'])){
                                    echo 'value="'.$_GET['mname'].'"';
                                }
                            ?>

                            >
                        </div>
                        <div style="display: flex; align-items: center;" class="mb-1">
                            <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:125px;">Lastname: </label>
                            <input type="text" name="lname"  id="111role" class="form-control form-control-user" 
                            
                            <?php
                                if(isset($_GET['lname'])){
                                    echo 'value="'.$_GET['lname'].'"';
                                }
                            ?>

                            >
                        </div>
                        <div style="display: flex; align-items: center;" class="mb-1">
                            <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:125px;">Email: </label>
                            <input type="text" name="email"  id="111role" class="form-control form-control-user" 
                            
                            <?php
                                if(isset($_GET['email'])){
                                    echo 'value="'.$_GET['email'].'"';
                                }
                            ?>

                            >
                        </div>
                        <div style="display: flex; align-items: center;" class="mb-1">
                            <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:125px;">Contact #: </label>
                            <input type="text" name="cnum"  id="111role" class="form-control form-control-user" 
                            
                            <?php
                                if(isset($_GET['cnum'])){
                                    echo 'value="'.$_GET['cnum'].'"';
                                }
                            ?>

                            >
                        </div>
                        <div style="display: flex; align-items: center;" class="mb-1">
                            <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:125px;">Role: </label>
                                <select name="role"  class="form-control select2 " >
                                <?php
                                    if(isset($_GET['role'])){
                                        if($_GET['role'] == 1){
                                            echo '<option value="1">Super Admin</option>';
                                        }
                                        else if($_GET['role'] == 2){
                                            echo '<option value="2">Admin</option>';
                                        }
                                        else if($_GET['role'] == 3){
                                            echo '<option value="3">Baker</option>';
                                        }
                                        else if($_GET['role'] == 4){
                                            echo '<option value="4">Seller</option>';
                                        }
                                    }
                                ?>
                                    <option value="0">Select...</option>
                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>
                                    <option value="3">Baker</option>
                                    <option value="4">Seller</option>
                                </select>
                        </div>
                        <div style="display: flex; align-items: center;" class="mb-1">
                            <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:125px;">Username: </label>
                            <input type="text" name="uname" class="form-control form-control-user" 
                            
                            <?php
                                if(isset($_GET['uname'])){
                                    echo 'value="'.$_GET['uname'].'"';
                                }
                            ?>

                            >
                        </div>
                        <div style="display: flex; align-items: center;" class="mb-1">
                            <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:125px;">Password: </label>
                            <input type="password" name="pwd" class="form-control form-control-user" >
                        </div>
                        <div style="display: flex; align-items: center;" class="mb-1">
                            <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:125px;">Repeat Pass: </label>
                            <input type="password" name="pwd-repeat" class="form-control form-control-user" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnSubmitNewUser" name="signup-submit" class="btn btn-sm" style="background-color: #294C60; color: white;" type="submit">
                        <i class="fas fa-paper-plane"></i> Submit
                    </button>
                    
                </div>
            </form>
        </div>
    </div>
</div>


</div>

<div id="ModalViewUser" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">View User</h5>
                <button class="close" id="VUCloseModal" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

                <?php
                    if(isset($_GET['view-submit'])){
                    echo "<script>var modalViewUser = true;</script>";

                        echo "<div class='row m-0 p-0 '>"; 

                        //this section is for the profileImg of the user
                        echo "
                        <div class='modal-body p-3 col-sm-5 col-md-5 col-lg-5  my-auto'>
                            <div style='display:flex; justify-content: center; align-content: middle; margin-bottom: 10px' >";

                        require "SBAdmin2/includes/userviewdisp.inc.php";

                        echo"
                            </div>
                        </div>  ";   
                        
                        //this section is for the information of the user
                        require "SBAdmin2/includes/userviewdetails.inc.php";

                        echo "
                        <div class='modal-body pl-1 col-sm-7 col-md-7 col-lg-7 my-auto' >
                            <h5 class='modal-title mb-3'>User Information</h5>    

                            <div style='display: flex; align-items: center;' class='mb-1'>
                            <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Username: </label>
                            <input type='text' name='uname' class='form-control form-control-user'  value='".$uname."' disabled>
                            </div>

                            <div style='display: flex; align-items: center;' class='mb-1'>
                            <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Firstname: </label>
                            <input type='text' name='fname' class='form-control form-control-user'  value='".$fname."' disabled>
                            </div>
                        
                            <div style='display: flex; align-items: center;' class='mb-1'>
                            <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Middlename: </label>
                            <input type='text' name='mname' class='form-control form-control-user'  value='".$mname."' disabled>
                            </div>

                            <div style='display: flex; align-items: center;' class='mb-1'>
                            <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Lastname: </label>
                            <input type='text' name='lname' class='form-control form-control-user'  value='".$lname."' disabled>
                            </div>

                            <div style='display: flex; align-items: center;' class='mb-1'>
                            <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Email: </label>
                            <input type='text' name='email' class='form-control form-control-user'  value='".$email."' disabled>
                            </div>

                             <div style='display: flex; align-items: center;' class='mb-1'>
                            <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Contact #: </label>
                            <input type='text' name='cnum' class='form-control form-control-user'  value='".$cnum."' disabled>
                            </div>

                            <div style='display: flex; align-items: center;' class='mb-1'>
                            <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Role: </label>
                                    <select class='form-control select2 '  name='role'  disabled>
                                        <option>".$role." </option>
                                    </select>
                            </div>

                            <div style='display: flex; align-items: center;' class='mb-1'>
                            <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Status: </label>
                                    <select class='form-control select2 '  name='stat'  disabled>
                                        <option>".$stat." </option>
                                    </select>
                            </div>

                        </div>";                          


                        echo "</div>";
                    }
                ?>
                      
            <div class="modal-footer">

            <?php
                    if($_SESSION['urid'] == 1){
                        echo '
                            <button id="btnEditUser" class="btn btn-sm" style="background-color: #294C60; color: white;" data-toggle="modal" data-target="#ModalEditUser">
                                <i class="fas fa-edit"></i> Edit
                            </button>';
                        echo'

                            <button name="reset-submit" value="'.$_GET["view-submit"].'" class="btn btn-sm btn-warning" style="color: white;" data-toggle="modal" data-target="#ModalResetPass">
                                <i class="fas fa-undo"></i> Reset Password
                            </button>
                            
                            <button name="hide-submit" value="'.$_GET["view-submit"].'"  class="btn btn-sm btn-danger" style="color: white;" data-toggle="modal" data-target="#ModalDeleteUser">
                                <i class="fas fa-trash-alt"></i> Delete 
                            </button>
                        ';
                       
                    }
                    else{
                        echo '
                            <button class=" btn btn-sm btn-danger p-2" id="VUCloseModal" type="button" data-dismiss="modal" aria-label="Close">
                                Close
                            </button>
                        ';
                    }
                ?>  
            </div>  
        </div>
    </div>
</div>


<div id="ModalEditUser" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Edit User</h5>
                <button class="close" id="ANUCloseModal" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action=" SBAdmin2/includes/useredit1.inc.php" method="post" enctype="multipart/form-data">
                <div class="row m-0 p-0">
                
                    <?php                    
                    //to get info of selected user
                    require "SBAdmin2/includes/userviewdetails.inc.php"; ?>

                    <div class="col-sm-5 col-md-5 col-lg-5 my-auto modal-body p-3">
                        <div style="display:flex; justify-content: center; margin-bottom: 10px">
                            <?php
                            //this section is for the profileImg of the user
                            require "SBAdmin2/includes/userviewdisp.inc.php";
                            ?>
                        </div>
                        <div class="ml-3">
                            <input type="file" name="theFILE">
                        </div>
                    </div>
                    
                    <div class="col-sm-7 col-md-7 col-lg-7 my-auto modal-body pl-1">
                        <h5 class="modal-title mb-3">User Information</h5>  
                            

                        <div style="display: flex; align-items: center;" class="mb-1">
                            <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:125px;">Username: </label>
                            <input type="text" name="uname" class="form-control form-control-user"  value="<?php echo $uname;?>" >
                        </div>
                        <div style="display: flex; align-items: center;" class="mb-1">
                            <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:125px;">Firstname: </label>
                            <input type="text" name="fname" class="form-control form-control-user"  value="<?php echo $fname;?>">
                        </div>
                        <div style="display: flex; align-items: center;" class="mb-1">
                            <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:125px;">Middlename: </label>
                            <input type="text" name="mname" class="form-control form-control-user"  value="<?php echo $mname;?>">
                        </div>
                        <div style="display: flex; align-items: center;" class="mb-1">
                            <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:125px;" >Lastname: </label>
                            <input type="text" name="lname" class="form-control form-control-user"  value="<?php echo $lname;?>">
                        </div>
                        <div style="display: flex; align-items: center;" class="mb-1">
                            <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:125px;" >Email: </label>
                            <input type="text" name="email" class="form-control form-control-user"  value="<?php echo $email;?>">
                        </div>
                        <div style="display: flex; align-items: center;" class="mb-1">
                            <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:125px;" >Contact #: </label>
                            <input type="text" name="cnum" class="form-control form-control-user"  value="<?php echo $cnum;?>">
                        </div>
                        <div style="display: flex; align-items: center;" class="mb-1">
                            <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:125px;">Role: </label>
                                    <select class="form-control select2 "  name="role"  >
                                        <option value="<?php echo $rolevalue;?>"><?php echo $role;?></option>
                                        <option value="0">Select...</option>
                                        <option value="1">Super Admin</option>
                                        <option value="2">Admin</option>
                                        <option value="3">Baker</option>
                                        <option value="4">Seller</option>
                                    </select>
                        </div>
                        <div style="display: flex; align-items: center;" class="mb-1">
                            <label class="form-control-static mr-2 mt-1" style="font-weight: normal; width:125px;">Status: </label>
                                    <select class="form-control select2 " name="stat" >
                                    <option value="<?php echo $statvalue;?>"><?php echo $stat;?></option>
                                        <option value="0">Select...</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                        <option value="4">Pending</option>
                                    </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnSubmitNewUser" class="btn btn-sm" name="edit-submit" value="<?php  echo $_GET['view-submit']; ?>" style="background-color: #294C60; color: white;" type="submit">
                        <i class="fas fa-paper-plane"></i> Submit
                    </button>
                    
                </div>
            </form>
        </div>
    </div>
</div>


<div id="ModalResetPass" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
    <?php ?>
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">Reset User Password</h5>
                    <button class="close" id="ANUCloseModal" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <?php
                    require_once 'SBAdmin2/includes/userviewdetails.inc.php';
                ?>

                <div class="modal-body">
                    Are you sure you want to reset the password of this user? This action cannot be undone.
                </div>
                
                <div class="modal-footer">
                    <form action="SBAdmin2/includes/userpwd1.inc.php" method="get">
                        <button id="btnUndoEdit" class="btn btn-sm btn-warning" style="color: white;" name="reset-submit" type="submit" value="<?php echo $_GET['view-submit']; ?>">
                            <i class="fas fa-undo"></i> Confirm Reset Password
                        </button>
                    </form>
                    
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button> 
                </div>
                
            </div>
        </div>
    </div>
</div>

<div id="ModalDeleteUser" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
    <?php ?>
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">Deactivate User</h5>
                    <button class="close" id="ANUCloseModal" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <?php
                    require_once 'SBAdmin2/includes/userviewdetails.inc.php';
                ?>

                <div class="modal-body">
                    Are you sure you want to deactivate this user? This action cannot be undone.
                </div>
                
                <div class="modal-footer">
                    <form action="SBAdmin2/includes/userhide1.inc.php" method="get">
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
        if($_GET['error'] == 'editemptyfields'){
            echo "
                <script>var alertEmptyFields = true; </script>                    
            ";
        }
        else if($_GET['error'] == 'invaliduid'){
            echo "
                <script>var alertInvalidUsername = true; </script>                    
            ";
        }

        else if($_GET['error'] == 'passwordcheck'){
            echo "
                <script>var alertPasswordCheck = true; </script>                    
            ";
        }
        else if($_GET['error'] == 'unametaken'){
            echo "
                <script>var alertUsernameTaken = true; </script>                    
            ";
        }
        else if($_GET['error'] == 'extensionnotallowed'){
            echo "
                <script>var alertExtensionNotAllowed = true; </script>                    
            ";
        }
        else if($_GET['error'] == 'filetoolarge'){
            echo "
                <script>var alertFileTooLarge = true; </script>                    
            ";
        }

    }
    else if(isset($_GET['success'])){
        if($_GET['success'] == 'useradded'){
            echo "
                <script>var alertUserAdded = true; </script>                    
            ";
        }
        else if($_GET['success'] == 'useredited'){
            echo "
                <script>var alertUserUpdated = true; </script>                    
            ";
        }
        else if($_GET['success'] == 'passreset'){
            echo "
                <script>var alertPassReset = true; </script>                    
            ";
        }
        else if($_GET['success'] == 'userdeact'){
            echo "
                <script>var alertUserDeact = true; </script>                    
            ";
        }
        else if($_GET['success'] == 'userlogout'){
            echo "
                <script>var alertUserLogout = true; </script>                    
            ";
        }

    }
?>