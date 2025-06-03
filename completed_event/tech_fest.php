<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tech Fest 2025</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #0f0f0f;
            color: #f5f5f5;
        }

        header {
            background: linear-gradient(135deg, #00ff99, #0077ff);
            padding: 40px 20px;
            text-align: center;
            color: #fff;
        }

        header h1 {
            margin: 0;
            font-size: 3em;
            animation: fadeInDown 1s ease;
        }

        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            background: #1c1c1c;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 255, 153, 0.1);
        }

        .section {
            margin-bottom: 40px;
        }

        h2 {
            color: #00ff99;
            border-bottom: 2px solid #00ff99;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }

        ul {
            padding-left: 20px;
        }

        img.banner {
            width: 100%;
            border-radius: 10px;
            margin-top: 20px;
            animation: fadeIn 2s ease-in-out;
        }

        .back-link {
            display: inline-block;
            margin-top: 30px;
            color: #00ff99;
            text-decoration: none;
            transition: 0.3s;
        }

        .back-link:hover {
            color: #fff;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.98);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>
<body>

<header>
    <h1 data-aos="zoom-in">Tech Fest 2025</h1>
    <p data-aos="fade-up" data-aos-delay="300">Innovation. Technology. Future.</p>
</header>

<div class="container" data-aos="fade-up" data-aos-delay="400">
    <img src="../assets/images/techfest.jpg" alt="Tech Fest Banner" class="banner" data-aos="zoom-in">

    <div class="section" data-aos="fade-up" data-aos-delay="500">
        <h2>Event Details</h2>
        <p><strong>Date:</strong> June 10, 2025</p>
        <p><strong>Location:</strong> Main Auditorium, Tech City Campus</p>
        <p>Tech Fest 2025 is a celebration of creativity, code, and cutting-edge innovation. Join us for a series of workshops, competitions, and keynote talks designed to inspire and empower the next generation of tech leaders.</p>
    </div>

    <div class="section" data-aos="fade-up" data-aos-delay="600">
        <h2>Highlights</h2>
        <ul>
            <li>⚙️ AI & Machine Learning Workshops</li>
            <li>🚀 Startup Idea Pitching</li>
            <li>💻 36-Hour Hackathon</li>
            <li>🎤 Keynote Talks from Industry Experts</li>
            <li>🏆 Innovation Showcase and Awards</li>
        </ul>
    </div>

    <div class="section" data-aos="fade-up" data-aos-delay="700">
        <h2>Keynote Speaker</h2>
        <p><strong>Ms. Priya Khanna</strong><br>Tech Innovator & Co-founder of FutureSoft</p>
    </div>

    <a href="../calendar.php" class="back-link" data-aos="fade-up" data-aos-delay="800">← Back to Events Calendar</a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>

</body>
</html>
