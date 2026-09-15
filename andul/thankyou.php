
<?php
$redirectUrl = "https://www.wbnarayanaschools.in/index.html";

if(isset($_GET['branch'])) {
    $branch = $_GET['branch'];

    switch ($branch) {
        case 'Andal': $redirectUrl = "https://www.narayanaschools.in/west-bengal/andal/fee-structure"; break;
        case 'Andul': $redirectUrl = "https://www.narayanaschools.in/west-bengal/andul/fee-structure"; break;
        case 'Asansol': $redirectUrl = "https://www.narayanaschools.in/west-bengal/asansol/fee-structure"; break;
        case 'Bally': $redirectUrl = "https://www.narayanaschools.in/west-bengal/bally/fee-structure"; break;
        case 'Barasat': $redirectUrl = "https://www.narayanaschools.in/west-bengal/barasat/fee-structure"; break;
        case 'Basirhat': $redirectUrl = "https://www.narayanaschools.in/west-bengal/basirhat/fee-structure"; break;
        case 'Murshidabad-berhampore': $redirectUrl = "https://www.narayanaschools.in/west-bengal/murshidabad-berhampore/fee-structure"; break;
        case 'BARDHAMAN': $redirectUrl = "https://www.narayanaschools.in/west-bengal/bardhaman/fee-structure"; break;
        case 'Durgapur': $redirectUrl = "https://www.narayanaschools.in/west-bengal/durgapur/fee-structure"; break;
        case 'Fulbari': $redirectUrl = "https://www.narayanaschools.in/west-bengal/fulbari/fee-structure"; break;
        case 'Haldia': $redirectUrl = "https://www.narayanaschools.in/west-bengal/haldia/fee-structure"; break;
        case 'Howrah': $redirectUrl = "https://www.narayanaschools.in/west-bengal/howrah/fee-structure"; break;
        case 'Uttar dinajpur raiganj': $redirectUrl = "https://www.narayanaschools.in/west-bengal/uttar-dinajpur-raiganj/fee-structure"; break;
        case 'Krishnanagar City': $redirectUrl = "https://www.narayanaschools.in/west-bengal/krishnanagar-city/fee-structure"; break;
        case 'Kalimpong 12th mile':
        case 'Kalimpong': $redirectUrl = "https://www.narayanaschools.in/west-bengal/kalimpong/fee-structure"; break;
        case 'Kalyani-express': $redirectUrl = "https://www.narayanaschools.in/west-bengal/kalyani-express/fee-structure"; break;
        case 'Kalyani-town': $redirectUrl = "https://www.narayanaschools.in/west-bengal/kalyani-town/fee-structure"; break;
        case 'Maheshtala': $redirectUrl = "https://www.narayanaschools.in/west-bengal/maheshtala/fee-structure"; break;
        case 'New Town': $redirectUrl = "https://www.narayanaschools.in/west-bengal/new-town/fee-structure"; break;
        case 'Park Circus': $redirectUrl = "https://www.narayanaschools.in/west-bengal/park-circus/fee-structure"; break;
        case 'Raghunathpur':
        case 'Nadia-ranaghat': $redirectUrl = "https://www.narayanaschools.in/west-bengal/nadia-ranaghat/fee-structure"; break;
        case 'Rishra': $redirectUrl = "https://www.narayanaschools.in/west-bengal/rishra/fee-structure"; break;
        case 'Siliguri': $redirectUrl = "https://www.narayanaschools.in/west-bengal/siliguri/fee-structure"; break;
        case 'Sonarpur': $redirectUrl = "https://www.narayanaschools.in/west-bengal/sonarpur/fee-structure"; break;
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Thank You - Narayana School/West Bengal </title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex">
    <!-- Place favicon.png in the root directory -->
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <!-- Font Icons css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="css/custom.css" rel="stylesheet" />
    <!--<script type="text/javascript"> setTimeout(function () { window.location.href = 'index.html'; }, 3000);</script>-->
    
    <script>
    // 3 sec delay
    setTimeout(function () {
        window.location.href = "<?php echo $redirectUrl; ?>";
    }, 3000);
</script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-16866281877"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-16866281877');
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WXNJ7P6H');</script>
<!-- End Google Tag Manager -->


<!-- Event snippet for Submit Lead Form LP conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-16866281877/wXnwCILSy6EaEJWTvOo-'});
</script>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WXNJ7P6H"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
   
    <?php if (isset($_GET['download']) && $_GET['download'] === 'YES') { ?>
<script>
window.onload = function () {
    const link = document.createElement('a');
    link.href = 'https://www.wbnarayanaschools.in/assets/narayana.pdf';
    link.download = 'narayana.pdf';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
};
</script>
<?php } ?>
<div class="">
    <div class="container mx-auto px-4">
        <div class="flex flex-col justify-center items-center">
                <img src="thankyou.gif" class="" alt="Thank You">

                 <p class="bg-[#034DA2] py-12 px-4 text-center text-white font-[20px] rounded-lg">
                            Thank you for your enquiry.<br>
                            Our team will contact you shortly to guide you on
                            <strong>fees</strong> and the <strong>admission process</strong>.
                        </p>
            </div>
        </div>
    </div>
</div>
      <!-- Categories-->

 <!-- Body main wrapper end -->

    <!-- preloader area start 
    <div class="preloader d-none" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
     preloader area end -->

    <!-- All JS Plugins -->
    <script src="js/plugins.js"></script>
    <!-- Main JS -->
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  
</body>

</html>
