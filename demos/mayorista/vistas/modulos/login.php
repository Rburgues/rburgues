<div id="back"></div>

<div class="login-box">
  
  <div class="login-logo">

    <img  src="vistas/img/plantilla/logo_distribuidora.png" class="img-responsive" style="padding-left: 10px;margin-top:40%;">

  </div>

  <div style="border-radius: 25px;" class="login-box-body">

    <p class="login-box-msg">Ingresar al sistema</p>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      
      </div>

      <div style="margin:0 auto;" class="row">
       
        <div style="width:100%;">

          <button style="width:100%;" type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        
        </div>

      </div>
      <h3 style="text-align:center">Demostración<br><br>Datos de Ingreso:<br>User: admin<br>Password: admin</h3>
      <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
        
      ?>

    </form>

  </div>

</div>
