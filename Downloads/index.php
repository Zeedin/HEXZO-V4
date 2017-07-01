<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="theme-color" content="#616161">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta charset="utf-8">
  <meta name="google-signin-client_id" content="570489780795-bcqjr96dpmseoo5mp704jsp0d4vv9b95.apps.googleusercontent.com">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="HEXZO:: File Browser, upload and download files">
  <title>HEXZO :: Downloads</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="icon" href="/favicon.png">


  <!-- REMOVE PHP LINE ONCE DONE!!!!-->
  <?php
  date_default_timezone_set("America/Vancouver");
  echo '<link rel="stylesheet" href="../assets/CSS/Main.css?v='.time().'">'; ?>
  <!-- REMOVE PHP LINE ONCE DONE!!!! -->

  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>

  <script>
    function myFunction() {
      document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
    }
  </script>
  <script>
    $(function(){
      $("#Nav-Right").load("/assets/Modules/Nav-Right.html");
      $("#Nav-Top").load("/assets/Modules/Nav-Top.html");
    });
  </script>



</head>
<body>

  <!-- Nav Start -->

  <div id="Nav-Left" class="topnav">
    <header class="drawer-header">
      <div id="Nav-Box" ><a class="banner-icon">graphic_eq</a> <a class="banner-text">HEXZO<a/>
        <a id="Nav-Toggle" href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()"><i class="material-icons">dehaze</i></a>
      </div>
    </header>
    <nav>

      <div id="Nav-Right"></div>

      <div class="mdl-layout-spacer"></div>

    </nav>
    <!-- Login Box Start -->
    <div id="Login-Box">
      <div style="margin:20px">
        <?php
              //Fix for index not in bace dir
        $cwd = getcwd();
        chdir('../');
        include_once('assets/Global-Vars.php');
        include_once("assets/Modules/Login-Box.php");
        chdir($cwd);
        ?>
      </div>
    </div>
    <!-- Login Box End -->
  </div>
  <div id="Nav-Bar">

   <a id="Nav-Toggle" href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()"><i class="material-icons">dehaze</i></a><h1>Downloads</h1>


   <div id="Nav-Bar-Box">
    <ul class="nav">
      <li class="drop"><i class="material-icons">more_vert</i>
        <ul>
          <div id="Nav-Top"></div>
        </ul>
      </li>
    </ul>

  </div>
</div>

<!-- NavEnd -->

<!-- Page content -->
<div id="Page">
  <!-- Banner -->
  <div id="Banner">
    <div class="Title-Box">
      <div class="Title"><h1>DOWNLOADS</h1></div>
      <h2>HEXZO File Share</h2>
    </div>
  </div>
  <!-- End of  Banner  -->
  <div id="Content">
    <div class="Piller_34"></div>

    <?php
    if( isset ($Udata['id'])) {echo '
      <div class="Piller_14">
        <div class="card">
          ';
          include("upload.php");
          echo'
        </div>
      </div>';
    }
    ?>


    <!-- Body -->
    <div class="card">
      <div id="Filebrowser" >
        <form action = "<?php $_PHP_SELF ?>" method = "POST">
          <?php
          $dir = "Files/";
          $Files = scandir($dir);
          foreach ($Files as $key => $File) {
            if( $File == '.' || $File == '..'  ){}
              else {

                $fileInfo = pathinfo($dir.$File);
                echo '<div  id="File-List" class="'.$fileInfo['extension'].'" >';

                echo '<div class="FileTypeHeader"><a>'.$fileInfo['extension'].'</a></div>';

                if( isset ($Udata['id'])) {
                  echo '
                  <div id="checkbox_Left" class="alin-right">
                   <input type = "checkbox" id="'.$File.'" name="del-files[]" value="'.$File.'"/>
                   <label for="'.$File.'"></label>
                 </div>
                 ';}

                 echo'<div class="'.$fileInfo['extension'].' FileTypeIcon" ><a href="'.$dir.$File.'"></a></div>
                 <div class="FileName"><a>'.$fileInfo['filename'].'</a></div>
               </div>';
             }
           }

           if( isset ($Udata['id'])) {
            echo '<div class="Button-Padding"> <input class="Wide-Button" type="submit" value="Delete Selected Files"/> </div>';
          }

          ?>
        </form>
      </div>
    </div>




  </div>
</div>
<!-- END of Page content -->

</body>
