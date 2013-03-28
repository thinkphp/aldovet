(function(){

          var trs = document.getElementsByTagName('tr');

              for(var i=0;i<trs.length;i++) {

                        trs[i].onmouseover = function() {

                              this.className += ' hilite';  
                        }    


                        trs[i].onmouseout = function() {

                              this.className = this.className.replace('hilite',' ');
                        }    

                   if(i%2!=0) {
 
                        trs[i].className = 'addcolor'; 
                   }

              }//end-for

})(); 
