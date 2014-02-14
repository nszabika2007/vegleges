<?php
$HTML_output="<div class=\"cerere-print-page_1\">
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
                <p><strong><em><u>SE COMPLETEAZĂ DE CĂTRE SOLICITANT</u></em></strong><br />
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
                    <div class=\"pull-left\">Data:".$view_array['data_solicitant']."</div> <div class=\"pull-right\"> Semnătura solicitantului:".$view_array['semnatura_solicitant']."</div> <br />
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
                <div class=\"pull-left\">Data: ".$view_array['data_director_de_grant']."</div> <div class=\"pull-right\"> Semnătura directorului de grant:".$view_array['semnatura_director_de_grant']."</div>
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
                <div class=\"pull-left\">Data: ".$view_array['data_decan']."</div> <div class=\"pull-right\">Semnătura Decanului:".$view_array['semnatura_decan']."</div>
                <br />
                </p>
                </div>
                <div style=\"padding:5px;\">
                                <div style=\"margin:5px;\" class=\"pull-left\"><strong>Decan</strong> (fără finanţare din fondurile facultăţii - semnătura şi ştampila facultăţii):</div><div class=\"pull-right\"><strong>Director de Departament</strong></div>
                <div style=\"margin:5px;\" class=\"pull-left\"><strong>Direcţia Generală Administrativă</strong>:(semnăturile se obţin de către solicitant în cazul în care finanţarea deplasării <br />se face din granturi, sponsorizări, contracte externe sau din fondurile facultăţii)
                </div>
                <div style=\"margin-bottom: 15px;\" class=\"pull-right\"><strong>Director CCI</strong> (semnătura se obţine de către responsabilul CCI)                                                                                                                                                
                </div>
                <br />
                <div style=\"margin:30px;\" class=\"pull-left\"><strong>Departamentul de Cercetare</strong> (semnătura se obţine de către solicitant; doar pentru finanţare din granturi)</div>
                </div>
           

</div>";
echo $HTML_output;
?>