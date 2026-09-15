<?php
$redirectUrl = "https://www.wbnarayanaschools.in/ekidz/";

if(isset($_GET['branch']) && isset($_GET['feesstructure']) && $_GET['feesstructure']=='YES') {
    $branch = $_GET['branch'];

    switch ($branch) {
        case 'New Town': $redirectUrl = "https://www.narayanaschools.in/west-bengal/new-town/fee-structure"; break;
        case 'Maheshtala': $redirectUrl = "https://www.narayanaschools.in/west-bengal/maheshtala/fee-structure"; break;
        case 'Sonarpur': $redirectUrl = "https://www.narayanaschools.in/west-bengal/sonarpur/fee-structure"; break;
        case 'Park Circus': $redirectUrl = "https://www.narayanaschools.in/west-bengal/park-circus/fee-structure"; break;
        case 'Andul': $redirectUrl = "https://www.narayanaschools.in/west-bengal/andul/fee-structure"; break;
        case 'Bally': $redirectUrl = "https://www.narayanaschools.in/west-bengal/bally/fee-structure"; break;
        case 'Barasat': $redirectUrl = "https://www.narayanaschools.in/west-bengal/barasat/fee-structure"; break;
        case 'Howrah': $redirectUrl = "https://www.narayanaschools.in/west-bengal/howrah/fee-structure"; break;
        case 'Kalyani Express': $redirectUrl = "https://www.narayanaschools.in/west-bengal/kalyani-express/fee-structure"; break;
        case 'Kalyani Town': $redirectUrl = "https://www.narayanaschools.in/west-bengal/kalyani-town/fee-structure"; break;
        case 'Rishra': $redirectUrl = "https://www.narayanaschools.in/west-bengal/rishra/fee-structure"; break;
        case 'Uluberia': $redirectUrl = "https://www.narayanaschools.in/west-bengal/howrah-uluberia/fee-structure"; break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Thank You! - Narayana eKidz Nursery</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- AOS Animations -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  
  <!-- Google Fonts for playful look -->
  <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; }
    h1, h2 { font-family: 'Comic Neue', cursive; }
    @keyframes float-slow {
      0%, 100% { transform: translateY(0) rotate(0deg); }
      50% { transform: translateY(-30px) rotate(3deg); }
    }
    .animate-float-slow { animation: float-slow 12s infinite ease-in-out; }
  </style>
  <?php
    if(isset($_GET['download']) && $_GET['download']=='YES') {
  ?>
  <script>
window.onload = function () {
    const link = document.createElement('a');
    link.href = 'https://www.wbnarayanaschools.in/assets/img/narayana.pdf';
    link.download = 'narayana.pdf';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
};
</script>
<?php }?>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-16866281877"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-16866281877');
</script>

<script>
gtag('set', 'user_data', {

"email": [yourEmailVariable1, yourEmailVariable2],

});

</script>

</script>
<!-- Event snippet for ekidz Form Fillup conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-16866281877/txHNCPDDy-0bEJWTvOo-'});
</script>

<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "v7zb7a8nxi");
</script>
</head>
<body class="bg-gradient-to-br from-pink-50 via-sky-50 to-lavender-50 min-h-screen flex items-center justify-center overflow-hidden relative">

<?php if (isset($_GET['download']) && $_GET['download'] === 'YES') { ?>


<?php } ?>

  <!-- Subtle floating background elements -->
  <div class="absolute inset-0 pointer-events-none">
    <div class="absolute lg:top-20 lg:left-20 top-10 left-10  w-32 md:w-48 opacity-30 animate-float-slow">
      <img src="assets/img/123.png" alt="Happy kids" class="w-full drop-shadow-xl">
    </div>
    <div class="absolute lg:bottom-20 lg:right-20 bottom-5 right-10  lg:w-40 w-32  md:w-56 opacity-30 animate-float-slow">
      <img src="assets/img/children.webp" alt="Teddy bear" class="w-full drop-shadow-xl">
    </div>
  </div>

  <main class="relative z-20 text-center px-5 max-w-4xl mx-auto">
    <!-- Big Thank You -->
    <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-extrabold text-transparent bg-clip-text bg-[#0877be] mb-6 md:mb-8" data-aos="zoom-in">
      Thank You!
    </h1>

    <!-- Subtitle -->
    <p class="text-xl sm:text-2xl md:text-2xl text-gray-800 font-medium mb-6 md:mb-10" data-aos="fade-up">
      Your enquiry has been successfully submitted! 🎉
    </p>

    <!-- Message Card -->
    <div class="bg-white/85 backdrop-blur-xl border border-white/60 rounded-3xl p-5 md:p-12 shadow-2xl max-w-3xl mx-auto mb-10 md:mb-14" data-aos="fade-up" data-aos-delay="300">
      <p class="text-lg  text-gray-700 leading-relaxed text-center">
         <!--<img src="assets/img/logo.webp" alt="Narayana School" class="w-[200px] drop-shadow-xl "> -->
        
        Thank you for your enquiry.<br>
                            Our team will contact you shortly to guide you on
                            <strong>fees</strong> and the <strong>admission process</strong>
      </p>
    </div>

    <!-- Cute Illustration -->
    

    <!-- Next Steps -->
    <!--<div class="space-y-6 md:space-y-8" data-aos="fade-up" data-aos-delay="500">-->
    <!--  <p class="text-lg md:text-xl text-gray-700">-->
    <!--    While we prepare your reply, feel free to:-->
    <!--  </p>-->

    <!--  <div class="flex flex-col sm:flex-row gap-5 justify-center items-center">-->
    <!--    <a href="/" class="inline-flex items-center px-8 py-4 bg-white border-2 border-purple-300 hover:bg-purple-50 text-purple-700 font-bold text-lg rounded-full shadow-lg transform hover:scale-105 transition-all duration-300">-->
    <!--      ← Back to Home-->
    <!--    </a>-->
        
    <!--    <a href="tel:+919876543210" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white font-bold text-lg rounded-full shadow-xl transform hover:scale-105 transition-all duration-300">-->
    <!--      Call Us Now 📞-->
    <!--    </a>-->
    <!--  </div>-->
    <!--</div>-->

    <!-- Warm Closing -->
    <p class="mt-2 md:mt-16 text-gray-600 text-base md:text-lg font-medium">
      We can’t wait to welcome your little star to the happiest nursery in Kolkata! 🌟
    </p>
  </main>
  <script>
    AOS.init({ duration: 1000, once: true, easing: 'ease-out' });
  </script>
<script>
    // 3 sec delay
    setTimeout(function () {
        window.location.href = "<?php echo $redirectUrl; ?>";
    }, 3000);
</script>

</body>
</html>