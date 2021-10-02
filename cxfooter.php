

<!-- pink line -->
<div class="card mt-5 " style="background: rgb(209, 89,87);">
  <div class="row mx-0">
    <div class="col-sm-1 col-md-1 col-lg-1  py-1">
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3  py-2">
      <i class="far fa-thumbs-up text-white fa-2x ps-1" aria-hidden="true"></i>
      <span class="text-white   fw-bold ">FREE DELIVERY ON ALL ORDER</span>
    </div>
    <div class="col-sm-1 col-md-1 col-lg-1  py-1">
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3  py-2">
      <i class="far fa-clock text-white fa-2x ps-1" aria-hidden="true"></i>
      <span class="text-white   fw-bold ">CHOOSE YOUR DELIVERY SPOT & DATE</span>
    </div>
    <div class="col-sm-1 col-md-1 col-lg-1  py-1">
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3  py-2">
      <i class="fa fa-birthday-cake text-white fa-2x ps-1" aria-hidden="true"></i>
      <span class="text-white   fw-bold ">FINEST SELECTION OF CAKES</span>
    </div>
    <div class="col-sm-1 col-md-1 col-lg-1  py-1">
    </div>
  </div>
</div>

<!-- contact details -->
<div class="card mt-5 text-center" style="background:transparent; border-color: transparent;">
  <div class="row mx-0">

    <div class="col-sm-4 col-md-4 col-lg-4  py-2">
      <h4 style="font-family:noah; font-weight: bold;">INFORMATION</h4>
      <h6>
        <a href="cxaboutus.php" class="link-ftr fs-6">ABOUT US</a>
      </h6>
      <h6>
        <a href="cxseller.php" class="link-ftr fs-6">BE A SELLER!</a>
      </h6>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-4  py-2">
      <h4 style="font-family:noah; font-weight: bold;">CUSTOMER SERVICE</h4>
      <h6>
        <a href="cxcontactus.php" class="link-ftr fs-6">CONTACT US</a>  
      </h6>
      <h6>
        <a href="cxprivacy.php" class="link-ftr fs-6">PRIVACY POLICY</a>
      </h6>
      <h6>
        <a href="cxterms.php" class="link-ftr fs-6">TERMS AND CONDITIONS</a>
      </h6>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-4  py-2">
      <h4 style="font-family:noah; font-weight: bold;">CONTACT US</h4>
      <h6>
        <ul >
          <li class="link-ftr"> <i class="fa fa-phone pr-2" aria-hidden="true"></i> (02) 123-4567</li>
          <li class="link-ftr"> <i class="fas fa-comments pr-2 "></i> 09123456789 (globe)</li>
          <li class="link-ftr"> <i class="fas fa-comments pr-2"></i> 09123456789 (smart)</li>
          <li class="link-ftr"> <i class="fa fa-location-arrow pr-2" aria-hidden="true"></i> <a href="https://cakehubph.000webhostapp.com/index-1.php" class="link-ftr">www.cakehubph.000webhostapp.com</a></li>
          <li class="link-ftr"> <i class="fa fa-envelope pr-2" aria-hidden="true"></i>  info@cakehub.ph</li>
        </ul>

      </h6>
    </div>

  </div>
</div>

<hr class="w-75 m-auto">
<br>
<span class="link-ftr p-5">© 2021 Cakehub Philippines</span>


<script src="./js/script-navbar1.js"></script>


<script>
  const outputElement0 = document.getElementById("cxseller");
  const outputElement = document.getElementById("cxcart");
  const outputElement1 = document.getElementById("myprofile");

  const smallDevice = window.matchMedia("(min-width: 576px)");

  smallDevice.addListener(handleDeviceChange);

  function handleDeviceChange(e) {
    if (e.matches) {
      outputElement0.textContent = "";
      outputElement.textContent = "";
      outputElement1.textContent = "";
    }
    else {
      outputElement0.textContent = "Be A Seller!";
      outputElement.textContent = "My Cart";
      outputElement1.textContent = "My Profile";
    }
  }

  // Run it initially
  handleDeviceChange(smallDevice);
</script>

</body>
</html>