<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <script src="js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">

          <br><br>
          <h1><p class="text-center">Registro</p></h1>
          <br><br>

          <form method="post">

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" id="email" class="form-control">
            </div>

            <div class="form-group">
              <label for="user">Usuario</label>
              <input type="text" name="user" id="user" class="form-control">
            </div>

            <div class="form-group">
              <label for="pass">Contraseña</label>
              <input type="password" name="pass" id="pass" class="form-control">
            </div>

            <div class="form-group">
              <label for="rpass">Repetir contraseña</label>
              <input type="password" name="rpass" id="rpass" class="form-control">
            </div>

            <br><br>

            <div class="form-group">
              <input type="button" name="registrar" id="registrar" class="btn btn-success" value="Registrar">
            </div>

            <br><br>

            <span id="result"></span>

          </form>

        </div>
      </div>
    </div>

  </body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#registrar').click(function(){
      var email = $('#email').val();
      var user = $('#user').val();
      var pass = $('#pass').val();
      var rpass = $('#rpass').val();
      if ($.trim(user).length > 0 && $.trim(pass).length > 0 && $.trim(email).length > 0 && $.trim(rpass).length > 0){
        $.ajax({
          url:'registrame.php',
          method:"POST",
          data:{email:email, user:user, pass:pass, rpass:rpass},
          cache:false,
          beforeSend:function(){
            $('#registrar').val("Comprobando información...");
          },
          success:function(data){
            $('#registrar').val("Registrar");
            if(data){
              $("#result").html(data);
            };
          }
        });
      };
    });
  });
</script>
