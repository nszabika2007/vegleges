<?php
//include "cerereordin_class.php";
//$_tcerereordin = new CerereDeOrdin();
//$_tcerereordin->set_nr_de_CCI('132');

//$view_array=$_tcerereordin->get_cerereordin_array();
$HTML_output="<div class=\"container\">
				<div class=\"pull-right\">
					Aprobat<br />
					Ziua ".$view_array['ziua_aprobarii']."    luna ".$view_array['luna_aprobarii']."  anul ".$view_array['anul_aprobarii']." 
				</div>
				<div class=\"float-left\">
						Deplasări în străinătate <br />
						Nr. de intrare CCI:".$view_array['nr_de_CCI']."
				</div>
				<div >
					<h3><p class=\"text-center\">Către <br />
					RECTORATUL UNIVERSITĂŢII BABEŞ-BOLYAI <br />
					Centrul de Cooperări Internaţionale</p></h3>
				</div>

				<div style=\"padding:8px;border-style:solid;border-width:1px;\">
				<p><strong><em>SE COMPLETEAZĂ DE CĂTRE SOLICITANT</em></strong><br />
					NUME, PRENUME, TITULATURA, FUNCŢIA ŞI FACULTATEA <br />
					".$view_array['nume_solicitant']." ".$view_array['prenume_solicitant']." ".$view_array['functia_solicitant']." ".$view_array['functia_solicitant']." ".$view_array['facultatea_solicitant']."<br />
					DESTINAŢIA: LOCALITATEA ".$view_array['destinatia_localitatea_solicitant']."ŢARA ".$view_array['destinatia_tara_solicitant']."<br />
					SCOPUL DEPLASĂRII ".$view_array['scopul_deplasarii_solicitant']."<br />
					RUTA pe care va avea loc deplasarea, cu precizarea mijlocului de transport (auto, auto personal, tren, avion): <br />
					".$view_array['ruta_solicitant']."<br />
					<hr /><br />
					PERIOADA ÎN CARE ARE LOC ACŢIUNEA:".$view_array['perioada_actiuni_solicitant']." <br />
					DATA PLECĂRII: ".$view_array['data_plecarii_solicitant']." DATA SOSIRII: ".$view_array['data_sosirii_solicitant']." <br />
					Cheltuieli de deplasare (transport, diurnă, cazare, alte cheltuieli) suportate de către <strong>instituţia parteneră/ alte resurse (sponsorizări</strong> – se completează suma defalcată pe categorii de cheltuieli<strong>-, fonduri personale</strong>) <br />
					".$view_array['cheltuieli_de_deplasare_solicitant']."<br />
					Cheltuieli salariale (%): ".$view_array['cheltuieli_salariale_solicitant']." Nr. telefon (opţional):".$view_array['nr_telefon_solicitant']." E-mail (opţional):".$view_array['email_solicitant']."<br />
					Data:".$view_array['data_solicitant']." Semnătura solicitantului:".$view_array['semnatura_solicitant']." <br />
				</p>
				</div>
				<br />
				<div style=\"padding:8px;border-style:solid;border-width:1px;\">
				<p>
				<strong><em>SE COMPLETEAZĂ DE CĂTRE DIRECTORUL DE GRANT</em></strong><br />
				Cheltuieli de deplasare solicitate şi aprobate de la Universitatea Babeş-Bolyai (cu precizarea sursei de provenienţă a banilor - <strong>granturi CNCSIS, ctr. ID, ctr. PN II, contracte externe etc.)</strong>
				Nr. grant/contract ".$view_array['nr_grant_director_de_grant']."Numele şi prenumele directorului de grant/contract :".$view_array['nume_director_de_grant']." ".$view_array['prenume_director_de_grant']."<br />
				<ol>
					<li>Transport:".$view_array['transport_director_de_grant']."Transport intern: ".$view_array['transport_intern_director_de_grant']."</li>
					<li>Diurnă (nr. zile x cuantum/zi): ".$view_array['diurna_director_de_grant']."</li>
					<liCazare (nr. nopţi X cuantum/zi): ".$view_array['cazare_director_de_grant']."</li>
					<li>Taxă participare: ".$view_array['taxa_participare_director_de_grant']."</li>
					<li>Alte cheltuieli (defalcate pe categorii): ".$view_array['alte_cheltuieli_director_de_grant']."</li>
				</ol>
				<strong>Total: ".$view_array['total_director_de_grant']."</strong><br />
				Data: ".$view_array['data_director_de_grant']." Semnătura directorului de grant:".$view_array['semnatura_director_de_grant']." 
				<br />
				</p>
				</div>
				<br />
				<div style=\"padding:8px;border-style:solid;border-width:1px;\">
				<p>
				<strong><em>SE COMPLETEAZĂ DE CĂTRE DECANUL FACULTĂŢII</em></strong><br />
				Cheltuieli de deplasare  aprobate din <strong>fondurile facultăţii</strong> (cu precizarea sursei de provenienţă a banilor-fondurile extrabugetare-lei sau valută):
				<ol>
					<li>Transport:".$view_array['transport_decan']."Transport intern: ".$view_array['transport_intern_decan']."</li>
					<li>Diurnă (nr. zile x cuantum/zi): ".$view_array['diurna_decan']."</li>
					<liCazare (nr. nopţi X cuantum/zi): ".$view_array['cazare_decan']."</li>
					<li>Taxă participare: ".$view_array['taxa_participare_decan']."</li>
					<li>Alte cheltuieli (defalcate pe categorii): ".$view_array['alte_cheltuieli_decan']."</li>
				</ol>
				<strong>Total: ".$view_array['total_decan']."</strong><br />
				Data: ".$view_array['data_decan']." Semnătura directorului de grant:".$view_array['semnatura_decan']." 
				<br />
				</p>
				</div>
				<br />
				<div style=\"margin:5px;\" class=\"pull-left\"><strong>Decan</strong> (fără finanţare din fondurile facultăţii - semnătura şi ştampila facultăţii):</div><div class=\"pull-right\"><strong>Director de Departament</strong></div>
				<div style=\"margin:5px;\" class=\"pull-left\"><strong>Direcţia Generală Administrativă</strong>:(semnăturile se obţin de către solicitant în cazul în care finanţarea deplasării <br />se face din granturi, sponsorizări, contracte externe sau din fondurile facultăţii) 
				</div>
				<div style=\"margin-bottom: 15px;\" class=\"pull-right\"><strong>Director CCI</strong> (semnătura se obţine de către responsabilul CCI)                                                                                                                                                 
				</div>
				<div style=\"margin:5px;\" class=\"pull-left\"><strong>Departamentul de Cercetare</strong> (semnătura se obţine de către solicitant; doar pentru finanţare din granturi)</div>
				<br />
				<div style=\"clear: both;\">

					<h4><p class=\"text-center\">Cererea, aprobată de către facultate, împreună cu toate documentele justificative, se depune la Centrul de Cooperări Internaţionale de luni până vineri între orele 10:00 – 13:00. Aprobările la nivelul Rectoratului se obţin de către Centrul de Cooperări Internaţionale.</p></h4>

				</div>

				<br />
				<div>
				<h4><em>Informaţii suplimentare:</h4></em>
				<br />
				<strong>Pentru deplasări mai mari de 90 de zile :</strong>
				<ol>
				<li><blockquote>
					  <p>Art. 304 alin. (9) din Legea 1/2011 personal solicitat în baza acordurilor interuniversitare sau trimis de către instituţie la specializare.</p>
					</blockquote>
					Pe perioada deplasării se asigură o indemnizaţie lunară în lei, calculată în raport cu salariul de bază şi sporul de vechime, corespunzător funcţiei şi gradului profesional, aşa cum prevede art. 5B/b din H.G. 518/1995, condiţionat de semnarea unui act adiţional la contractul de muncă prin care se obligă ca după întoarcerea în ţară să lucreze o perioada de 5 ani în instituţia noastră.
					Notă: Cei care pleacă în străinătate conf. art. 5, lit. B/b din H.G. 518/1995 în interesul unităţii trimiţătoare, pentru o perioadă mai mare de 90 de zile pentru a participa la cursuri şi stagii de practică, specializare şi perfecţionare cu suportarea parţială sau integrală a cheltuielilor de către diferite organizaţii sau alţi parteneri externi primesc în ţară o indemnizaţie lunară în lei calculată în raport cu salariul de bază, sporul de vechime corespunzator funcţiei şi gradului profesional după cum urmează:
					<ul>
						<li>25 % pentru acoperirea cheltuielilor legate de întreţinerea locuinţei;</li>
						<li>25 % pentru fiecare copil sau părinte aflat în întreţinere, potrivit legii, în ţară, precum şi pentru soţia/soţul care nu realizează venituri.</li>
					</ul>
				</li>
				<br />
				<li><blockquote>
					  <p>Art. 304 alin. (10) din Legea 1/2011 – stagii de specializare, cercetare ştiinţifică au dreptul la concedii fără plată, a căror durată nu poate depăşi 3 ani într-un interval de 7 ani.</p>
					</blockquote></li>
				<br />
				<li><blockquote>
					  <p>Art. 304 alin. (11) coroborat cu art. 304 alin. (12) din Legea 1/2011 - perioada aprobată se consideră concediu fără plată, cu rezervarea catedrei şi recunoaşterea vechimii în învăţământ.</p>
					</blockquote>

						<ul>
							<li>Formularul tip de cerere se poate obţine de la CCI, secretariatul facultăţii sau se poate downloada de pe site-ul CCI (www.cci.ubbcluj.ro/outgoing-mobility/dispozitia-rectorului.htm);</li>
							<li>Cuantumul aferent diurnei, respectiv cazării, este prevăzut în H.G. 518/1995, cu modificările şi completările ulterioare;</li>
							<li>Diurna suportată din fondurile facultăţii nu poate depăşi 5 zile;</li>
							<li>Toate plăţile efectuate pe teritoriul României se decontează în lei;</li>
							<li>Orarul de relaţii cu publicul al Centrului de Cooperări Internaţionale: luni - vineri între orele 10:00-13:00;</li>
							<li><strong>Depunerea cererilor: luni - vineri între orele 10:00-13:00;</strong></li>
							<li><strong>Eliberarea Dispoziţiei Rectorului</strong> (după ce a fost discutată şi aprobată în Şedinţa Consiliului de Administraţie): miercuri-vineri între orele 10:00-13:00;</li>
							<li><strong>Dispoziţiile Rectorului nu se eliberează retroactiv;</strong></li>
							<li><strong>Eliberarea Dispoziţiei Rectorului</strong> se poate face şi în regim de urgenţă (cererile sunt aprobate fără a fi discutate în Consiliului de Administraţie) contra unei taxe (30 lei). Taxa se achită la sediul CCI în momentul eliberării Dispoziţiei Rectorului;</li>
							<li><strong>Refacerea Dispoziţiei Rectorului</strong> (înainte de plecarea în străinătate) se poate aproba contra unei taxe (45 lei). Taxa se achită la sediul CCI în momentul eliberării Dispoziţiei Rectorului;</li>
							<li><strong>Suplimentarea Dispoziţiei Rectorului</strong> (la întoarcerea din deplasare) se poate aproba contra unei taxe (45 lei). Taxa se achită la sediul CCI în momentul eliberării Dispoziţiei Rectorului;</li>
							<li>Informaţii suplimentare se pot obţine şi la adresa e-mail: tcarmen@staff.ubbcluj.ro, pe site-ul CCI (www.cci.ubbcluj.ro/outgoing-mobility/dispozitia-rectorului.htm) sau la telefon: 0264/429762, int. 6011.</li>
						</ul
					</li>
				</ol>
				<br />
				<h4><em>Documente adiţionale:</h4></em>
				<br />
				<ul>
					<li>Cererea va fi însoţită de o copie a <b><u>invitaţiei</b></u> primite de la instituţia care organizează evenimentul;</li>
					<li>În cazul în care finanţarea deplasării se face din fonduri UBB (facultate, granturi, contracte, sponsorizări etc.) cererea va fi însoţită de o <b><u>declaraţie pe proprie răspundere</b></u> din care să reiasă că acele categorii de cheltuieli solicitate nu sunt acoperite şi din alte surse (organizatori, sponsorizări etc.);</li>
					<li>În cazul în care finanţarea se va face din granturi (CNCSIS, ctr. ID, PN II, contracte externe, sponsorizări etc.) este necesară semnătura directorului de grant, cu precizarea sumei, iar dacă cheltuielile sunt suportate din fondurile facultăţii se cere aprobarea decanului; Solicitantul trebuie să obţină (înainte de a depune cererea spre aprobarea Consiliului de Administraţie) si următoarele semnături pe formularul tip de cerere:  Direcţia Generală Administrativă a UBB – persoana responsabilă cu grantul/contractul sau a d-lui Director Financiar-Contabil (dacă banii provin din fondurile facultăţii) şi semnătura de la Departamentul de Cercetare;</li>
					<li>Dacă deplasarea are o durată mai mare de o săptămână şi are loc în timpul perioadei de activitate didactică este nevoie de acordul scris al <b><u>Directorului de Departament</b></u>,  care să precizeze modalitatea de suplinire a sarcinilor didactice ale solicitantului;</li>
					<li>Dacă perioada deplasării este mai mare de 90 de zile calendaristice (în cazul cadrelor didactice) sau o lună (în cazul doctoranzilor cu frecvenţă) este necesară şi <b><u>completarea unui contract</b></u> (care poate fi procurat de la Centrul de Cooperări Internaţionale sau de la secretariatul facultăţii);</li>
					<li>În cazul în care se solicită aprobarea pentru efectuarea <b><u>deplasării cu autoturismul proprietate</b></u> personală trebuie făcută <b><u>dovada scrisă</b></u>, prin prezentarea de oferte -tren, avion- a faptului că totalul costurilor implicate este mai mic decât cu celelalte mijloace de transport. De asemenea, trebuie menţionat pe formularul de cerere nr. de km., dus-întors, pe drumul cel mai scurt. În cazul în care contravaloarea transportului cu trenul, respectiv avionul, este mai mică, se aprobă decontarea cheltuielilor cu autoturismul proprietate personală până în limita ofertelor prezentate;</li>
					<li>În cazul în care se plăteşte o <b><u>taxă de participare trebuie făcută dovada cuantumului taxei, precum şi a beneficiilor/serviciilor pe care le include;</b></u></li>
					<li>Rubrica alte cheltuieli, poate include după caz: taxă viză, achiziţii cărti, taxe autostradă, taxe parcare etc.;</li>
					<li>Rubrica transport intern se referă la transportul în ţara de destinaţie; se pot deconta doar 2 călătorii (de la aeroport/gară la hotel şi de la hotel la aeroport/gară, NU se decontează taximetru), precum şi între diferite oraşe în ţara de destinaţie (cu condiţia ca acestea să fie menţionate în Dispoziţia Rectorului).</li>
				</ul>
				</div>
</div>";
echo $HTML_output;
?>
