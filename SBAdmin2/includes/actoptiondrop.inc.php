<?php
    echo "
    <ul style='list-style-type:none; margin-right: 50px;'>           
        <li class='dropdown no-arrow'>
            <a class='dropdown-toggle' href='#' id='userDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <i class='fas fa-ellipsis-v' style= 'color: white; background-color: lightgray; width: 30px; height: 30px; align-self: center; border-radius: 50%; padding-left: 12px; padding-top: 8px;'></i>
            </a> 
            <!-- Dropdown - List -->
                <div class='dropdown-menu shadow' aria-labelledby='userDropdown' style='background-color: white; margin-top: 5px; margin-left: 15px;'>      
                    <form action='SBAdmin2/includes/actarchive.inc.php' method='get'>
                    <button class='dropdown-item' type='submit' name='activityID' value='".$row['actID']." '>                             
                            <span>
                                <i class='fas fa-archive' style= 'color: #001B2E; margin-right: 5px;'></i>
                                Archive
                            </span>
                        
                    </button>
                    </form>
                </div>
        </li>
    </ul>
    ";