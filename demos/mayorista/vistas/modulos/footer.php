<footer style="background-color:hsl(207deg 40% 8%);text-align:center;" class="main-footer">

<?php
    if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){ echo'

        <!--
<div style="text-align:center;">
<a href="adm/index.php">
<span style="font-size:22px; font-weight:700; color:#000000;">ADMINISTRAR SISTEMA</span>
</a>

</div>-->     ';
    
    }?>
<p style="font-size:16px;color:#FFFFFF;font-weight:700;">Software a medida <a style="color:#FFF;" href="https://www.rburgues.com" target="_blank"><img class="logo" src="vistas/img/plantilla/sh_logo.png" style="width:50px; height:50px; padding:4px; margin-right:3px;" >RBurgues</a></p>

</footer>

