<div id="training" data-sel-training="">
            <div class="editbox"> <small class="editlinks"> <a href="/profile#" class="add" data-dialog="{ &quot;title&quot;: &quot;Add Education or Training&quot;, &quot;url&quot;: &quot;/profiles/5994749/training/new&quot; }">Ajouter</a> </small>
              <h2>Education &amp; Formation</h2>
              <ul class="training">
                <?php
					             $edu = $profil->select_educationTraining()
				        ?>
              </ul>
            </div>
          </div>