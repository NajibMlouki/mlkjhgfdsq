        <li class="themedschool">
        <small class="editlinks"> 
        <a href="/profile#" data-dialog="{ &quot;title&quot;: &quot;Edit Medical School&quot;, &quot;url&quot;: &quot;/profiles/5994749/training/4390789/edit?institution[type]=MedicalSchool&quot; }">Modifier</a> 
        </small> 
        <a href="/welcome/classmates?user_id=5994749"> <img class="badge_image" alt="Medical School Logo" src="./img/ico/hospital-256.png" > </a> 
        <a href="/welcome/classmates?user_id=5994749" class="strong">
               <?php
			   		echo $tab['nom']
			   ?>
        </a>
        	<br>
        	<span> 
        	   <?php
					echo $tab['formation'].',';
			   ?> 
        	</span>
            <span> 
        	   <?php
					echo $tab['typeProgram']
			   ?> 
        	</span>
           <br />
            <span> 
        	   <?php
					echo $tab['lab_gouv'].', '.$tab['lab_pays'].',';
			   ?> 
        	</span>
            <small class="date">  <?php echo substr($tab["dateDeb"],0,4). ' - ' .substr($tab["dateFin"],0,4) ?> </small> 
        </li>