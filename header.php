<header>
    <a href="#" class="brand">NHBT</a>
    <div class="menu-btn"></div>
    <div class="navigation">
        <div class="navigation-items">
        <a href="#">Home</a>
        <a href="AboutUs.html">About</a>
        <a href="Explore.html">Explore</a>
        <a href="#">Gallery</a>
        <a href="#footer">Contact</a>
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