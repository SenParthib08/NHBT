<header>
    <a href="index.php" class="brand">NHBT</a>
    <div class="menu-btn"></div>
    <div class="navigation">
        <div class="navigation-items">
        <a href="index.php">Home</a>
        <a href="about_us.php">About</a>
        <a href="pdf.php">Proceedings</a>
        <a href="guest.php">Guests</a>
        <a href="gallery.php">Gallery</a>
        <a href="contact.php">Contact</a>
        </div>
    </div>
</header>
<script>
    const menuBtn = document.querySelector(".menu-btn");
    const navigation = document.querySelector(".navigation");
        
    menuBtn.addEventListener("click", () => {
        menuBtn.classList.toggle("active");
        navigation.classList.toggle("active");
    });
</script>