<nav class="navbar navbar-default">
    <ul class="nav-list">
        <li class="nav-left nav-title">
            <a href="/home">Home</a>
        </li>
        <?php if (isset($_SESSION['user'])): ?>
            <li class="nav-item nav-right">
                <a href="/shoppingcart">Shopping Cart</a>
            </li>  
            <li class="nav-item">
                <form action="/action" method="post">
                    <button class="button" type="submit" name="action" value="logout">Logout</button>
                </form>
            </li>
        <?php  else: ?> 
            <li class="nav-item nav-right">
                <a class="button" href="/login">Login</a>
                <a class="button" href="/register">Register</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>