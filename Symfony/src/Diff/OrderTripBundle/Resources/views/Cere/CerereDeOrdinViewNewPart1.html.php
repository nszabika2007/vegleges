<div class="cerere-print-page_1" > 
	<div class='row' >
		<div class='pull-left' >
		Deplasări în străinătate <br />
		Nr. de intrare CCI: <?php echo $view_array[ "nr_de_CCI" ] ?> 
		</div>
		<div class='pull-right' >
			Aprobat <br />
			Ziua <?php echo $view_array['ziua_aprobarii'] ?> luna <?php echo $view_array['luna_aprobarii'] ?> anul <?php echo $view_array['anul_aprobarii'] ?>
		</div>
	</div>
	<div class='row text-center' >
		<h4>Către <br /> RECTORATUL UNIVERSITĂŢII BABEŞ-BOLYAI <br /> Centrul de Cooperări Internaţionale</h4>
	</div>
	<!-- First BLOCK START -->
	<div class='row' style='border: 1px solid #000 ;padding:8px;'>
		<i><b><u>SE COMPLETEAZĂ DE CĂTRE SOLICITANT</u></b></i><br />
		NUME, PRENUME, TITULATURA, FUNCŢIA ŞI FACULTATEA: 
		<p> <?php echo UI($view_array['nume_solicitant']." ,".$view_array['prenume_solicitant']." ,".$view_array['functia_solicitant']." ,".$view_array['functia_solicitant']." ,".$view_array['facultatea_solicitant'] , 680 ) ; ?></p>
		
			  DESTINAŢIA LOCALITATEA: <?php echo UI($view_array['destinatia_localitatea_solicitant'] , 250 ); ?>
			
			  ŢARA:   <?php echo UI( $view_array['destinatia_tara_solicitant'] , 225 ); ?>
			
		<p>SCOPUL DEPLASĂRII:   <?php echo UI( $view_array['scopul_deplasarii_solicitant'] , 550 ); ?></p>
		<p>RUTA pe care va avea loc deplasarea, cu precizarea mijlocului de transport (auto, auto personal, tren, avion):</p>
		<p><?php echo UI( $view_array['ruta_solicitant'] , 680 ); ?></p>
		<p>PERIOADA ÎN CARE ARE LOC ACŢIUNEA:  <?php echo UI ( $view_array['perioada_actiuni_solicitant'] , 440 ); ?></p>
	
				DATA PLECĂRII: <?php echo UI( $view_array['data_plecarii_solicitant'] , 246 ); ?>
		  
				DATA SOSIRII:  <?php echo UI( $view_array['data_sosirii_solicitant'] , 246 ) ; ?>
		<br />  
		Cheltuieli de deplasare (transport, diurnă, cazare, alte cheltuieli) suportate de către <b>instituţia parteneră/ alte resurse (sponsorizări</b>– se completează suma defalcată pe categorii de cheltuieli <b> -, fonduri personale</b> 
       	<br />
       	<?php echo UI( $view_array['cheltuieli_de_deplasare_solicitant'] , 680 ); ?> 
       	<br />
				 Cheltuieli salariale(%) : <?php echo UI( $view_array['cheltuieli_salariale_solicitant'] , 50 ); ?>
		   
				 Nr. telefon (opţional): <?php echo UI( $view_array['nr_telefon_solicitant'] , 90 ); ?>
		  
				 E-mail (opţional): <?php echo UI ( $view_array['email_solicitant'] , 170 ); ?>
		  
       <br />
	       		Data: <?php echo UI ( $view_array['data_solicitant'] , 100 ); ?>
	   		
			
	   			<span class='pull-right' >Semnătura solicitantului:  <?php echo UI( $view_array['semnatura_solicitant'] , 150 ); ?> </span>
			
	</div>
	<!-- First BLOCK End -->
	<br />
	<!-- Second Block START-->
	<div class='row' style='border: 1px solid #000 ;padding:8px;'>
		<i><b><u>SE COMPLETEAZĂ DE CĂTRE DIRECTORUL DE GRANT</u></b></i><br />
		Cheltuieli de deplasare solicitate şi aprobate de la Universitatea Babeş-Bolyai (cu precizarea sursei de provenienţă a banilor - <b>granturi CNCSIS, ctr. ID, ctr. PN II, contracte externe etc.)</b><br />
		
				Nr. grant/contract: <?php echo UI( $view_array['nr_grant_director_de_grant'] , 70 ); ?>
			
				Numele şi prenumele directorului de grant/contract :<?php echo UI( $view_array['nume_director_de_grant']." ".$view_array['prenume_director_de_grant'] , 200 ); ?>
			<br />     
	
				 1. Transport:<?php echo UI ( $view_array['transport_director_de_grant'] , 253 ); ?>
		  
				Transport intern: <?php echo UI( $view_array['transport_intern_director_de_grant'] , 253 ); ?>
		<br />  
		2. Diurnă (nr. zile x cuantum/zi):&nbsp;&nbsp;&nbsp; <?php echo UI( $view_array['diurna_director_de_grant'] , 488 ) ; ?><br />
        3. Cazare (nr. nopţi X cuantum/zi):&nbsp;&nbsp;&nbsp; <?php echo UI( $view_array['cazare_director_de_grant'] , 476 ); ?><br />
        4. Taxă participare:&nbsp;&nbsp;&nbsp; <?php echo UI ( $view_array['taxa_participare_director_de_grant'] , 560 ); ?><br />
        5. Alte cheltuieli (defalcate pe categorii):&nbsp;&nbsp;&nbsp; <?php echo UI ($view_array['alte_cheltuieli_director_de_grant'] , 437 ); ?><br />
        <div class='' >
        	
				 <span class="pull-right" ><b>TOTAL:</b> <?php echo UI ( $view_array['total_director_de_grant'] , 437 ); ?></span>
		 </div>
        <br /><br />
        		Data: <?php echo UI( $view_array['data_director_de_grant'] , 100 ); ?>
			
				 <span class='pull-right' >Semnătura directorului de grant: <?php echo  UI( "" , 150 ) ?> </span>
			
    </div>
	<!-- Second BLOCK End -->
	 <br />
	<!-- Third Block START-->
	<div class='row' style='border: 1px solid #000 ;padding:8px;'>
		<i><b><u>SE COMPLETEAZĂ DE CĂTRE DECANUL FACULTĂŢII</u></b></i><br />
		Cheltuieli de deplasare  aprobate din <b>fondurile facultăţii</b> 
			(cu precizarea sursei de provenienţă a banilor-fondurile extrabugetare-lei sau valută):<br />
		
		
				 1. Transport:<?php echo UI ( "" , 253 ); ?>
		  
				Transport intern: <?php echo UI( "" , 253 ); ?> <Br />
		
		2. Diurnă (nr. zile x cuantum/zi):&nbsp;&nbsp;&nbsp; <?php echo UI( "" , 488 ) ; ?><br />
        3. Cazare (nr. nopţi X cuantum/zi):&nbsp;&nbsp;&nbsp; <?php echo UI( "" , 476 ); ?><br />
        4. Taxă participare:&nbsp;&nbsp;&nbsp; <?php echo UI ( "" , 560 ); ?><br />
        5. Alte cheltuieli (defalcate pe categorii):&nbsp;&nbsp;&nbsp; <?php echo UI ("" , 437 ); ?><br />
        <div class='' >
        	<span class="pull-right" ><b>TOTAL:</b> <?php echo UI ( "" , 437 ); ?></span>
		 </div>
        <br /><br />
        Data: <?php echo UI( "" , 100 ); ?>
			
				 <span class='pull-right' >Semnătura directorului de grant: <?php echo  UI( "" , 150 ) ?> </span>
			<div class="pull-right">
				 (dacă finanţarea este din fondurile facultăţii - ştampila facultăţii)
			</div>
        </div>
     <!-- Third BLOCK End -->
        
    <!-- Rest of the Stuff-->    
        
    
    <div class="pull-left"><strong>Decan</strong> (fără finanţare din fondurile facultăţii - semnătura şi ştampila facultăţii):</div><div class="pull-right"><strong>Director de Departament</strong></div>
    <br /><br /> 
    <div class='row' > 
    <span style="width:500px;" class="pull-left">
    	<strong>Direcţia Generală Administrativă:</strong><br />
    (semnăturile se obţin de către solicitant în cazul<br /> în care finanţarea deplasării se face din granturi, sponsorizări, <br />contracte externe sau din fondurile facultăţii)
    </span>
    <span style="width:170px;" class="pull-right"><br /><strong>Director CCI</strong><br /> (semnătura se obţine de către responsabilul CCI)                                                                                                                                                
    </span>
    <br />
    </div>
    <div class='row' >
    <div style="width:430px;" class="pull-left"><strong>Departamentul de Cercetare</strong> (semnătura se obţine de către solicitant; doar pentru finanţare din granturi)</div>
    </div>
    </div>    
<Br />
	
