<div id="works" data-sel-works="">
            <div class="editbox"> <small class="editlinks"> <a href="" class="add"  original-title="Add Work Experience">Ajouter</a> </small>
              <h2>Histoire de travail</h2>
              <ul>
              <?php
				$profil =  new myProfile;
				$his = $profil->select_histoireTravail();
               ?>                  
              </ul>
            </div>
          </div>