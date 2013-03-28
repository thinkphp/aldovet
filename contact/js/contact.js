/**
	Copyright (c) 2009 Adrian Statescu me [at] thinkphp.ro [dot] ro; http://thinkphp.ro

	Permission is hereby granted, free of charge, to any person obtaining a copy
	of this software and associated documentation files (the "Software"), to deal
	in the Software without restriction, including without limitation the rights
	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	copies of the Software, and to permit persons to whom the Software is
	furnished to do so, subject to the following conditions:

	The above copyright notice and this permission notice shall be included in
	all copies or substantial portions of the Software.

	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
	THE SOFTWARE.
*/

//show me love to the Module Pattern
var contact = function() {

     var showError = true;

     var cache = Array();

     var xmlhttp = getXMLHttpRequestObject();

     var xmlhttpForm = getXMLHttpRequestObject();

     var urlserver = "validate.php";

     //create Object XMLHttpRequest
     function getXMLHttpRequestObject() {

              var xmlhttp;

              if(window.ActiveXObject) {

              try{ xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
         
                       catch(e){

                            try{xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");} 

                                  catch(e){xmlhttp = false;} 
                       }

               } else if (window.XMLHttpRequest){ try{xmlhttp = new XMLHttpRequest();}catch(e){xmlhttp = false;} 


       }//end elseif
              

       if(!xmlhttp) displayError('The browser does not suport Ajax. Consider upgrading the browser!Error creating the XMLHttpRequest object');

         else {return xmlhttp;}

      }//end function XMLHttpRequest


       //function that displays errors
       function displayError(stringError){

           if(showError) {

                 showError = false;

                 alert(stringError);
            }

        }//end function

        

       function validate(inputValue,fieldId) {

                document.getElementById("flagMessage").innerHTML = "";

                var name = trim(document.getElementById("txtName").value);

                var email = trim(document.getElementById("txtEmail").value);

                var url = trim(document.getElementById("txtURL").value);

               //send data GET
               var paramsGET = "?name="+trim(name)+"&email="+email+"&url="+url+"&sid="+new Date().getTime();


               //if object xmlhttp isn`t void
               if(xmlhttp) {

               //add to cache
               if(fieldId) cache.push(inputValue+"&"+fieldId);

              //if length-cache != 0
                if(cache.length > 0) 
                      {
                         //shift cache  
                         var cacheEntry = cache.shift();
                              
                             //split cache &
                            var values = cacheEntry.split("&");
                                inputValue = values[0];
                                fieldId = values[1];

                            //make a request to the server and send data POST retrieved
                              paramsPOST = "inputValue="+inputValue+"&fieldId="+fieldId;

                              xmlhttp.open("POST",urlserver+paramsGET,true);
                              xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); 
                              xmlhttp.onreadystatechange = handleUpdate;
                              xmlhttp.send(paramsPOST); 
                       
                      }//end if cache


              }//end if xmlhttp

           }//end function validate


          var handleUpdate = function() {

                     if(xmlhttp.readyState == 4) {

                            if(xmlhttp.status == 200) {

                            try{readResponse();}

                               catch(e) {displayError(e.toString());}
                             }
                      } 
          }//end handleUpdate


       var readResponse = function() {

           var response = xmlhttp.responseXML;
           var objectPreview = document.getElementById('preview');
           var xmldoc = response.documentElement;

           var result = xmldoc.getElementsByTagName('result')[0].firstChild.data;
           var fieldid = xmldoc.getElementsByTagName('fieldid')[0].firstChild.data;

           document.getElementById(fieldid + 'InvalidImg').className = (result == 0) ? 'visible' : 'invisible'; 
           document.getElementById(fieldid + 'ValidImg').className = (result == 1) ? 'visible' : 'invisible'; 
           document.getElementById(fieldid).className = (result == 1) ? 'validText' : 'invalidText';

           var previewText = xmldoc.getElementsByTagName('preview')[0].firstChild.data;
           var to = xmldoc.getElementsByTagName('to')[0].firstChild.data;
           var name = xmldoc.getElementsByTagName('name')[0].firstChild.data;
           var email = xmldoc.getElementsByTagName('email')[0].firstChild.data;
           var url = xmldoc.getElementsByTagName('url')[0].firstChild.data;
           var messageText = xmldoc.getElementsByTagName('message')[0].firstChild.data;

           prev="<div id='head_preview'>Message Preview</div><br />";
           prev+="<strong>To: </strong>" + " " + to+"<br />";

           if(name!="none") prev+="<strong>Subject: </strong>[business] contact from "+name+"<br />";
           if(name!="none") prev+="<strong>From: </strong> " + " "+ name+" ";
           if(email!="none") prev+="&lt;"+email+"&gt;"+"<br />";
           if(url!="none") prev+= "<strong>Url: </strong>" + " " + url;
           if(messageText!="none") prev+= "<br/><strong>Message: </strong>" + " " + messageText;

           objectPreview.innerHTML = prev;

          solveButton();

        }//end function


        var solveButton = function() {

               if(document.getElementById("txtNameValidImg").className == 'visible' &&  document.getElementById("txtMessageValidImg").className == 'visible' && document.getElementById("txtEmailValidImg").className == 'visible' &&  document.getElementById("txtURLValidImg").className == 'visible') {

                       document.getElementById("btnSubmit").style.display='inline';
                       document.getElementById("btnSubmit2").style.display='none';

                } else {

                        document.getElementById("btnSubmit").style.display='none';
                        document.getElementById("btnSubmit2").style.display='inline';
                }

         }//end function



         function submitForm(objForm) {

            var name = objForm.elements[0].value;
            var email = objForm.elements[1].value;
            var url = objForm.elements[2].value;
            var message = objForm.elements[3].value;

                var serverpage = urlserver + "?action=validatePHP";

                var paramsPOST = 'txtName='+name+'&txtEmail='+email+'&txtURL='+url+'&txtMessage='+message;

                     xmlhttpForm.open("POST",serverpage,true);

                     xmlhttpForm.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

                     xmlhttpForm.onreadystatechange = function() {

                         if(xmlhttpForm.readyState == 4) {

                                  if(xmlhttpForm.status == 200) {

                                         document.getElementById('flagMessage').innerHTML = xmlhttpForm.responseText;
                                   }
                          }

                     }

                     xmlhttpForm.send(paramsPOST);

                     objForm.reset();

                     restoreClassForm();

          }//end function

          var frmName = document.getElementById('frmName');

          var btnSubmit = document.getElementById('btnSubmit');

              btnSubmit.onclick = function(){submitForm(frmName);}

            var restoreClassForm = function() {

                    document.getElementById("txtNameValidImg").className = 'invisible';
                    document.getElementById("txtEmailValidImg").className = 'invisible';
                    document.getElementById("txtURLValidImg").className = 'invisible';
                    document.getElementById("txtMessageValidImg").className = 'invisible';
                    document.getElementById("txtNameInvalidImg").className = 'visible';
                    document.getElementById("txtEmailInvalidImg").className = 'visible';
                    document.getElementById("txtURLInvalidImg").className = 'visible';
                    document.getElementById("txtMessageInvalidImg").className = 'visible';
                    document.getElementById("txtName").className ='invalidText';
                    document.getElementById("txtEmail").className = 'invalidText';
                    document.getElementById("txtURL").className = 'invalidText'
                    document.getElementById("txtMessage").className = 'invalidText';
            }

            var trim = function(str) {return str.replace(/^\s+/,'').replace(/\s+$/,'');}

       return {validate: validate}

}();//do EXE 