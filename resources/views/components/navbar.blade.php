<nav class="navbar">

    <div class="navbar-logo">
        Artisantz.
    </div>

    <ul class="navbar-menu">
        <li><a href="/">Home</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/gallery">Gallery</a></li>
    </ul>

    <div class="navbar-contact">
        <a href="#">Contact</a>
    </div>

    <div class="menu-toggle" onclick="toggleMenu()">
        ☰
    </div>

</nav>

<div class="mobile-menu" id="mobileMenu">
    <a href="/">Home</a>
    <a href="/about">About</a>
    <a href="/gallery">Gallery</a>
</div>

<script>
function toggleMenu() {
    document.getElementById("mobileMenu").classList.toggle("show");
}
</script>