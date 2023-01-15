<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../css/admin_header.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <!--<title>Dashboard Sidebar Menu</title>--> 
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../images/logo_circle.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">NHBT</span>
                    <span class="profession">Admin</span>
                </div>
            </div>

        </header>

        <div class="menu-bar">
            <div class="menu">

                <!-- <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li> -->

                <ul class="menu-links" id="sidebar">
                    <li>
                        <a class="btns" href="dashboard.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    
                    <li >
                        <a href="payments.php">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Payments</span>
                        </a>
                    </li>
                    
                    <li >
                        <a class="btns" href="contact_manage.php">
                            <i class='bx bx-envelope icon'></i>
                            <span class="text nav-text">Contact Manage</span>
                        </a>
                    </li>
                    <li>
                        <a href="guest_upload.php">
                            <i class='bx bxs-user-circle icon' ></i>
                            <span class="text nav-text">Guest manage</span>
                        </a>
                    </li>

                    <li >
                        <a href="event.php">
                            <i class='bx bx-calendar-event icon' ></i>
                            <span class="text nav-text">Event Manage</span>
                        </a>
                    </li>


                    <li>
                        <a class="btns" href="pdf.php">
                            <i class='bx bxs-file-pdf icon' ></i>
                            <span class="text nav-text">Pdf Manage</span>
                        </a>
                    </li>

                    <li>
                        <a class="btns" href="gallery.php">
                            <i class='bx bxs-category icon' ></i>
                            <span class="text nav-text">Gallery Manage</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="logout.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <!-- <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li> -->
                
            </div>
        </div>
    </nav>
    <!-- JS code to add the active class to the links on click -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll("a");
        const menuLenght = menuItem.length;

        for (let i = 0; i < menuLenght; i++) {
        if (menuItem[i].href === currentLocation) {
            menuItem[i].className = "active";
        }
        }
    </script>
</body>
</html>