<div class="col-1-4 procontact">
          <div id="completeness" class="completeness">
            <div id="profile_completeness_in_percent">
              <p>Achèvement du profil</p>
              <div class="progressbar">
                <div class="progress" style="width:85%;"> <small> 85 % </small> </div>
              </div>
              <ul>
                <li> <a href="/profile#" id="complete_private_contact_info"> Ajouter
                  Contact Info </a> </li>
                <li> <a href="/profile#" id="complete_pubmed_bibliography"> Ajouter
                  Article Publi&eacute; </a> </li>
              </ul>
            </div>
          </div>
          <div id="show_public_app">
            <div class="editbox"> <small class="editlinks"> <a href="/profile#" class="add" original-title="Add Office Location">Ajouter</a> </small>
              <h2>Info Bureau</h2>
              <ul class="locations">
                <li> 
                <small class="editlinks"> 
                <a href="/profile#" id="office_info_edit" class="edit">Modifier</a> 
                </small>
                <?php
                 new getNomById("gouvernorat","label","id_gouv",$_SESSION ['loggedDoctor']['gouvernorat']);
				 ?>
                 <br>
                <?php
                 echo $_SESSION ['loggedDoctor']['adresse'].", ".$_SESSION ['loggedDoctor']['codePostale'];
				 ?> 
                </li>
              </ul>
            </div>
          </div>
          <div id="locations"></div>
          <div id="show_private_app">
            <div class="editbox"> <small class="editlinks"><a href="/profile#" class="add" original-title="">Ajouter</a></small>
              <h2 class="nowrap">Info Priv&eacute;s</h2>
            </div>
          </div>
          <div id="show_pymk_app" data-sel-pymksuggestions="">
            <h2> <a href="/colleagues#peopleyoumayknow">Vous connaissez peut-&ecirc;tre</a> </h2>
            <div id="pymklist" data-sel-pymk="">
              <li class="pymk_sb_h header"><strong>Vous connaissez peut-être</strong></li>
              
                          
              <li class="pymk_sb person"><img alt="Safwan Halabi" src="./img/fellows/avatars/Safwan-Halabi-c8e6facb731f53fa1cd9ff28b8b3b76a.jpg" /> <a href="cv/safwanhalabi.html">Safwan Ben Ali</a> <br>
                <span class="grn"> MG </span> 
                Tunis, TN <a class="addcoll" href="/profile#"> <span>Ajouter Coll&egrave;gue</span> <img alt="Ico-add" src="./img/ico/ico-add-d6f62ca873fe3d193adcb0aced916990.png" title="Add Colleague"> </a> </li>
                
              <li class="pymk_sb person"><img alt="Salim Chahin" src="./img/fellows/avatars/Salim-Chahin-c3782b51b9b7c541dc221fea6255afdf.jpg" /> <a href="pub/salim-chahin-md.html">Salim Chaker</a> <br>
                <span class="grn"> MG </span> Tunis, TN <a class="addcoll" href="/profile#"> <span>Ajouter Coll&egrave;gue</span> <img alt="Ico-add" src="./img/ico/ico-add-d6f62ca873fe3d193adcb0aced916990.png" title="Add Colleague"> </a> </li>
                
              <li class="pymk_sb person"><img alt="Nancy Shadick, MD, MPH" src="./img/mab/nancy_shadick-94b9a45aab4337d5283c6d3d91673b39.jpg" /><a href="pub/nancy-shadick-md.html">Nancy Saadick</a> <br>
                <span class="grn"> MG </span> Tunis, TN <a class="addcoll" href="/profile#"> <span>Ajouter Coll&egrave;gue</span> <img alt="Ico-add" src="./img/ico/ico-add-d6f62ca873fe3d193adcb0aced916990.png" title="Add Colleague"> </a> </li>
                  
                
              <li class="pymk_sb person"><img alt="Nassir Azimi" src="./img/fellows/avatars/Nassir-Azimi-34a57847ac738db1cff57233313104dc.jpg" /> <a href="pub/nassir-azimi-md.html">Nassir Azimi</a> <br>
                <span class="grn"> MG </span> Tunis, TN <a class="addcoll" href="/profile#"> <span>Ajouter Coll&egrave;gue</span> <img alt="Ico-add" src="./img/ico/ico-add-d6f62ca873fe3d193adcb0aced916990.png" title="Add Colleague"> </a> </li>
              
              
              <li class="pymk_sb person seeMore"><a href="advisors.html">Voir plus »</a></li>
              <li class="pymk_sb separator"></li>
            </div>
          </div>
        </div>