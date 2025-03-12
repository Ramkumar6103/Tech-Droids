<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programming Documentation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Programming Documentation</h1>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="programming_task.php">Tasks</a></li>
                    <li><a href="programming_documentation.php">Documentation</a></li>
                </ul>
            </nav>
        </header>
        
        <main>
            <section>
                <h2>Introduction</h2>
                <p>Welcome to the Programming Documentation page. This documentation provides information about the various topics and tasks covered in the programming course.</p>
            </section>
            <section>
                <h2>Getting Started</h2>
                <p>To get started with programming, you need to have a basic understanding of algorithms, data structures, and coding practices.</p>
            </section>
            <section>
                <h2>Algorithms</h2>
                <p>Algorithms are step-by-step procedures used for solving problems and performing tasks in programming.</p>
            </section>
            <section>
                <h2>Data Structures</h2>
                <p>Data structures are ways of organizing and storing data to enable efficient access and modification.</p>
            </section>
            <section>
                <h2>Coding Practices</h2>
                <p>Coding practices involve writing clean, efficient, and maintainable code by following best practices and coding standards.</p>
            </section>
            <section>
                <h2>Resources</h2>
                <ul>
                    <li><a href="https://www.geeksforgeeks.org/data-structures/" target="_blank">Data Structures Documentation</a></li>
                    <li><a href="https://www.hackerrank.com/domains/tutorials/10-days-of-javascript" target="_blank">JavaScript Tutorials</a></li>
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
