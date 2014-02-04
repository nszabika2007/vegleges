<?php

$HTML_output="<div class=\"container\">
				<div >
					<h3><p style=\"margin-bottom:40px;\" class=\"text-center\">Declaratie</p></h3>
				</div>
				<div>
				Subsemnatul <strong>".$view_array['subsemnatul']." ".$view_array['institutia']."</strong> declar pe propria mea raspundere, ca voi efectua mobilitatea la
				 <strong>".$view_array['destinatia']."</strong> perioada <strong>".$view_array['perioada']."</strong>, resursele finaciare fiind acoperit numai din proiectul <strong>".$view_array['proiect']."</strong> director proiect <strong>".$view_array['director']."</strong>.
				</div>
				<br />
				<div>
				Data<br />
				".$view_array['data']."
				</div>
			</div>";

echo $HTML_output;

?>