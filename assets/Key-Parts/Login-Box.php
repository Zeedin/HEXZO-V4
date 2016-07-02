              <?php

             if(isset($_COOKIE['G-User'])) {
                
                $Udata = unserialize($_COOKIE['G-User']);

                  echo '<img src="'.$Udata['picture'].'""/>';
                    echo '<span>
                              <a>'. $Udata['name'].'</a>
                              <a class="Logout" href="assets/Google-API/logout.php?logout"><i class="material-icons">exit_to_app</i> Logout</a>
                          </span>';
                      }
        else{
              include_once("assets/Google-API/config.php");
              include_once("assets/Google-API/includes/functions.php");

              //print_r($_GET);die;

              if(isset($_REQUEST['code'])){
                $gClient->authenticate();
                $_SESSION['token'] = $gClient->getAccessToken();
                header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
              }

              if (isset($_SESSION['token'])) {
                $gClient->setAccessToken($_SESSION['token']);
              }

              if ($gClient->getAccessToken()) {
                $userProfile = $google_oauthV2->userinfo->get();
                //DB Insert
                $gUser = new Users();
                $gUser->checkUser('google',$userProfile['id'],$userProfile['given_name'],$userProfile['family_name'],$userProfile['email'],$userProfile['gender'],$userProfile['locale'],$userProfile['link'],$userProfile['picture']);
                $_SESSION['google_data'] = $userProfile; // Storing Google User Data in Session

                $_SESSION['token'] = $gClient->getAccessToken();
              } else {
                $authUrl = $gClient->createAuthUrl();
              }

              if(isset($authUrl)) {
                echo '<a class="login" href="' . $authUrl . '"><i class="material-icons">account_circle</i> Login</a>';
              }
}
              ?>