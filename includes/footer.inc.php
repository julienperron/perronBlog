		<!-- PIED DE PAGE -->
		<script src="assets/js/jquery-1.8.2.js"></script>

		</div>          
          <nav class="span4">
            <h2>Menu</h2>
            
            <ul>
                <li><a href="index.php">Accueil</a></li>
				<?php
					include('includes/verif_util.inc.php'); 
					if($connect == true) //On vérifie si l'utilisateur est bien connecté
					{
						//lorqu'on est connecté
				?>
				<li><a href="article.php">Rédiger un article</a></li>
				<li><a href="deconnexion.php">Déconnexion</a></li></br>
				<table>
					<tr>
						<td><input class="input" placeholder="Email" type="email" name="newsletter" id="newsletter"/></td>
					</tr> 
				</table>
				<input type="button" id="boutonNewsletter" name="boutonNewsletter" value="Newsletter" class="btn btn-primary"/>
				<label id="retour"></label></br>
				<?php
					}
					else
					{
						//lorqu'on est pas connecté
				?>
				<li><a href="connexion.php">Connexion</a></li>
				<li><a href="inscription.php">Inscription</a></li></br>
				<?php
					}
					//moteur de recherche
				?>
				<form method="post">
					<table>
						<tr>
							<td><input class="input" placeholder="Rechercher" type="text" name="champSearch" id="champSearch"/></td>
						</tr> 
					</table>
					<input type="submit" name="boutonSearch" value="Search" class="btn btn-primary"/>
				</form>
            </ul>
            
          </nav>
        </div>
        
      </div>

      <footer>
        <p>&copy; Nilsine & ULCO 2015</p>

      </footer>

    </div>

    <script text="text/javascript">

		$(document).ready(function()
		{
        	$('ul').hide(); //De base, on fait disparaitre le menu
        	
        	$('.span4').hover( 
				
               function () 
               {
                  	$('ul').slideDown(150); //apparait lorsqu'on passe sur le menu
               }, 
				
               function () 
               {
            		$('ul').slideUp(150); //disparait lorsqu'on n'est plus sur le menu
               }
            );
        });

    </script>

    <script type="text/javascript">
    		$("#boutonNewsletter").click(function(e)
	        {
		        $.ajax(
		        	{
		        		type: "GET",
		                url: "newsletter.php",
		                data: 'email=' + $("#newsletter").val(), 
		                success: function(response){  //fonction qui permet d'afficher la réponse du fichier newsletter (KO,OK,Déjà abonné)
		                	$("#retour").text(response);
		                }
		    		});
		        $("#newsletter").val(''); //efface le text du champ newsletter lorsqu'on clic sur le bouton
		    });
    </script>

  </body>
</html>