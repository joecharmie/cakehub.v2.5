<?php
echo 
                                    "<div class='container'>
                                        <div style='display: flex; align-items: center; justify-content: space-between;'>
                                            <div style='display: flex; align-items: center;'>";
                                                
                                            require "SBAdmin2/includes/actdisp.inc.php";

                                            echo                                             
                                            "<div >
                                                    <div style='margin-top:0px; margin-bottom:-3px; background-color: ;'><b>".
                                                        $row['userName']."</b>
                                                    </div>
                                                    <div style='margin-top:-3px; margin-bottom:-3px; background-color: ;'>".
                                                        $row['roleDesc'].
                                                    "</div><div style='max-width: 600px; padding-left: 25px; background-color: ;'>". 
                                                    $row['actDesc'].
                                                    "</div>
                                                </div>
                                            </div>
                                            <div class='container-time'>
                                                <span class='activitytime'>".$currtime."</span>
                                                ";

                                                require 'actoptiondrop3.inc.php';

echo "                                        
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <br>";