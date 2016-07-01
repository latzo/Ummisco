<div class="container navigation">
    <div class="row navigation">
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar-header">
          <a href="#" class="navbar-brand">
            <img class='logo  responsive' src="../dist/img/logo_ucad.png">
              
          </a>
        </div>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
        <div id="navbar-collapse-1" class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li class=<?php 
                if(isset($etatC)){
                  echo $etatC;
                }
                ?>
                >
              <a href="../Public/login.php">
                <span class="glyphicon glyphicon-user"></span> 
                Connexion
              </a>
            </li>
            <li class=<?php 
                if(isset($etatP)){
                  echo $etatP;
                } 
                ?>
                >
              <a href="../Public/preinscription.php">
                <span class="glyphicon glyphicon-education"></span> 
                Préinscription
              </a>
            </li>
            <li>'     '</li>
            <!--<li><a href="#"></a></li>-->
          </ul>
        </div>
      </nav>
    </div><!--row navigation-->
  </div><!--container navigation-->