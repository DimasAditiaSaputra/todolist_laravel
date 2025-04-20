<nav class="navbar">
    <div class="navbar-container">
      <div class="navbar-logo">
        Your Logo
      </div>
      <ul class="navbar-menu" id="navMenu">
        <li><a href="http://127.0.0.1:8080/">Home</a></li>
        @if(!session('user_email'))
            <li><a href="http://127.0.0.1:8080/auth/login">Login</a></li>
        @endif
      </ul>
      <div class="menu-toggle" id="menuToggle">
        ☰
      </div>
    </div>
</nav>
