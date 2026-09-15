<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You | Success</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-16866281877"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-16866281877');
</script>

<!-- Event snippet for Submit lead form - Neet Repeater conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-16866281877/TPsZCJP-3sccEJWTvOo-'});
</script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background:
                radial-gradient(circle at top right, rgba(236, 91, 19, 0.08), transparent),
                radial-gradient(circle at bottom left, rgba(99, 102, 241, 0.08), transparent);
        }

        @keyframes float {
            0% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-15px) rotate(3deg);
            }

            100% {
                transform: translateY(0px) rotate(0deg);
            }
        }

        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        .slow-float {
            animation: float 9s ease-in-out infinite;
        }

        .doodle {
            position: absolute;
            fill: none;
            stroke: #e2e8f0;
            stroke-width: 1.5;
            stroke-linecap: round;
            stroke-linejoin: round;
            z-index: 0;
        }
    </style>

</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4 md:p-8 gradient-bg relative overflow-hidden">


    <svg class="doodle float-animation top-10 left-10 w-20 h-20" viewBox="0 0 24 24">
        <path d="M4 19.5A2.5 2.5 0 016.5 17H20" />
        <path d="M6.5 2H20v15H6.5A2.5 2.5 0 004 19.5V4.5A2.5 2.5 0 016.5 2z" />
    </svg>

    <svg class="doodle slow-float bottom-20 left-10 w-24 h-24" viewBox="0 0 24 24">
        <path d="M12 20h9" />
        <path d="M16.5 3.5l4 4L7 21l-4 1 1-4L16.5 3.5z" />
    </svg>

    <svg class="doodle float-animation top-20 right-10 w-16 h-16" viewBox="0 0 24 24">
        <path d="M22 10L12 5 2 10l10 5 10-5z" />
        <path d="M6 12v5c3 3 9 3 12 0v-5" />
    </svg>

    <svg class="doodle slow-float bottom-10 right-20 w-20 h-20" viewBox="0 0 24 24">
        <path d="M9 3v4l-4 7a4 4 0 004 6h6a4 4 0 004-6l-4-7V3" />
    </svg>

    <main
        class="max-w-7xl w-full bg-white rounded-3xl shadow-xl shadow-slate-200/60 overflow-hidden min-h-[600px] relative z-10 flex items-center justify-center">

        <section
            class="w-full p-8 md:p-16 lg:p-20 flex flex-col justify-center items-center text-center bg-white relative z-10">

            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-slate-900 mb-6 tracking-tight">
                Thank You!
            </h1>

            <p class="text-lg text-slate-600 mb-8 leading-relaxed max-w-lg mx-auto">
                Thank you for your enquiry.<br>
                Our team will contact you shortly to guide you on <b>fees</b> and the <b>admission process.</b>
            </p>

        </section>

    </main>

    <?php if (isset($_GET['brochure']) && $_GET['brochure'] === '1'): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const link = document.createElement('a');
            link.href = './assets/Neet-Repeater-Flyer27.pdf'; // Assuming it's in the same directory, or update path if needed
            link.download = 'Neet Repeater_Flyer27.pdf';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    </script>
    <?php endif; ?>

</body>

</html>