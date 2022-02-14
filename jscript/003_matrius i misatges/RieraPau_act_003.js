let matriu_act03 = new Array();

function afegeixElementAMatriu(){
   let text = document.getElementById("elementAAfegir").value;
   if(text != ""){
      matriu_act03.push(text); 
      alert("s'ha afegit correctament el valor: "+text);
      document.getElementById("elementAAfegir").value = "";
      document.getElementById("btNeteja").classList.add("red");
   }else{
      alert("No pots afegir un valor buit");
   }
}

function mostraElementsMatriu(){
   if (matriu_act03[0]!=null){
      let text = "";
      for(i=0;i<matriu_act03.length;i++){
         text += "valor "+i+": "+matriu_act03[i]+"<br>";
      }
      let resultat = document.getElementById("resultat");
      resultat.innerHTML = text;
      resultat.classList.add("b");
      text="";
   }else{
      alert("No pots mostrar un array buit");
   }

}

function netejaMatriu(){
   let c = confirm("Estas segur de eliminar tots els registres?");
   if (c==true){
      matriu_act03.splice(0);
      alert("s'ha esborrat el contingut");
      let resultat = document.getElementById("resultat");
      resultat.innerHTML = "";
      resultat.classList.remove("b");
      document.getElementById("btNeteja").classList.remove("red");
   }else{
      alert("no s'ha esborrat res");
   }
 
}
