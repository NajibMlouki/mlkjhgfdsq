<div id="hospitals" data-sel-hospitals="">
            <div class="editbox"> <small class="editlinks"> <a href="/profile#" class="add" original-title="Hospital Affiliations"> Ajouter </a> </small>
              <h2>Hopital Affiliations</h2>
              <ul>
              <?php
			  $res = $profil->select_instAffiliation();
			  ?> 

              </ul>
            </div>
          </div>