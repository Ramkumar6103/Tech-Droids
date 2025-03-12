<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Development Documentation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Web Development Documentation</h1>
            <nav>
                <ul>
                    <li><a href="/index.php">Home</a></li>
                    <li><a href="/web_development_task.php">Tasks</a></li>
                    <li><a href="attendance.pdf">Documentation</a></li>
                </ul>
            </nav>
        </header>
        
        <main>
            <section>
                <h2>Introduction</h2>
                <p>Welcome to the Web Development Documentation page. This documentation provides information about the various topics and tasks covered in the web development course.</p>
            </section>
            <section>
                <h2>Getting Started</h2>
                <p>To get started with web development, you need to have a basic understanding of HTML, CSS, and JavaScript. These technologies form the foundation of web development.</p>
            </section>
            <section>
                <h2>HTML</h2>
                <p>HTML (HyperText Markup Language) is used to structure the content on web pages. It defines elements like headings, paragraphs, links, images, and more.</p>
            </section>
            <section>
                <h2>CSS</h2>
                <p>CSS (Cascading Style Sheets) is used to style the appearance of web pages. It allows you to define colors, fonts, layout, and other visual aspects of a website.</p>
            </section>
            <section>
                <h2>JavaScript</h2>
                <p>JavaScript is a programming language that enables you to add interactivity and dynamic behavior to web pages. It allows you to create animations, handle user events, and more.</p>
            </section>
            <section>
                <h2>Resources</h2>
                <ul>
                    <li><a href="https://developer.mozilla.org/en-US/docs/Web/HTML" target="_blank">HTML Documentation</a></li>
                    <li><a href="https://developer.mozilla.org/en-US/docs/Web/CSS" target="_blank">CSS Documentation</a></li>
                    <li><a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" target="_blank">JavaScript Documentation</a></li>
                </ul>
            </section>
        </main>
        
        <footer>
            <p>&copy; 2025 .For-Dev. All rights reserved.</p>
        </footer>
    </div>

    <button onclick="openPDF()">Open PDF</button>

    <script>
        function openPDF() {
            window.open('attendance.pdf', '_blank');
        }
    </script>
</body>
</html>
