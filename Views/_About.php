    <link href="SBAdmin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="SBAdmin2/vendor/select2/select2.min.css" rel="stylesheet">




    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>

    </div>

    <!-- table here - start -->
    <div style="font-family: Arial;">
        <div class="card shadow mb-3">       
            <div class="card-body " cellspacing="0" style="border-bottom: 0.25rem solid #001B2E;">
                <div class="text-center">
                    
                    <img class="w-50 " src="./SBAdmin2/img/1.png" alt="">
                </div>
                <p class="text-center">
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#AboutUs" aria-expanded="false" aria-controls="collapseExample" style="background-color: #294C60; border-color:transparent;">
                        About Us
                    </button>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#PrivacyPolicy" aria-expanded="false" aria-controls="collapseExample" style="background-color: #294C60; border-color:transparent;">
                        Privacy Policy
                    </button>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#TermsAndConditions" aria-expanded="false" aria-controls="collapseExample" style="background-color: #294C60; border-color:transparent;">
                        Terms and Conditions
                    </button>
                </p>
                <div class="collapse" id="AboutUs">
                    <div class="card card-body">
                        <h4>About Us</h4>
                        Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                </div>
                <div class="collapse" id="PrivacyPolicy">
                    <div class="card card-body">
                        <h4>Privacy Policy</h4>
                        Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                </div>
                <div class="collapse" id="TermsAndConditions">
                    <div class="card card-body">
                        <h4>Terms and Conditions</h4>
                        Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- table here - end -->
