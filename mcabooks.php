<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MCA BOOKS</title>
    <link rel="stylesheet" href="mcabooks.css">

    <style>
        .highlight {
            background-color: yellow;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="nav">
    <img src="dibrugarh-university.png" class="logo">
    <div class="aa">


        <ul>
            <li><a href="explore.html">Main</a></li>

            <li><a href="contact.html">Contact Us</a></li>
        </ul>

        <div class="search-container">
            <form action="#" method="GET" oninput="highlightSearch()">
                <input type="text" placeholder="Search books.." name="search" id="searchInput">
            </form>
        </div>
    </div>
</div>

<div class="pdf-container">
    <div class="pdf-item">
    <a href="../e-book/media/Example1.pdf" download onclick="handleDownload(this.href, 'confirm.html')">
                        <img src="../e-book/media/Example1.pdf .png" alt="PDF Preview">
                    </a>
                    <p>A Sample Pdf For Example</p>
    </div>
    <div class="pdf-item">
    <a href="../e-book/media/Example2.pdf" download onclick="handleDownload(this.href, 'confirm.html')">
                        <img src="../e-book/media/Example2.pdf .png" alt="PDF Preview">
                    </a>
                    <p>A Sample Pdf For Example</p>
        
    </div>

    <div class="pdf-item">
    <a href="../e-book/media/Example3.pdf" download onclick="handleDownload(this.href, 'confirm.html')">
                        <img src="../e-book/media/Example3.pdf .png" alt="PDF Preview">
                    </a>
                    <p>A Sample Pdf For Example</p>
        
    </div>

    <div class="pdf-item">
    <a href="../e-book/media/Example1.pdf" download onclick="handleDownload(this.href, 'confirm.html')">
                        <img src="../e-book/media/Example1.pdf .png" alt="PDF Preview">
                    </a>
                    <p>A Sample Pdf For Example</p>
       
    </div>

    <div class="pdf-item">
    <a href="../e-book/media/Example2.pdf" download onclick="handleDownload(this.href, 'confirm.html')">
                        <img src="../e-book/media/Example2.pdf .png" alt="PDF Preview">
                    </a>
                    <p>A Sample Pdf For Example</p>
       
    </div>
    </div>

    <div class="pdf-containeri">
        <div class="pdf-itemi">
        <a href="../e-book/media/Example3.pdf" download onclick="handleDownload(this.href, 'confirm.html')">
                        <img src="../e-book/media/Example3.pdf .png" alt="PDF Preview">
                    </a>
                    <p>A Sample Pdf For Example</p>
        
    </div>

    <div class="pdf-itemi">
    <a href="../e-book/media/Example1.pdf" download onclick="handleDownload(this.href, 'confirm.html')">
                        <img src="../e-book/media/Example1.pdf .png" alt="PDF Preview">
                    </a>
                    <p>A Sample Pdf For Example</p>
        
    </div>

    <div class="pdf-itemi">
    <a href="../e-book/media/Example2.pdf" download onclick="handleDownload(this.href, 'confirm.html')">
                        <img src="../e-book/media/Example2.pdf .png" alt="PDF Preview">
                    </a>
                    <p>A Sample Pdf For Example</p>
       
    </div>

    <div class="pdf-itemi">
    <a href="../e-book/media/Example3.pdf" download onclick="handleDownload(this.href, 'confirm.html')">
                        <img src="../e-book/media/Example3.pdf .png" alt="PDF Preview">
                    </a>
                    <p>A Sample Pdf For Example</p>
    </div>

    <div class="pdf-itemi">
    <a href="../e-book/media/Example1.pdf" download onclick="handleDownload(this.href, 'confirm.html')">
                            <img src="../e-book/media/Example1.pdf .png" alt="PDF Preview">
                        </a>
                        <p>A Sample Pdf For Example</p>
        
    </div>


</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function handleDownload(fileURL, redirectPage) {
            var a = document.createElement('a');
            a.href = fileURL;
            a.target = '_blank';
            a.download = 'downloaded_file.pdf';
            a.click();
            setTimeout(function() {
                window.location.href = redirectPage;
            }, 1000); 
        }

        function highlightSearch() {
            var searchQuery = document.getElementById('searchInput').value.toLowerCase().trim();
            var paragraphs = document.querySelectorAll('.pdf-container p, .pdf-containeri p, .pdf-containerii p, .pdf-containeriii p, .pdf-containeriiii p');
            paragraphs.forEach(function(paragraph) {
                var text = paragraph.textContent.toLowerCase();
                var newText = text.replace(new RegExp(searchQuery, 'gi'), function(match) {
                    return '<span class="highlight">' + match + '</span>';
                });
                paragraph.innerHTML = newText;
            });
        }
    </script>

</body>
</html>
