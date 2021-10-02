<head>
    <link rel="stylesheet" href="SBAdmin2/css/buttonanchor.css">
</head>
<style>
    .refreshlink{
        color: lightblue;
        font-size: 20px;
    }
    .refreshlink:hover{
        color: #294C60; 
    }

</style>
<?php
    if (isset($_GET['orderBy'])){
        $display = $_GET['orderBy'];
    }
    else {
        $display = 0;
    }
?>
<div class="container-fluid" style="font-family: Arial; color: gray;">
    <div class="card shadow mb-3">       
        <div class="card-body">
            
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <div>
                        <a class='refreshlink' href='ActivityLog.php'>
                        <i class='fas fa-arrow-left'></i>
                        Back to Activity Log</a>
                </div>
                <div style="display: flex; align-items: center;">
                    
                    <!--joe made drop down for order by - starts here-->
                        <ul style="list-style-type:none; padding-left: 0px; margin-bottom: 0px">           
                            <li class="dropdown no-arrow" >
                                <a href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    
                                <button style="margin-right:5px;">Order By</button>
                                    
                                </a> 
                                <!-- Dropdown - List -->
                                    <div class="dropdown-menu shadow" aria-labelledby="userDropdown" style="background-color: white; margin-top: 7px; margin-left: -80px;">  
                                        <?php
                                            if ($display == 2 OR $display == 3){
                                            echo "
                                            <form action='ActivityLogArchives.php' method='get'>
                                            <button class='dropdown-item' type='submit' name='orderBy' value='1'>                             
                                                    <span>
                                                        <i class='fas fa-calendar-alt' style= 'color: #001B2E; margin-right: 5px;'></i>
                                                        Date
                                                    </span>
                                                
                                            </button>
                                            </form>";
                                            }
                                        ?>
                                        <?php
                                            if ($display == 1 OR $display == 3 OR $display == 0){
                                            echo "
                                            <form action='ActivityLogArchives.php' method='get'>
                                            <button class='dropdown-item' type='submit' name='orderBy' value='2'>                             
                                                    <span>
                                                        <i class='fas fa-users' style= 'color: #001B2E; margin-right: 5px;'></i>
                                                        Users
                                                    </span>
                                                
                                            </button>
                                            </form>";
                                            }
                                        ?>
                                        <?php
                                            if ($display == 1 OR $display == 2 OR $display == 0){
                                            echo "
                                            <form action='ActivityLogArchives.php' method='get'>
                                            <button class='dropdown-item' type='submit' name='orderBy' value='3'>                             
                                                    <span>
                                                        <i class='fas fa-cog' style= 'color: #001B2E; margin-right: 5px;'></i>
                                                        Module Activity
                                                    </span>
                                                
                                            </button>
                                            </form>";
                                            }
                                        ?>
                                    </div>
                            </li>
                        </ul>
                    <!--joe made drop down for order by - ends here-->
                </div>
            </div>
            <br>
            <?php
                /*$display = 0; 
                0 means display by default. 
                1 - display order by date. 
                2 - display order by users
                3 - display order by activity

                */
                if ($display == 1) {
                    echo "<h4>Display By Date</h4>";
                }
                else if ($display == 2) {
                    echo "<h4 style='padding-top: 10px;'>Display By Users</h4>";
                }
                else if ($display == 3) {
                    echo "<h4/>Display By Module Activity</h4>";
                }
                else{
                    echo "<h4/>Recent Activity</h4>";
                }
                require 'SBAdmin2/includes/actarchivelist.inc.php';
            ?>
        </div>
    </div>
</div>