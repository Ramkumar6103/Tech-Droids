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
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 250px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  border-radius: 8px;
  overflow: hidden;
}

.dropdown-header {
  padding: 10px;
  background-color: #007bff;
  color: white;
  text-align: center;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
  background-color: #f1f1f1;
}

.dropdown-icon {
  width: 20px;
  height: 20px;
  margin-right: 10px;
}

.show {
  display: block;
}
   </style>
</head>
<body>
    <div class="header">
        <video autoplay muted loop playsinline class="background-video">
            <!-- <source src="./assets/images/frontvideo.mp4" type="video/mp4" /> -->
        </video> 
        <spline-viewer class="background-video" url="https://prod.spline.design/2NcPlexIX1moMObH/scene.splinecode"></spline-viewer>
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
<li><a href="#">About</a></li>
<li><a href="#">Contact</a></li>
<?php
    if (!isset($_SESSION['username']) && !isset($_SESSION['admin_logged_in'])) {
?>
<li><a href="admin_login.php">Admin Panel</a></li>
<?php
    }
?>
</ul>
</nav>
<img src="./assests/images/menu.png" class="menu-icon" onclick="menutoggle()">
<?php if (isset($_SESSION['username'])): ?>
<div class="profile-icon" onclick="toggleDropdown()">
    <img src="<?php echo $_SESSION['photo_path']; ?>" alt="User Profile" class="profile-image">
    <div class="dropdown-content" id="myDropdown">
        <div class="dropdown-header"><?php echo $_SESSION['username']; ?></div>
        <a href="edit_profile.php"><img src="path/to/icon.png" class="dropdown-icon">Edit profile</a>
        <a href="logout.php"><img src="path/to/icon.png" class="dropdown-icon">Sign Out</a>
    </div>
</div>
<?php elseif (!isset($_SESSION['admin_logged_in'])): ?>
<a href="login.php">Sign In</a>
<?php endif; ?>

            </div>
            <div class="row">
                <div class="col-2">
                    <h1>Empowering Students Through Collaborative Innovation</h1><br>
                    <div class="typing-demo">
                <h2>Tech Droids</h2>
              </div>
                    <p>Success isn't always about greatness. It's about consistency. Consistent<br> hard work gains success. Greatness will come</p>
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
              <img src="./assests/images/about1.jpg"/>
              
                <div class="layer">
               <h3>About Our Department</h3>
                
                  <p>The Computer Science department is a hub of innovation and technology, 
                    where students explore the fundamentals of computing, programming, and problem-solving.
                     With a curriculum that includes subjects like artificial intelligence, data structures, and software development, the department equips students with the knowledge and skills needed for the rapidly evolving tech industry. State-of-the-art laboratories, experienced faculty, and hands-on projects ensure that students gain both theoretical understanding and practical experience. The department also encourages research and collaboration, providing opportunities to work on real-world challenges and contribute to technological advancements. Graduates from the Computer Science department have diverse career 
                    opportunities, including roles in software engineering, data science, cybersecurity, and academia.</p>

                    
                    
                </div>
              
            </div>
          </div>

             <!-- what we do -->

             <div class="team" >
            <div class="title">
              <h1>What We Do</h1>

            </div>
            <section class="services">
              <div class="service-container">
                  <div class="service-box">
                    <div class="icon">🔔</div>
                      <h2>Training</h2>
                      <p>The Training Box provides students with hands-on learning opportunities, equipping them with essential technical skills through workshops, coding challenges, and real-world projects. <br> It serves as a platform to enhance problem-solving abilities and stay updated with the latest industry trends. Join us to learn, practice, and grow in the field of computer science!</p>
                  </div>
                  <div class="service-box">
                    <div class="icon">🔧</div>
                      <h2>Mission</h2>
                      <p>Our mission is to foster innovation, collaboration, and technical excellence among Computer Science students.<br> We aim to create a supportive community where students can enhance their skills, work on real-world projects,<br> and contribute to technological advancements. Through teamwork and knowledge-sharing, we strive to shape<br> future leaders in the tech industry.</p>
                  </div>
                  <div class="service-box">
                     
                <div class="icon">🌱</div>
                      <h2>Vision</h2>
                      <p>Vision aims to inspire innovation and collaboration among Computer Science students by providing a platform for<br> creative problem-solving and technological advancements. Our vision is to cultivate a community of future-ready<br> professionals equipped with the skills to shape the digital world. Through teamwork and knowledge-sharing, <br>we strive to drive impactful solutions for real-world challenges.</p>
                  </div>
                  <div class="service-box">
                    <div class="icon">🔗</div>
                      <h2>Connect</h2>
                      <p>Connect Box is a dedicated space for students in our Computer Science department to collaborate,share ideas, and stay updated on the latest tech trends.<br>  It serves as a hub for discussions, project collaborations, and networking opportunities, fostering a strong community of innovators. Join us to connect, learn, and grow together!</p>
                  </div>
              </div>
            </section>
          </div>

    <!-- category -->
    <div class="category">
          <div class="title">
            <h1>Course Category</h1>
          </div>
       
          <div class="boxes" >
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
    <div class="contact-container">
        <div class="title">
            <h1>Query Section</h1>
        </div>
        <form action="https://api.web3forms.com/submit" method="POST" class = "contact-left">
            <input type="hidden" name="apikey" value="da5af3a1-33df-4146-adaf-8e059099a49b">
            <input type="text" name="name" placeholder="Your Name" class="contact-inputs" required>
            <input type="email" name="email" placeholder="Your Email" class="contact-inputs" required>
            <textarea name="message" placeholder="Your Message" class="contact-inputs" required></textarea>
            <input type="hidden" name="redirect" value="https://web3forms.com/success">
            <button type="submit">Submit &#8594</button>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-2">
                    <img src="./assests/images/logo-1.png">
                    <p>Our purpose is to sustainably make the pleasure and benefits of sports accessible to the many.</p>
                </div>
            </div>
            <hr>
            <p class="copy-right">&copy; CopyRight by SL Solution Pvt Ltd 2025</p>
        </div> 
    </div>

    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            } else {
                MenuItems.style.maxHeight = "0px";
            }
        }

        function toggleDropdown() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
        
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
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
