
<div class="container-fluid">
             <a class="navbar-brand" href="../index.php"><img src="../img/raha.png"></a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu"> 
                 <span class="navbar-toggler-icon" style="color: red;"></span>
             </button>
             <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav  ml-auto" >
                        <li class="nav-item">
                           <a class="nav-link custom-nav-link lang" href="../index.php" ><?php echo $lang['menu_home']; ?></a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link custom-nav-link translate" href="logout.php" ><?php echo $lang['menu_logout']; ?></a>
                        </li>
                        <!-- Language -->
                         <form method='get' action='#' id='form_lang' >
                              <select name='lang' onchange='changeLang();' class="nav-item nav-link custom-nav-link" >
                               <option value='en' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){ echo "selected"; } ?> >English</option>
                               <option value='ar' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar'){ echo "selected"; } ?> >العربية</option>
                              </select>
                         </form>
                    </ul>
             </div>      
         </div>
