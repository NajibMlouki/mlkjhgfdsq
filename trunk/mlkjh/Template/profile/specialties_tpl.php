<div id="specialties">
            <div class="editbox"> 
            
            <small class="editlinks">
            <a href="/profile#" class="add" original-title="Add Work Experience">Ajouter</a> 
            </small>
            
              <h2>Sp&eacute;cialit&eacute;s &amp; Int&eacute;r&ecirc;ts</h2>
              <ul>
                <li> 
                	<em class="strong">
                		<?php
						new getNomById ("specialites","label","id_spec",$_SESSION ['loggedDoctor']['specialite']);
						
						?>
                	</em>
                     <br>
                        <span> 
        	   <?php
					echo $_SESSION ['loggedDoctor']['subSpecialite'];
			   ?> 
        		</span> 
                </li>
              </ul>
            </div>
          </div>