<?php
    if(isset($_GET['orderBy'])){
        if (!isset($_SESSION['search'])) {
            echo 'No results';
        }
        else{    
            $display = $_GET['orderBy'];
               
        $search = $_SESSION['search'];
        include "SBAdmin2/includes/dbh.inc.php";
                
                $newdate = date_create(0000-00-00);
                $onceweek = 0;
                $onceyear = 0;
                
                $onceuser = 0;
                $curruser = " ";

                $oncemodule = 0;
                $currmodule = " ";

                        if( $display == 1 OR $display == 0 ){
                        $stmt = "SELECT `activity`.*, `user`.`userName`,`user`.`userPersonID`, `role`.`roleDesc`
                        FROM `activity` 
                        JOIN `user`
                        ON `activity`.`actUserID` = `user`.`userID`
                        JOIN `role`
                        ON `user`.`userRoleID` = `role`.`roleID`
                        WHERE actCategoryID < 11 AND (
                        actID LIKE '%$search%' 
                        OR actUserID LIKE '%$search%' 
                        OR actCategoryID LIKE '%$search%' 
                        OR userName LIKE '%$search%' 
                        OR roleDesc LIKE '%$search%'
                        OR actDate LIKE '%$search%'
                        OR actDesc LIKE '%$search%')                       
                        ORDER BY actDate DESC;";
    
                        $result = mysqli_query($conn, $stmt);
                        echo $search;
                        }
                        else if( $display == 2 ){
                            $stmt = "SELECT `activity`.*, `user`.`userName`, `user`.`userPersonID`,`role`.`roleDesc`
                            FROM `activity` 
                            JOIN `user`
                            ON `activity`.`actUserID` = `user`.`userID`
                            JOIN `role`
                            ON `user`.`userRoleID` = `role`.`roleID`
                            WHERE actCategoryID < 11 AND (
                            actID LIKE '%$search%' 
                            OR actUserID LIKE '%$search%' 
                            OR actCategoryID LIKE '%$search%' 
                            OR userName LIKE '%$search%' 
                            OR roleDesc LIKE '%$search%'
                            OR actDate LIKE '%$search%'
                            OR actDesc LIKE '%$search%')  
                            ORDER BY userName, actDate DESC;";
                        $result = mysqli_query($conn, $stmt);
                    
                        }
                        else if( $display == 3 ){
                            $stmt = "SELECT `activity`.*, `user`.`userName`, `user`.`userPersonID`,`role`.`roleDesc`
                            FROM `activity` 
                            JOIN `user`
                            ON `activity`.`actUserID` = `user`.`userID`
                            JOIN `role`
                            ON `user`.`userRoleID` = `role`.`roleID`
                            WHERE actCategoryID < 11 AND (
                            actID LIKE '%$search%' 
                            OR actUserID LIKE '%$search%' 
                            OR actCategoryID LIKE '%$search%' 
                            OR userName LIKE '%$search%' 
                            OR roleDesc LIKE '%$search%'
                            OR actDate LIKE '%$search%'
                            OR actDesc LIKE '%$search%')  
                            ORDER BY actCategoryID, actDate DESC;";
                        $result = mysqli_query($conn, $stmt);
                        }
                        
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck > 0){
                            
                            while ($row = mysqli_fetch_assoc($result)){
                                $fulldate = $row['actDate']; 
                                $date = strtotime($fulldate); 
                                $currdate = date('Y-m-d',$date);
                                $currtime = date('g:i A',$date);
                                $curryear = date('Y',$date);
                                
                                
                                //to display names of the user when activity log is ordered by users
                                if( $display == 2 ){
                                    if ($curruser != $row['userName']){
                                        $onceuser = 0;
                                        $newdate = date_create(0000-00-00);
                                        $onceweek = 0;
                                        $onceyear = 0;
                                    }
                                    if ($onceuser == 0) {
                                        echo "<hr><h4>".$row['userName']."</h4>";    
                                    }
                                    $onceuser++;
                                    
                                    $curruser = $row['userName'];
                                    require 'SBAdmin2/includes/activitylist3.inc.php';
                                }

                                //to display names of the module when activity log is ordered by module activity

                                else if( $display == 3 ){

                                    if ( $row['actCategoryID'] == 1 OR $row['actCategoryID'] == 2 OR $row['actCategoryID'] == 3){
                                        $module = "User Management";    
                                    }
                                    else if ( $row['actCategoryID'] == 4 OR $row['actCategoryID'] == 5 OR $row['actCategoryID'] == 6){
                                        $module = "Product Management";    
                                    }
                                    else if ( $row['actCategoryID'] == 7 OR $row['actCategoryID'] == 8 OR $row['actCategoryID'] == 9){
                                        $module = "Transactions";    
                                    }
                                    else {
                                        $module = "Archived Record Reference";
                                    }

                                    if ($currmodule != $module){
                                        $oncemodule = 0;
                                        $newdate = date_create(0000-00-00);
                                        $onceweek = 0;
                                        $onceyear = 0;
                                    }
                                    if ($oncemodule == 0) {
                                        echo "<hr><h4>".$module."</h4>";    
                                    }
                                    $oncemodule++;
                                    
                                    $currmodule = $module;
                                    require 'SBAdmin2/includes/activitylist3.inc.php';
                                }
                                else{
                                    require 'SBAdmin2/includes/activitylist3.inc.php';
                                }
                            }
                        }
                        
                        else {
                            echo 'No records to display';
                        }

                    
                mysqli_close($conn);

        }
    }
    else{
        require "dbh.inc.php";

        $search = mysqli_real_escape_string($conn,$_GET['search']); 
        $_SESSION['search'] = $_GET['search'];
        
        if (empty($search)){
            header("Location: ../../ActivityLogSearch.php?error=emptyfield");
            exit();
        }
        else {
            
            $sql = "SELECT `activity`.*, `user`.`userName`, `user`.`userPersonID`,  `role`.`roleDesc`
                        FROM `activity` 
                        JOIN `user`
                        ON `activity`.`actUserID` = `user`.`userID`
                        JOIN `role`
                        ON `user`.`userRoleID` = `role`.`roleID`
                        WHERE actCategoryID < 11 AND (
                        actID LIKE '%$search%' 
                        OR actUserID LIKE '%$search%' 
                        OR actCategoryID LIKE '%$search%' 
                        OR userName LIKE '%$search%' 
                        OR roleDesc LIKE '%$search%'
                        OR actDate LIKE '%$search%'
                        OR actDesc LIKE '%$search%')                         
                        ORDER BY actDate DESC;";
            
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../../ActivityLogSearch.php?error=sqlerror");
                exit();
            }
            else{           
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);

                $newdate = date_create(0000-00-00);
                $onceweek = 0;
                $onceyear = 0;
                
                $onceuser = 0;
                $curruser = " ";

                $oncemodule = 0;
                $currmodule = " ";

                if ($resultCheck > 0){
                    while ($row = mysqli_fetch_assoc($result)){ 
                        $fulldate = $row['actDate']; 
                        $date = strtotime($fulldate); 
                        $currdate = date('Y-m-d',$date);
                        $currtime = date('g:i A',$date);
                        $curryear = date('Y',$date);
                        
                        require 'activitylist3.inc.php';                      
                    }  
                               
                }
                else {
                    echo "No results to display";
                } 
            }             
        }
        

    }