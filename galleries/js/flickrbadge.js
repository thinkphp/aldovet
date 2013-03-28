//show me love to the Module Pattern
var flickrbadge = function() {

                    var x = document.getElementById('flickrbadge');

                        function init() {

                              if(!x || !document.getElementById || !document.getElementsByTagName) {return;}  

                                  document.getElementById('results').innerHTML = 'Loading...';

                              var src = 'http://thinkphp.ro/apps/YQL/getFlickrBy/getFlickrBy.php?user=41949646@N03&size=s&amount=40&format=json&callback=flickrbadge.seed';

                                  loadScript(src,function(){

                                            window.addEvent('domready', function() {

                                               ReMooz.assign('#flickrbadge a', {'origin': 'img','shadow': 'onOpen','opacityResize': 0.1, 'cutOut': true, 'dragging': true, 'centered': true,'closer': true,});

                                            });

                                  });

                        };//end function init

                        function loadScript(src,callback) {

                                 var script = document.createElement('script');

                                     script.setAttribute('type','text/javascript');

                                     if(script.readyState) {

                                               script.onreadystatechange = function() {

                                                      if(script.readyState == 'loaded' || script.readyState == 'complete') {

                                                                script.onreadystatechange = null;

                                                                callback(); 
                                                      } 
                                               }
                                     } else {

                                        script.onload = function() {

                                               callback(); 
                                        }
                                     }

                                     script.setAttribute('src',src);

                                     document.getElementsByTagName('head')[0].appendChild(script);  

                        };//end function loadScript

                        function seed(o) {

                              if(o.photo) {

                                      document.getElementById('results').innerHTML = '';

                                      var port = document.createElement('div');

                                          port.className = "port_item";

                                      var a = document.createElement('a');

                                          a.href = o.photo.src.replace('_s','');

                                          a.title = o.photo.title;

                                          a.rel = 'lightbox aldo';

                                      var img = document.createElement('img');

                                          img.src = o.photo.src;

                                          img.alt = o.photo.title;

                                          a.appendChild(img);

                                          port.appendChild(a); 
 
                                          x.appendChild(port);

                               } else if(o.photos) {

                                   document.getElementById('results').innerHTML = '';

                                   for(var i=0;i<o.photos.length;i++) {
                                      
                                      var port = document.createElement('div');

                                          port.className = "port_item";

                                      var a = document.createElement('a');

                                          a.href = o.photos[i].src.replace('_s','');

                                          a.title = o.photos[i].title;

                                          a.rel = 'lightbox aldo';

                                      var img = document.createElement('img');

                                          img.src = o.photos[i].src;

                                          img.alt = o.photos[i].title;

                                          a.appendChild(img);

                                          port.appendChild(a); 
                                      
                                          x.appendChild(port);

                                   }//endfor                             
 
                               } else {

                                         document.getElementById('results').innerHTML = o.error;

                               }

                        };//end function seed


          return {init: init, seed: seed};

}();//do EXEC

//initialize
flickrbadge.init();