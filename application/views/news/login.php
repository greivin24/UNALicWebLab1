<header>
<link rel = "stylesheet" type = "text/css" 
   href = "<?php echo base_url(); ?>css/style.css">
 </header>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="https://goldenwolf.com/wp-content/uploads/2018/01/gw2.png" id="icon" alt="User Icon" />
      <h1>INICIO DE SESSION</h1>
    </div>


    <!-- Remind Passowrd -->
    <div id="formFooter">
        <a class="btngoogle" href="<?= 'https://accounts.google.com/o/oauth2/v2/auth?scope=' .
        urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me') .
        '&redirect_uri=' . urlencode(APP_CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' .
        APP_CLIENT_ID . '&access_type=online' ?>"><button class="btn btn-danger">Google</button></a>

        <a class="btngithub btn btn-primary ml-4" type="button" href="https://github.com/login/oauth/authorize?<?php echo 'client_id='.GITHUB_APP_CLIENT_ID?>&<?php echo 'redirect_uri='.urlencode(GITHUB_APP_CLIENT_REDIRECT_URL)?>">
        <button class="btn btn-danger">Github</button>     
          </a>  
    </div>

  </div>
</div>
