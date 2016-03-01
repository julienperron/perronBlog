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
				    <div id="openModal" class="alert">
      					<button type="button" class="close" id="close" data-dismiss="alert">&times;</button>
      					<span id="retour"></span>
    				</div>
				<table>
					<tr>
						<td><input class="input" placeholder="Email" type="email" name="newsletter" id="newsletter"/></td>
					</tr> 
				</table>
				<input type="button" id="boutonNewsletter" name="boutonNewsletter" value="Newsletter" class="btn btn-primary"/>
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

            $('#openModal').slideUp(); //de base, on fait disparaitre l'alerte du newsletter
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
		                	$("#retour").text(response); //on rempli le texte du span de l'erreur
							$('#openModal').removeClass(); //on efface toute les classes de l'alerte
							$('#openModal').slideDown(); //on affiche l'alerte
							if(response=="Vous êtes abonné !") //si on est abonné
							{
								$('#openModal').addClass("alert alert-success"); //alors on ajoute la classe success (vert)
							}
							else if(response=="Vous êtes déjà abonné !") //si on est déjà abonné
							{
								$('#openModal').addClass("alert alert-info");//alors on ajoute la classe info (bleu)						
							}
							else
							{
								$('#openModal').addClass("alert alert-error"); //sinon on ajoute la classe error (rouge) dans les autres cas
							}
		                }
		    		});
		        $("#newsletter").val(''); //efface le text du champ newsletter lorsqu'on clic sur le bouton
		    });

			$('#newsletter').keypress(function(event){ //si il appuie sur la touche entrer
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){ //le numéro 13 signifie la touche entrer
                    $.ajax(
		        	{
		        		type: "GET",
		                url: "newsletter.php",
		                data: 'email=' + $("#newsletter").val(), 
		                success: function(response){  //fonction qui permet d'afficher la réponse du fichier newsletter (KO,OK,Déjà abonné)
		                	$("#retour").text(response);
		                	$('#openModal').slideDown();
		                	$('#openModal').removeClass();
							if(response=="Vous êtes abonné !")
							{
								$('#openModal').addClass("alert alert-success");
							}
							else if(response=="Vous êtes déjà abonné !")
							{
								$('#openModal').addClass("alert alert-info");								
							}
							else
							{
								$('#openModal').addClass("alert alert-error");
							}
		                }
		    		});
		        	$("#newsletter").val(''); //efface le text du champ newsletter lorsqu'on clic sur le bouton
                }
                event.stopPropagation();
            });

            $("#close").click(function(e) //lorsqu"on clique sur la croix de l'alerte
	        {
		        $('#openModal').slideUp(); //on efface l'alerte
		    });

    </script>

  </body>
</html>
