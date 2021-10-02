<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<script src="SBAdmin2/vendor/chart.js/Chart.min.js" type="text/javascript"></script>
<?php
require 'SBAdmin2/includes/dashorderscompleted.inc.php';
?>
<?php if (($role === "Baker" || $role === "Seller") && ($isPersonalInfoComplete == 0 || $isContactInfoComplete == 0)) {

    echo '<div class="row" id="alertInfo">
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text mb-1">
                                It seems your personal information is incomplete, please visit <a href="adMyProfile.php" style="color: #001B2E;">My Profile</a> page and complete your information.
                                </div>                              
                            </div>
                            <div class="col-auto" style="color: #001B2E;">
                                <i class="fas fa-times fa-1x" id="closeInfo" style="cursor: pointer;"></i>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>';
}

?>
<div class="row">
    <div class="col-xl-6 col-md-6 mb-2">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="border-left: 0.25rem solid #001B2E;">
                <h6 class="m-0 font-weight-bold" style="color: #001B2E;">Monthly Sales</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChartMonthly"></canvas>
                </div>
                <br />
                <div class="row no-gutters align-items-center" style="border-top: 2px solid #001B2E; padding-top: 10px;">
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-800"></i>
                    </div>
                    <div class="col ml-2">

                        <div class="h5 m-0 font-weight-bold text-gray-800"><?php echo "₱ " . number_format($MonthlyFinal, 2, '.', ','); ?></div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #001B2E;">Average Monthly Earnings</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-2">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="border-left: 0.25rem solid #001B2E;">
                <h6 class="m-0 font-weight-bold" style="color: #001B2E;">Annual Sales</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChartAnnual"></canvas>
                </div>
                <br />
                <div class="row no-gutters align-items-center" style="border-top: 2px solid #001B2E; padding-top: 10px;">
                    <div class="col-auto">
                        <i class="far fa-money-bill-alt fa-2x text-gray-800"></i>
                    </div>
                    <div class="col ml-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "₱ " . number_format($Monthly, 2, '.', ','); ?></div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #294C60;">Average Annual Earnings</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php if (($role === "Baker" || $role === "Seller") && ($isPersonalInfoComplete == 0 || $isContactInfoComplete == 0)) {
echo '<div class="row">

        <div class="col-xl-4 col-md-6 mb-2">
            <div class="card  shadow h-100 py-2" style="border-left: 0.25rem solid #001B2E;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #294C60;">Pending Payment
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">'. $completedPayment .'%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar" role="progressbar" style="width:' . $completedPayment . '%; background: #294C60;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-check-alt fa-2x text-gray-800"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-2">
            <div class="card  shadow h-100 py-2" style="border-left: 0.25rem solid #001B2E;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #294C60;">Pending Cake
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">'. $completedCake .'%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar" role="progressbar" style="width:' . $completedCake . '%; background: #294C60;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-birthday-cake fa-2x text-gray-800"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-2">
            <div class="card  shadow h-100 py-2" style="border-left: 0.25rem solid #001B2E;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #294C60;">Pending Delivery
                            </div>
                            <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">'. $completedDelivery .'%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar" role="progressbar" style="width:' . $completedDelivery . '%; background: #294C60;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-route fa-2x text-gray-800"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </div>';
}
else if($role === "Super Admin" || $role === "Admin"){
    echo '<div class="row">
            <div class="col-xl-12 col-md-12 mb-2">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="border-left: 0.25rem solid #001B2E;">
                        <h6 class="m-0 font-weight-bold" style="color: #001B2E;">User List Count</h6>
                    </div>
                    <div class="card-body">      
                        <div class="row no-gutters align-items-center" style="border-bottom: 1px solid #001B2E;" >
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-800"></i>
                            </div>
                            <div class="col ml-2">
        
                                <div class="h5 m-0 font-weight-bold text-gray-800" id="totalUser">0</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #001B2E;">Total No. of User(s)</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                 <i class="fas fa-user-check fa-2x text-gray-800"></i>
                            </div>
                            <div class="col ml-2">
        
                                <div class="h5 m-0 font-weight-bold text-gray-800">'. $pendingApproval . '&nbsp;&nbsp;
                                    <a href="adUserManagement.php"><button id="btnSubmitNewUser"  class="btn btn-sm" style="background-color: #294C60; color: white; padding-top: 2px; padding-bottom: 1px;" type="button">
                                        <i class="fas fa-eye"></i> View
                                    </button></a>
                                </div> 
                            
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #001B2E;">Total No. of Seller (Pending for Approval)</div>
                                    </div>
                                </div>
                            </div>
                        </div>                      
                        <br />
                        <div class="table-responsive">
                            <table style="width:100%;" class="table table-sm" id="UserTable">
                            </table>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>';
}
?>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/JavaScript">
    function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
    }

    $("#closeInfo").on('click', function() {
        document.getElementById('alertInfo').style.display = 'none';
    });
    var MonthArray = [];
    var MonthLabel = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var MonthData = [0, 0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0];
    
    MonthArray = '<?php echo json_encode($MonthArray['result']['']) ?>';
    if(JSON.parse(MonthArray).length > 0) {
        for (var i = 0; i < MonthLabel.length; i++) {
            JSON.parse(MonthArray).forEach((key, index) => {
            
                if(MonthLabel[i] === key['MONTHNAME']) {
                    MonthData[i] = key['Monthly'];
            }         
            });
        }
    }
 
    // Area Chart Example
    var ctxMonthly = document.getElementById("myAreaChartMonthly");
    var myLineChartMonthly = new Chart(ctxMonthly, {
    type: 'line',
    data: {
        labels: MonthLabel,
        datasets: [{
        label: "Earnings",
        lineTension: 0.3,
        backgroundColor: "rgba(78, 115, 223, 0.05)",
        borderColor: "rgba(78, 115, 223, 1)",
        pointRadius: 3,
        pointBackgroundColor: "rgba(78, 115, 223, 1)",
        pointBorderColor: "rgba(78, 115, 223, 1)",
        pointHoverRadius: 3,
        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
        pointHitRadius: 10,
        pointBorderWidth: 2,
        data: MonthData,
        }],
    },
    options: {
        maintainAspectRatio: false,
        layout: {
        padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
        }
        },
        scales: {
        xAxes: [{
            time: {
            unit: 'date'
            },
            gridLines: {
            display: false,
            drawBorder: false
            },
            ticks: {
            maxTicksLimit: 7
            }
        }],
        yAxes: [{
            ticks: {
            maxTicksLimit: 5,
            padding: 10,
            // Include a dollar sign in the ticks
            callback: function(value, index, values) {
                return '₱ ' + number_format(value);
            }
            },
            gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2]
            }
        }],
        },
        legend: {
        display: false
        },
        tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        mode: 'index',
        caretPadding: 10,
        callbacks: {
            label: function(tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + ': ₱ ' + number_format(tooltipItem.yLabel);
            }
        }
        }
    }
    });

    var AnnualArray = [];
    var AnnualLabel = [];
    var AnnualData = [];
    AnnualArray = '<?php echo json_encode($AnnualArray['result']['']) ?>';
    if(JSON.parse(AnnualArray).length > 0) {
        JSON.parse(AnnualArray).forEach((key, index) => {
            AnnualLabel.push(key['YEAR']);
            AnnualData.push(key['Yearly']);
        });
    }
    else {
        var newDate = new Date();
        var year = newDate.getFullYear();
        AnnualLabel.push(year);
        AnnualData.push(0);
    }
    var ctxAnnual = document.getElementById("myAreaChartAnnual");
    var myLineChartAnnual = new Chart(ctxAnnual, {
    type: 'line',
    data: {
        labels: AnnualLabel,
        datasets: [{
        label: "Earnings",
        lineTension: 0.3,
        backgroundColor: "rgba(78, 115, 223, 0.05)",
        borderColor: "rgba(78, 115, 223, 1)",
        pointRadius: 3,
        pointBackgroundColor: "rgba(78, 115, 223, 1)",
        pointBorderColor: "rgba(78, 115, 223, 1)",
        pointHoverRadius: 3,
        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
        pointHitRadius: 10,
        pointBorderWidth: 2,
        data: AnnualData,
        }],
    },
    options: {
        maintainAspectRatio: false,
        layout: {
        padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
        }
        },
        scales: {
        xAxes: [{
            time: {
            unit: 'date'
            },
            gridLines: {
            display: false,
            drawBorder: false
            },
            ticks: {
            maxTicksLimit: 7
            }
        }],
        yAxes: [{
            ticks: {
            maxTicksLimit: 5,
            padding: 10,
            // Include a dollar sign in the ticks
            callback: function(value, index, values) {
                return '₱ ' + number_format(value);
            }
            },
            gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2]
            }
        }],
        },
        legend: {
        display: false
        },
        tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        mode: 'index',
        caretPadding: 10,
        callbacks: {
            label: function(tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + ': ₱ ' + number_format(tooltipItem.yLabel);
            }
        }
        }
    }
    });
    var UserArray = [];
    var totalNumberofUser = 0;
    UserArray = '<?php echo json_encode($UserArray['result']['']) ?>';
    if(JSON.parse(UserArray).length > 0) {
        JSON.parse(UserArray).forEach((key, index) => {
            totalNumberofUser += parseInt(key['NumberOfUser']);
        });
    }
    document.getElementById('totalUser').innerHTML = totalNumberofUser;
    $('#UserTable').DataTable({
        data: JSON.parse(UserArray),
        paging: true,
        serverSide: false,
        createdRow: function (row, data, dataIndex, full) {
            $('td', row).css("border-bottom", "1px solid lightgrey");
        },
        footerCallback: function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 0 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column(0, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 0 ).footer() ).html(
                '$'+pageTotal +' ( $'+ total +' total)'
            );
        },
        columns:
            [               
                {
                    title: "No. Of User(s)", data: 'NumberOfUser'
                },
                {
                    title: "Role", data: 'roleDesc'
                },
            ],       
        destroy: true,

    });

</script>