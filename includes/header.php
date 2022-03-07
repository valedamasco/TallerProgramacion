<header class="header">
    <nav class="nav-bar">
        <ul>
            <li class="left-nav-bar">
                <a href="/Obligatorio-167467/index.php">Inicio</a>
            </li>  
            <?php if(!empty($_SESSION) && $_SESSION['isAdmin']=='1') {
            echo '<li class="left-nav-bar"><a href="/Obligatorio-167467/includes/add-new-place.php">Agregar nuevo lugar</a> </li>'
                .'<li class="left-nav-bar"><a href="/Obligatorio-167467/includes/stadistics.php">Ver estadisticas</a></li>'
                .'<li class="left-nav-bar"><a href="/Obligatorio-167467/includes/users.php">Ver usuarios</a></li>';
            }?>
            <li class="left-nav-bar">
                <a href="/Obligatorio-167467/includes/about-me.php">Sobre mi</a>
                
            </li>
            <?php 
                if(!empty($_SESSION)) {
                    echo '<li class="right-nav-bar"> <a href="logout.php">Logout</a> </li> '
                            . '<li class="right-nav-bar"> Alias: ' . $_SESSION['alias'] . '</li>'
                            . '<li class="right-nav-bar"> Email: ' . $_SESSION['email'] . '</li>';
                }
            ?>          
        </ul>               
    </nav>
</header>