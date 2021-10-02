<?php
                
                if (isset($_GET['archive'])){
                    if ($_GET['archive'] == 'multiplearchive') {
                        echo "<span style='color: red;'>An attempt to hide the record of the archive activity was dismissed.</span><br>";
                        echo "<span><a class='refreshlink' href='ActivityLog.php'>Click here to refresh</a></span><br><br>";
                    }
                }

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
                        WHERE actCategoryID > 10
                        ORDER BY actDate DESC;";
                        
                        }
                        if( $display == 2 ){
                            $stmt = "SELECT `activity`.*, `user`.`userName`, `user`.`userPersonID`,`role`.`roleDesc`
                            FROM `activity` 
                            JOIN `user`
                            ON `activity`.`actUserID` = `user`.`userID`
                            JOIN `role`
                            ON `user`.`userRoleID` = `role`.`roleID`
                            WHERE actCategoryID > 10
                            ORDER BY userName, actDate DESC;";
                        }
                        if( $display == 3 ){
                            $stmt = "SELECT `activity`.*, `user`.`userName`, `user`.`userPersonID`,`role`.`roleDesc`
                            FROM `activity` 
                            JOIN `user`
                            ON `activity`.`actUserID` = `user`.`userID`
                            JOIN `role`
                            ON `user`.`userRoleID` = `role`.`roleID`
                            WHERE actCategoryID > 10
                            ORDER BY actCategoryID, actDate DESC;";
                        }

                        $result = mysqli_query($conn, $stmt);

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
                                    
                                    require 'SBAdmin2/includes/activitylist2.inc.php';
                                }

                                //to display names of the module when activity log is ordered by module activity

                                else if( $display == 3 ){

                                    if ( $row['actCategoryID'] == 11 OR $row['actCategoryID'] == 12 OR $row['actCategoryID'] == 13){
                                        $module = "User Management";    
                                    }
                                    else if ( $row['actCategoryID'] == 14 OR $row['actCategoryID'] == 15 OR $row['actCategoryID'] == 16){
                                        $module = "Product Management";    
                                    }
                                    else if ( $row['actCategoryID'] == 17 OR $row['actCategoryID'] == 18 OR $row['actCategoryID'] == 19){
                                        $module = "Transactions";    
                                    }
                                    else {
                                        $module = "Duplicate Archived Record Reference";
                                        //tho I doubt that a duplicate record will exist, but just in case, we'll just leave it here
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
                                    require 'SBAdmin2/includes/activitylist2.inc.php';
                                }
                                else{
                                    require 'SBAdmin2/includes/activitylist2.inc.php';
                                }
                              
                            }
                            
                        }
                        else {
                            echo 'No records to display';
                        }
                        
                    
                mysqli_close($conn);
            ?>