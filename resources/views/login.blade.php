<!DOCTYPE html>
<html lang="es" ng-app="login">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>CECYT</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom/signin.css" rel="stylesheet">

  </head>
  
<script type="text/ng-template" id="customTemplate.html">
  <a>
      <span ng-bind-html="match.label | uibTypeaheadHighlight:query"></span>
  </a>
</script>





  <body ng-controller="LoginCtrl">

    <div class="container" ng-show="view=='iniciarSesion'">
      <form class="form-signin">
        <h2 class="form-signin-heading">Iniciar sesión</h2>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
        <button type="button" class="btn btn-sm btn-link" ng-click="mostrarRegistrar()">Crear cuenta</button>
        <button type="button" class="btn btn-sm btn-link" ng-click="mostrarRecuperar()">Recuperar contraseña</button>
      </form>
    </div> <!-- /container -->

    <div class="container" ng-show="view=='registrar'">
       <form class="form-signin">
        <h2 class="form-signin-heading">Registro</h2>
        <p>Complete sus datos, debe especificar el mismo documento de identidad y la misma dirección de correo electrónico que utilizó al registrarse en el sistema SAPIENTIA.</p>
        
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus><br/>
        
        <label for="inputContrasena" class="sr-only">Contraseña</label>
        <input type="password" id="inputContrasena" class="form-control" placeholder="Contraseña" required autofocus>
        
        <label for="inputContrasena2" class="sr-only">Contraseña </label>
        <input type="password" id="inputContrasena2" class="form-control" placeholder="Contraseña confirmación" required autofocus>

        <label for="inputNumeroDocumento" class="sr-only">Número de documento</label>
        <input type="text" id="inputNumeroDocumento" class="form-control" placeholder="Número de documento" required autofocus>
        
        <label for="inputPaisDocumento" class="sr-only">País documento</label>
        <input type="text" ng-model="customSelected" placeholder="País documento" 
    uib-typeahead="pais as pais.descripcion for pais in paises | filter:{name:$viewValue}" 
    typeahead-template-url="customTemplate.html" class="form-control" 
    typeahead-show-hint="true" typeahead-min-length="0">
        
        <label for="inputTipoDocumento" class="sr-only">Tipo documento</label>
        <input type="text" ng-model="customSelected2" placeholder="Tipo documento" 
    uib-typeahead="documento as documento.descripcion for documento in documentos | filter:{name:$viewValue}" 
    typeahead-template-url="customTemplate.html" class="form-control" 
    typeahead-show-hint="true" typeahead-min-length="0"><br/>
        
        

        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
      </form>
    </div> <!-- /container -->
    
    <div class="container" ng-show="view=='recuperar'">
      <form class="form-signin">
        <h2 class="form-signin-heading">Recuperar contraseña</h2>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Recuperar</button>
      </form>
    </div> <!-- /container -->



    <!-- angular -->
    <script src="js/angular.js"></script>
    <script src="js/angular-animate.js"></script>
    <script src="js/ui-bootstrap-tpls-1.3.3.js"></script>
    <script src="js/angular/login.js"></script>

  </body>
</html>