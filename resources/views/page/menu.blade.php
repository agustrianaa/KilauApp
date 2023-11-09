<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" integrity="sha512-oAvZuuYVzkcTc2dH5z1ZJup5OmSQ000qlfRvuoTTiyTBjwX1faoyearj8KdMq0LgsBTHMrRuMek7s+CxF8yE+w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<title>Menu</title>
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
                        <a href="{{ route('admin.dashboard')}}" class="box-link">
                            <div class="colored-box-content">
                                <i class="bi bi-people-fill"></i>{{-- icon --}}
                                <span class="box-text">Pemberdayaan</span>
                            </div>
                        </a>
                    </div>
                
                    <div class="colored-box">
                        <a href="{{ route('admin.dashboard') }}" class="box-link">
                            <div class="colored-box-content">
                                <i class="bi bi-speedometer"></i>{{-- icon --}}
                                <span class="box-text">Dashboard</span>
                            </div>
                        </a>
                    </div>
                
                    <div class="colored-box">
                        <a href="" class="box-link">
                            <div class="colored-box-content">
                                <i class="bi bi-gear"></i>{{-- icon --}}
                                <span class="box-text">Settings</span>
                            </div>
                        </a>
                    </div>
                
                    <div class="colored-box">
                        <a href="" class="box-link">
                            <div class="colored-box-content">
                                <i class="bi bi-cash-stack"></i>{{-- icon --}}
                                <span class="box-text">Keuangan</span>
                            </div>
                        </a>
                    </div>
                
                    <div class="colored-box">
                        <a href=" " class="box-link">
                            <div class="colored-box-content">
                                <i class="bi bi-newspaper"></i>{{-- icon --}}
                                <span class="box-text">Berita</span>
                            </div>
                        </a>
                    </div>
                
                    <div class="colored-box">
                        <a href="{{ route('logout') }}" class="box-link">
                            <div class="colored-box-content">
                                <i class="bi bi-box-arrow-left"></i>{{-- icon --}}
                                <span class="box-text">Logout</span>
                            </div>
                        </a>
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
