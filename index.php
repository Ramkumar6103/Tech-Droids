<?php
session_start();

if (isset($_SESSION['admin_logged_in'])) {
  header('Location: admin_dashboard.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tech Droids</title>
  <link rel="stylesheet" href="home.css" />
  <link rel="shortcut icon" href="./assests/images/logo-icon.png" type="image/png">
  <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/@splinetool/viewer@1.9.72/build/spline-viewer.js"></script>
  <!-- <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
</script>
<script src ="./script.js"></script>
<script type="text/javascript">
   (function(){
      emailjs.init({
        publicKey: "DvKaxWtmm4wkssvSj",
      });
   })();
</script> -->

  <!-- This is Mail Sender JS -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>

  <script type="text/javascript">
    emailjs.init('DvKaxWtmm4wkssvSj')
  </script>


  <style>
    .profile-icon {
      position: relative;
      display: inline-block;
      cursor: pointer;
    }

    .notification-dot {
      position: absolute;
      top: 0;
      right: 0;
      height: 15px;
      width: 15px;
      background-color: red;
      border-radius: 50%;
      border: 2px solid white;
    }

    .profile-image {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-top: 15px;
      
    }

    .dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      background-color: #f9f9f9;
      min-width: 250px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
      border-radius: 8px;
      overflow: hidden;
    }

    .dropdown-header {
      padding: 10px;
      background-color: rgb(38, 0, 255);
      color: white;
      text-align: center;
      font-size: 20px;
    }

    .dropdown-content a {
      color: black;
      /* margin-left: 20px; */
      padding: 12px 16px;
      text-decoration: none;
      display: flex;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    .dropdown-icon img {
      width: 30px;
      height: 30px;
      margin-right: 10px;
    }

    p {
      color: black;
      margin-left: 20px;
      margin-top: 5px;
    }

    .show {
      display: block;
    }

    .menu-icon {
  display: none;
  cursor: pointer;
  font-size: 30px;
  color: white;
  position: absolute;
  right: 20px;
  top: 20px;
}

@media (max-width: 768px) {
  nav ul {
    display: none; /* Hide menu by default */
    flex-direction: column;
    background: rgba(0, 0, 0, 0.9);
    position: absolute;
    top: 70px;
    left: 0;
    width: 100%;
    padding: 10px 0;
    text-align: center;
  }
  .sign-in{
    margin-top:10px
  }
  nav ul.show {
    display: flex; /* Show menu when toggled */
  }

  nav ul li {
    display: block;
    margin: 10px 0;
  }

  .menu-icon {
    display: block; /* Show hamburger menu */
  }
}


  </style>
</head>

<body>
  <div class="header">
    <video autoplay muted loop playsinline class="background-video">
      <!-- <source src="./assets/images/frontvideo.mp4" type="video/mp4" /> -->
    </video>
    <spline-viewer class="background-video"
      url="https://prod.spline.design/2NcPlexIX1moMObH/scene.splinecode"></spline-viewer>
    <div class="container">
      <div class="navbar">
        <div class="logo">
          <a href="#">
            <h3>Tech Droids</h3>
          </a>
        </div>
        <nav>
          <ul id="MenuItems">
            <li><a href="#">Home</a></li>
            <li><a href="#category">Course</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <?php
            if (!isset($_SESSION['username']) && !isset($_SESSION['admin_logged_in'])) {
              ?>
              <li><a href="admin_login.php">Admin Panel</a></li>
              <?php
            }
            ?>
          </ul>
        </nav>
        <div class="menu-icon"  style="margin-right:70px">&#9776;</div>
        <?php if (isset($_SESSION['username'])): ?>
          <div class="profile-icon" onclick="toggleDropdown()">
            <img src="<?php echo $_SESSION['photo_path']; ?>" alt="User Profile" class="profile-image">
            <div class="dropdown-content" id="myDropdown">
              <div class="dropdown-header"><?php echo $_SESSION['username']; ?></div>
              <a href="edit_profile.php"><img src="./assests/images/edit_profile.png" class="dropdown-icon"><p>Edit profile</p></a>
              <a href="logout.php"><img src="./assests/images/logout (2).png" class="dropdown-icon"><p>Sign Out</p></a>
            </div>
          </div>
        <?php elseif (!isset($_SESSION['admin_logged_in'])): ?>
          <!-- <a style="margin-right:70px" href="login.php">Sign In</a> -->
          <a  href="login.php" class="sign-in">Sign In</a>
        <?php endif; ?>

      </div>
      <div class="row">
        <div class="col-2">
          <h1>Empowering Students Through Collaborative Innovation</h1><br>
          <div class="typing-demo">
            <h2>Tech Droids</h2>
          </div>
         
          <a href="#about" class="btn">Explore Now &#8594</a>
        </div>
      </div>
    </div>
  </div>

  <!-- About -->
  <div class="about" id="about">
    <div class="title">
      <h1>About Us</h1>
    </div>
    <div class="about-content">
      <img src="./assests/images/about1.jpg" />

      <div class="layer">
        <h3>About Our Department</h3>

        <p>The Computer Science department is a hub of innovation and technology,
          where students explore the fundamentals of computing, programming, and problem-solving.
          With a curriculum that includes subjects like artificial intelligence, data structures, and software
          development, the department equips students with the knowledge and skills needed for the rapidly evolving tech
          industry. State-of-the-art laboratories, experienced faculty, and hands-on projects ensure that students gain
          both theoretical understanding and practical experience. The department also encourages research and
          collaboration, providing opportunities to work on real-world challenges and contribute to technological
          advancements. Graduates from the Computer Science department have diverse career
          opportunities, including roles in software engineering, data science, cybersecurity, and academia.</p>



      </div>

    </div>
  </div>

  <!-- what we do -->

  <div class="team">
    <div class="title">
      <h1>What We Do</h1>

    </div>
    <section class="services">
      <div class="service-container">
        <div class="service-box">
          <div class="icon">🔔</div>
          <h2>Training</h2>
          <p>The Training Box provides students with hands-on learning opportunities, equipping them with essential
            technical skills through workshops, coding challenges, and real-world projects. <br> It serves as a platform
            to enhance problem-solving abilities and stay updated with the latest industry trends. Join us to learn,
            practice, and grow in the field of computer science!</p>
        </div>
        <div class="service-box">
          <div class="icon">🔧</div>
          <h2>Mission</h2>
          <p>Our mission is to foster innovation, collaboration, and technical excellence among Computer Science
            students.<br> We aim to create a supportive community where students can enhance their skills, work on
            real-world projects,<br> and contribute to technological advancements. Through teamwork and
            knowledge-sharing, we strive to shape<br> future leaders in the tech industry.</p>
        </div>
        <div class="service-box">

          <div class="icon">🌱</div>
          <h2>Vision</h2>
          <p>Vision aims to inspire innovation and collaboration among Computer Science students by providing a platform
            for<br> creative problem-solving and technological advancements. Our vision is to cultivate a community of
            future-ready<br> professionals equipped with the skills to shape the digital world. Through teamwork and
            knowledge-sharing, <br>we strive to drive impactful solutions for real-world challenges.</p>
        </div>
        <div class="service-box">
          <div class="icon">🔗</div>
          <h2>Connect</h2>
          <p>Connect Box is a dedicated space for students in our Computer Science department to collaborate,share
            ideas, and stay updated on the latest tech trends.<br> It serves as a hub for discussions, project
            collaborations, and networking opportunities, fostering a strong community of innovators. Join us to
            connect, learn, and grow together!</p>
        </div>
      </div>
    </section>
  </div>

  <!-- category -->
  <div class="category" id="category">
    <div class="title">
      <h1>Course Category</h1>
    </div>

    <div class="boxes">
      <div class="box-1">
        <img src="./assests/images/web-dev.jpg">
        <h4>Web Development</h4>
        <div class="button">
          <a href="documentation/web_document.php">Document </a>
          <a href="web_development_task.php"> Task</a>
        </div>

      </div>
      <div class="box-2">
        <img src="./assests/images/brain.jpg">
        <h4>Data Structures</h4>
        <div class="button">
          <a href="documentation/logical_document.php">Document </a>
          <a href="logical_thinking_task.php"> Task</a>
        </div>

      </div>
      <div class="box-3">
        <img src="./assests/images/program.jpg">
        <h4>Programming Languages</h4>
        <div class="button">
          <a href="documentation/programming_document.php">Document </a>
          <a href="programming_task.php"> Task</a>
        </div>

      </div>
      <div class="box-4">
        <img src="./assests/images/trend.jpg">
        <h4>Networking & Current Trends</h4>
        <div class="button">
          <a href="documentation/ethical_document.php">Document </a>
          <a href="ethical_hacking_task.php"> Task</a>
        </div>

      </div>
    </div>
  </div>



  <!-- Contact Us -->
  <div class="contact-container" id ="contact">
    <div class="title">
      <h1>Query Section</h1>
    </div>
    <form method="POST" class="contact-left" id="form">
      <input type="text" id="name" name="name" placeholder="Your Name" class="contact-inputs" required>
      <input type="email" id="email" name="email" placeholder="Your Email" class="contact-inputs" required>
      <textarea id="message" name="message" placeholder="Your Message" class="contact-inputs" required></textarea>
      <!-- <button type="submit" id="button" onclick="sendMail()">Submit &#8594</button> -->
      <button id="button" class="btn btn-default btn-hover btn-hover-accent" type="submit">
        <span class="btn-caption" id="value">Send Message</span>
        <i class="ph-bold ph-paper-plane-tilt"></i>
      </button>
    </form>
  </div>

  <!-- Send Mail JS Script -->
  <script>
    const btn = document.getElementById('button');
    const value = document.getElementById('value');

    document.getElementById('form').addEventListener('submit', function (event) {
      event.preventDefault();

      value.innerHTML = 'Sending...';

      const serviceID = 'service_ea3ya1z';
      const templateID = 'template_1ntgup3';

      emailjs.sendForm(serviceID, templateID, this)
        .then(() => {
          btn.value = location.reload();
          alert('Email Send Successfully!');
        }, (err) => {
          btn.value = 'Send Email';
          alert(JSON.stringify(err));
        });
    });
  </script>
  <!-- Footer -->
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-2">
          <img src="./assests/images/tech_droids.png">
          <p>Our purpose is to sustainably make the pleasure and benefits of sports accessible to the many.</p>
        </div>
      </div>
      <hr>
      <p class="copy-right">&copy; Copyrights by Droids Association - 2025. All Rights Reserved.</p>
    </div>
  </div>

  <script>
    //navbar
    document.addEventListener("DOMContentLoaded", function () {
    const menuIcon = document.querySelector(".menu-icon");
    const navMenu = document.querySelector("nav ul");

    menuIcon.addEventListener("click", function () {
        navMenu.classList.toggle("show");
    });
});

function toggleDropdown() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
    // Close the dropdown if the user clicks outside of it
    window.onclick = function (event) {
      if (!event.target.matches('.profile-image')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  </script>
</body>

</html>