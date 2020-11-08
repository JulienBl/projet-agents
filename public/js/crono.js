/*
* Ecoulement du temps
*/
 /* -- -- -- Début -- -- -- */
 var cpt = 1800 ;
 var x ;
 
 function decompte()
 {
     if(cpt>=0)
     {
         if(cpt>1)
         {
             var sec = " secondes ";
         } else {
             var sec = " seconde ";
         }
         document.getElementById("Crono").innerHTML = "Vous avez " + cpt + sec + "pour réaliser la mission" ;
         cpt-- ;
         x = setTimeout("decompte()",1000) ;
     }
     else
     {
         clearTimeout(x) ;
     }
 }
 /* -- -- -- Fin -- -- -- */






