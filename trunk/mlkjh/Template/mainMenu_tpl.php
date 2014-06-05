  <div class="mast">
    <div class="inner">
      <p id="logoin"><a href="index.php"><img alt="Logo-onblack" src="./img/logo-doctunisie_00.png"></a></p>
      <label id="navsearch" ontouchstart="">
      <form accept-charset="UTF-8" action="/search" id="search_form" method="get">
        <div style="margin:0;padding:0;display:inline">
          <input name="utf8" type="hidden" value="?">
        </div>
        <input class="findall" id="search" maxlength="300" name="q" placeholder="Recherche Coll&egrave;gue, expertise" type="text">
      </form>
     
      </label>
      <div id="nav"><a class="pullnav" href="/profile#">Menu</a>
        <ul>
          <li id="home_tab"><a href="index.php" class="track_click" data-mixpanel-track="Home_NavClick" data-mixpanel-wait="true">Accueil</a></li>
          <li id="colleagues_tab"><a href="/colleagues">Coll&egrave;gues</a></li>
          <li id="inbox_tab"><a href="profilNonValide.html" class="reserved_feature">Email</a></li>
          <li id="docnews_tab"><a href="/doc_news">Articles</a></li>
          <li id="groups_tab"><a href="profilNonValide.html">Groupes</a>
            <ul>
              <li class="groupdir"><a href="/groups/directory"><img alt="Ico-group-directory" src="./img/ico-group-directory-4a6bb7ae07b37421135ed3c467b1e70e.png">Annuaire groupe</a></li>
            </ul>
          </li>
          <li class="here " id="profile_tab"><a href="myProfile.php">Profil</a></li>
          <li id="settings_tab">
             <a href="#">
              <img alt="Settings" src="./img/ico/ico-nav-settings-783d34c84b04c59263696bc9bbefb5a5.png">
              <span>Param&egrave;tres</span>
             </a>
            <ul>
              <li class="pro-communications"><a href="#">Compte &amp; Communication</a></li>
              <li class="pro-honoraria"><a href="/career_preferences">Emplois</a></li>
              <li class="pro-privacy"><a href="/privacy_settings">Priv&eacute;</a></li>
              <li class="pro-applications"><a href="/oauth/authorized_applications">Applications</a></li>
              <li class="pro-docnews"><a href="/doc_news/proxies">DocNews </a></li>
              <li class="pro-logout"><a href="deconnexion.php">D&eacute;connexion</a></li>
            </ul>
          </li>
          <li id="signout_tab"><a href="deconnexion.php">D&eacute;connexion</a></li>
        </ul>
      </div>
    </div>
  </div>