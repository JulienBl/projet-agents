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



var numb = localStorage.getItem('the_cookie') || 30;
$(window).unload(function () {

    localStorage.setItem('the_cookie', numb);

});

$(document).ready(function () {

    var numba = 100;

    function comptage() {

        setTimeout(comptage, 1000);
        $('#test').html(numb);
        $("#progressbar").progressbar({ value: numba });

        numb--;
        numba = numba - (numba / numb);


        if (numb < 0 && numba < 0) {

            numb = 0;
            numba = 0;
        }



    }
    comptage();

});


