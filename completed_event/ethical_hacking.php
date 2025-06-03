<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Ethical Hacking Workshop - Cybersecurity Essentials</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <style>
        :root {
            --primary-color: #0ef;
            --secondary-color: #08c;
            --accent-color: #1a1a1a;
            --bg-color: #000000;
            --text-color: #e0e0e0;
            --light-text: #a0a0a0;
            --white: #ffffff;
            --shadow-color: rgba(0, 255, 255, 0.25);
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        .event-header {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 10px 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
        }

        .event-header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: 700;
            color: #00bcd4;
        }

        .event-header p {
            font-size: 1.1rem;
            color: #00bcd4;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 30px 20px;
            background: var(--accent-color);
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(0, 255, 255, 0.1);
        }

        img.banner {
            width: 100%;
            border-radius: 12px;
            margin-bottom: 30px;
            object-fit: cover;
            box-shadow: 0 8px 20px rgba(0,255,255,0.15);
            filter: brightness(0.85);
            transition: filter 0.3s ease;
        }
        img.banner:hover {
            filter: brightness(1);
        }

        h2 {
            color: var(--primary-color);
            border-bottom: 3px solid var(--secondary-color);
            padding-bottom: 8px;
            margin-bottom: 18px;
            font-weight: 700;
            font-size: 1.8rem;
        }

        p, ul {
            font-size: 1.1rem;
            color: var(--text-color);
        }

        ul {
            padding-left: 1.3rem;
            margin-bottom: 30px;
        }

        ul li {
            margin-bottom: 10px;
            position: relative;
            padding-left: 20px;
        }

        ul li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--secondary-color);
            font-weight: bold;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 18px;
            margin-top: 15px;
        }

        .gallery-grid img {
            width: 100%;
            height: 140px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,255,255,0.1);
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            filter: brightness(0.8);
        }

        .gallery-grid img:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 25px rgba(0,255,255,0.3);
            filter: brightness(1);
        }

        .team {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 30px;
            margin-top: 10px;
        }

        .team-member {
            background: #111;
            color: var(--primary-color);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 6px 15px rgba(0,255,255,0.1);
            text-align: center;
            border: 1px solid var(--secondary-color);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 24px rgba(0,255,255,0.3);
            border-color: var(--primary-color);
        }

        .team-member img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 3px solid var(--primary-color);
            filter: drop-shadow(0 0 5px var(--primary-color));
        }

        .team-member h4 {
            margin: 8px 0 6px 0;
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .team-member p {
            margin: 0;
            font-weight: 600;
            font-style: italic;
            color: var(--secondary-color);
        }

        .back-link {
            display: inline-block;
            margin-top: 40px;
            color: var(--primary-color);
            font-weight: 700;
            text-decoration: none;
            font-size: 1.1rem;
            border: 2px solid var(--primary-color);
            padding: 10px 18px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            background: var(--primary-color);
            color: var(--bg-color);
            box-shadow: 0 6px 15px rgba(0,255,255,0.3);
        }

        @media (max-width: 600px) {
            header h1 {
                font-size: 2.2rem;
            }
            h2 {
                font-size: 1.5rem;
            }
            .team {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<header data-aos="fade-down" data-aos-duration="800" class="event-header">
    <h1>Ethical Hacking Workshop</h1>
    <p>Cybersecurity Essentials for the Modern Web</p>
</header>

<div class="container" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
    <img src="../assests\images\oracle_workshop\about1.jpg" alt="Ethical Hacking Banner" class="banner" />

    <section>
        <h2>Event Details</h2>
        <p><strong>Date:</strong> May 18, 2025</p>
        <p><strong>Location:</strong> CyberTech Hall, Block A</p>
        <p>The workshop introduced attendees to ethical hacking methodologies, penetration testing tools, and real-world vulnerabilities through hands-on labs and case studies.</p>
    </section>

    <section>
        <h2>Workshop Highlights</h2>
        <ul>
            <li>Footprinting & Reconnaissance Techniques</li>
            <li>System Hacking and Privilege Escalation</li>
            <li>Metasploit Framework and Payload Injection</li>
            <li>Web Application Vulnerabilities (OWASP Top 10)</li>
        </ul>
    </section>

    <section>
        <h2>Event Team & Participants</h2>
        <div class="team">
            <div class="team-member" data-aos="zoom-in" data-aos-delay="100">
                <img src="../assets/images/ethical_hacking/speaker1.jpg" alt="Mr. Karan Das" />
                <h4>Mr. Karan Das</h4>
                <p>Lead Trainer</p>
            </div>
            <div class="team-member" data-aos="zoom-in" data-aos-delay="200">
                <img src="../assets/images/ethical_hacking/speaker2.jpg" alt="Ms. Swati Reddy" />
                <h4>Ms. Swati Reddy</h4>
                <p>Coordinator</p>
            </div>
            <div class="team-member" data-aos="zoom-in" data-aos-delay="300">
                <img src="../assets/images/ethical_hacking/speaker3.jpg" alt="Mr. Arjun Kapoor" />
                <h4>Mr. Arjun Kapoor</h4>
                <p>Lab Supervisor</p>
            </div>
        </div>
    </section>

    <section>
        <h2>Event Gallery</h2>
        <p>Snapshots from the thrilling cybersecurity sessions!</p>
        <div class="gallery-grid" data-aos="fade-up" data-aos-duration="800">
            <img src="../assests\images\oracle_workshop\about1.jpg" alt="Workshop Image 1" />
            <img src="../assests\images\oracle_workshop\about1.jpg" alt="Workshop Image 2" />
            <img src="../assests\images\oracle_workshop\about1.jpg" alt="Workshop Image 3" />
            <img src="../assests\images\oracle_workshop\about1.jpg" alt="Workshop Image 4" />
        </div>
    </section>

    <a href="../calendar.php" class="back-link" data-aos="fade-up" data-aos-delay="600">← Back to Events Calendar</a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 900,
        once: true
    });
</script>

</body>
</html>
