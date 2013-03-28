var formData2QueryString = function(form) {
 
     var submitContent = '';

         for(var i=0;i<form.elements.length;i++) {

             if(form.elements[i].type == 'text' || form.elements[i].type == 'password') {

                    var formElem = form.elements[i];

                    submitContent += formElem.name+'='+escape(formElem.value)+'&';
              }
          }

        submitContent = submitContent.substring(0,submitContent.length-1);

     return submitContent;
}


 var Login = new function(){

             this.ajax = null;

             this.form = null;

             this.promptDiv = null;

             this.dotSpan = null;

             this.button = null;

             this.enabled = true;

             this.dots = '';

             this.promptInterval = null;

             this.cleanup = function() {

                  var self = Login;

                      self.form=null;

                      self.promptDiv=null;

                      self.dotSpan=null;

                      self.button=null;
              };


             this.init = function(){
 
              var self = Login;
 
                  self.ajax = new Ajax();

                  self.form = document.getElementById('loginForm');

                  self.promptDiv = document.getElementById('promptDiv');

                  self.dotSpan = document.getElementById('dotSpan');

                  self.button = document.getElementById('submitButton');

                  self.setPrompt('base','Enter a login ID and password.');
 
                  self.form.LoginId.focus();

                  self.toggleEnabled(false);
 
                  self.form.onsubmit = function(){return false;}

             }//end init


            this.setPrompt = function(stat,msg){

                  var self = Login;

                  var promptDiv =self.promptDiv;

                  var msgSpan = document.getElementById('msgSpan');

                  promptDiv.className = stat + 'Prompt';

                  if(msgSpan.firstChild) {msgSpan.removeChild(msgSpan.firstChild);}

                  msgSpan.appendChild(document.createTextNode(msg));

             }//end setPrompt


             this.keyup = function(e){

                  var self = Login;

                  if(!e) e = window.event;

                  if(e.keyCode != 13) self.evalFormFieldState();

                             else {

                                      if(self.enabled) {self.submitData();}  
                                  }  

             }//end keyup




            this.evalFormFieldState = function(){

                   var self = Login;
 
                   if(self.form.LoginId.value.length > 0 && self.form.Pass.value.length > 0)  self.toggleEnabled(true);

                                                                  else

                                                                            self.toggleEnabled(false);

             }//end evalFormFieldState


             this.toggleEnabled = function(able){

                   var self = Login;

                       if(able){

                             self.button.onclick = self.submitData;   

                             self.button.disabled = false;

                             self.button.className = 'inputButtonActive';

                             self.enabled = true; 

                        } else {

                              self.button.onclick = null;   

                              self.button.disabled = true;

                              self.button.className = 'inputButtonDisabled';

                              self.enabled = false; 

                         }

              }//end toggleEnabled


              this.submitData = function(){

                   var url = 'backend/serverlogin.php'; 

                   var self = Login;

                   var dataPost = '';

                   dataPost = formData2QueryString(self.form);

                   self.ajax.doPost(url,dataPost,self.handleResponse);

                   self.showStatusPrompt();

                   self.toggleEnabled(false);


              }//end submitData


              this.showStatusPrompt = function(){

                   var self = Login;

                   self.setPrompt('proc','Processing');

                   self.promptInterval = setInterval(self.showStatusDots,200);

               }//end showStatusPrompt


               this.showStatusDots = function(){

                  var self = Login;

                  var dotSpan = self.dotSpan;

                  self.dots += '.';

                  if(self.dots.length > 4) self.dots = '';

                  if(dotSpan.firstChild) dotSpan.removeChild(dotSpan.firstChild);

                  dotSpan.appendChild(document.createTextNode(' '+self.dots));

                }//end showStatusDots


               this.handleResponse = function(str){

                  var self = Login;

                  var respArr = str.split(',');

                  var respType = respArr[0].toLowerCase();

                  var respMesg = respArr[1];

                      if(respType == 'success') {$('uiDiv').fade();document.getElement('h1').fade();setTimeout(function(){location.href = respMesg;},1000);}

                                           else { 

                                               var myShake=new Shake('uiDiv');

                                                   myShake.shake();
 
                                               self.showErrorPrompt(respMesg);

                                               } 


                }//end handleResponse


                this.showErrorPrompt = function(resp){

                     var self = Login;

                     var dotSpan = self.dotSpan;

                         clearInterval(self.promptInterval);

                         if(dotSpan.firstChild) dotSpan.removeChild(dotSpan.firstChild);

                         self.setPrompt('err',resp);

                         self.form.LoginId.value = '';

                         self.form.Pass.value = '';


                }//end shwoErrorPrompt
};

window.onunload = Login.cleanup;
window.onload = Login.init;
document.onkeyup = Login.keyup;