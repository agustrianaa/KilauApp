<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('css/contoh.css') }}">
<title>Contoh Halaman</title>
</head>

<body>

    <section class="home">
        <div class="title-wrapper">
            <h1 class="title">Kilau Information System</h1>
            <h2 class="subtitle">Kilau Indonesia</h2>
        </div>

        <div class="main-content">
            <div class="outer-box">
                <div class="inner-box">
                
                    <div class="colored-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        </svg>
                        Pemberdayaan
                    </div>
                
                    <div class="colored-box">
                        Report
                    </div>
                
                    <div class="colored-box">
                        Serttings
                    </div>
                
                    <div class="colored-box">
                        Keuangan
                    </div>
                
                    <div class="colored-box">
                        Berita
                    </div>
                
                    <div class="colored-box">
                        Logout
                    </div>
                </div>
            </div>
        </div>

        <img class="bg" src="{{ asset('images/bg.jpg') }}">
    </section>

    

    <div class="footer">
        <p>&copy; 2023 Kilau Indonesia. All Rights Reserved.</p>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const coloredBoxes = document.querySelectorAll(".colored-box");
    
            coloredBoxes.forEach((box) => {
                box.addEventListener("click", function () {
                    // Hapus class "clicked" dari semua kotak sebelumnya
                    coloredBoxes.forEach((otherBox) => {
                        otherBox.classList.remove("clicked");
                    });
    
                    // Tambahkan class "clicked" pada kotak yang diklik
                    this.classList.add("clicked");
                });
            });
        });
    </script>
    

</body>
</html>
