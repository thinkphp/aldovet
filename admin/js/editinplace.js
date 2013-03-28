/*
###############################################
Author: Adrian Statescu
Project: Edit In Place with framework Prototype
###############################################
*/
//Setup the EditInPlace area were well be keeping all our data and code
var EditInPlace = Class.create();

//Default value for options, text, templates and states

EditInPlace.defaults = {

            // Options that you`ll commonly be overring.
              
            id:              false,
            save_url:        false,
            form_type:       "text",  //valid: text, textarea, select
            auto_adjust:     false,
            size:            false, //calculate at run time
            max_size:        60,
            rows:            false, //calculate ar tun time
            cols:            60, 
            max_rows:        25,
            save_on_enter:    false,
            cancel_on_esc:    false,
            focus_edit:      true,
            select_text:     false,
            click_event:     "click", //valid: click,dblclick
            more_data:       false,
            select_options:  false,


            //text we display at various points
            edit_title:       "Click to edit.",
            empty_text:        "Click to edit",
            saving_text:        "Saving...",
            savebutton_text:    "SAVE", 
            cancelbutton_text:   "CANCEL", 
            savefailed_text:     "Failed to save changes",


            //CSS classes we use
             mouseover_highlight:   "#FEFFDA",
             editfield_class:       "eip_editfield",   
             savebutton_class:      "eip_savebutton",
             cancelbutton_class:    "eip_cancelbutton",   
             saving_class:          "eip_saving", 
             empty_class:           "eip_empty",
             mouseoverButtonSave:                      "eip_mouseoverButtonSave",
             mouseoverButtonCancel:                    "eip_mouseoverButtonCancel",

       
           //Templates
             saving:                        '<span id="#{saving_id}" class="#{saving_class}" style="display:none">#{saving_text}</span>',
             text_form:                     '<input type="text" size="#{size}" value="#{value}" id="#{id}_edit" name="#{id}_edit" class="#{editfield_class}" /> <br />',
             textarea_form:	            '<textarea cols="#{cols}" rows="#{rows}" id="#{id}_edit" name="#{id}_edit" class="#{editfield_class}">#{value}</textarea> <br />',
             start_select_form:             '<select id="#{id}_edit" name="#{id}_edit" class="#{editfield_class}" /> <br />',
             select_option_form:            '<option id="#{id}_option_#{option}" name="#{id}_option_#{option}" value="#{option}" #{selected}>#{option_text}</option>',
             stop_select_form:              '</select>',
             start_form:                    '<span id="#{id}_editor" style="display: none;">',
             stop_form:                     '</span>',
             form_buttons:                  '<span><input type="button" value="#{savebutton_text}" id="#{id}_save" name="#{id}_save" class="#{savebutton_class}" /> OR <input type="button" value="#{cancelbutton_text}" id="#{id}_cancel" name="#{id}_cancel" class="#{cancelbutton_class}" /> </span>',


           //private options that are managed for you
             is_empty:              false,
             orig_text:             false,
             orig_text_length:      false,
             orig_text_encoded:     false,
             orig_bk_color:         false
             
                        
             

}; 

EditInPlace.prototype = {

         //constructor class
         initialize: function(options){

                               //start with default and override with the specific options were provided. 
                                      this.opt = {};

                                      Object.extend(this.opt,EditInPlace.defaults);

                                      Object.extend(this.opt,options || { }); 
                                   },

         //public methods

         //make an element editable
         edit: function(){
                          var opt = this.opt;
                          var id = opt['id'];                     

                         //set the title
                          $(id).title = opt['edit_title'];

                         //save and process orignal content
                         this._saveOrigText();
 
                         //watch events
                         this._watchForEvents();          
                   },
                       
         //private methods:
         _saveOrigText: function() {

                        var opt = this.opt;
                        var id = opt['id'];

                        //save the content and the length
                        opt['orig_text'] = $(id).innerHTML;
                        opt['orig_text_length'] = opt['orig_text'].length;

                       //find the original background color
                       opt['orig_bk_color'] = $(id).getStyle('background-color');

                       var bk_id = id;

                               while(!opt['orig_bk_color'])
                                    {
                                        try{ bk_id = $(bk_id).up(); } catch(err) {break;}
                                    }
                           //if no color was found default to all white
                                  if(!opt['orig_bk_color']) opt['orig_bk_color'] = '#ffffff'; 
                           
                          //hack for safari
                                  if(Prototype.Browser.WebKit) opt['orig_bk_color'] = '#ffffff';

                          //For select edits find the original option value

                                  if(opt['form_type'] == 'select')
                                          {
                                           for(var i in opt['select_options'])
                                                   {
                                                      if(opt['select_options'][i] == opt['orig_text']) 
                                                                    {
                                                                        opt['orig_option'] = i;
                                                                        break; 
                                                                    }
                                                   }
                                          }
                           //if auto_adjust is turned on determine the edit method to use
                                if(opt['auto_adjust'])
                                                 {
                                                    if(opt['orig_text_length'] > opt['max_size']) opt['form_type'] = 'textarea';

                                                                                              else     

                                                                                                  opt['form_type'] = 'text';
                                                 }
                           
                           if(opt['is_empty'])
                                             {
                                               if(!$(id).empty()) 
                                                                 {

                                                                  opt['is_empty'] = false;
                                                                  $(id).removeClassName(opt['empty_class']);   
                                                                 }
                                             }

                            //if an element is currently empty update the empty class and state
                                        
                                           if($(id).empty())
                                                     {
                                                      opt['is_empty'] = true; 
                                                      $(id).innerHTML = opt['empty_text'];
                                                      $(id).addClassName(opt['empty_class']);
                                                     }


                            //encode < >     
                             opt['orig_text_encoded'] = opt['orig_text'].replace(/</g,'&lt;');  
                             opt['orig_text_encoded'] = opt['orig_text'].replace(/>/g,'&gt;');  
                             opt['orig_text_encoded'] = opt['orig_text'].replace(/"/g,'&quot;');  
                                                                                            
 

                       },//end _saveOrigText           



                   //turn on for event listening   
                  _watchForEvents: function()
                      {
                         var opt = this.opt;
                         var id = opt['id'];

                        //bind event listeners

                         opt['mouseover'] = this._mouseOver.bindAsEventListener(this,id);
                         opt['mouseout'] =  this._mouseOut.bindAsEventListener(this,id);
                         opt['mouseclick'] =  this._mouseClick.bindAsEventListener(this,id);	
                         opt['saveedit'] =  this._saveEdit.bindAsEventListener(this,id);
                         opt['canceledit'] =  this._cancelEdit.bindAsEventListener(this,id);

                         opt['overSaveEdit'] =  this._overSaveEdit.bindAsEventListener(this,id);
                         opt['outSaveEdit'] =  this._outSaveEdit.bindAsEventListener(this,id);
                         opt['overCancelEdit'] =  this._overCancelEdit.bindAsEventListener(this,id);
                         opt['outCancelEdit'] =  this._outCancelEdit.bindAsEventListener(this,id);

                       
                        //watch for events
                         $(id).observe('mouseover',opt['mouseover']);
                         $(id).observe('mouseout',opt['mouseout']);
                         $(id).observe(opt['click_event'],opt['mouseclick']);
                                                   
                        //external control events 
                        //......................

                      },//end _watchForEvents

                     //mouseOver button saveEdit
                      _overSaveEdit: function(e)
                           {
                             var opt = this.opt;
                             var id = opt['id'];

                             Element.addClassName($(id + '_save'),opt['mouseoverButtonSave']);
                           },

                    //mouseOut button saveEdit  
                       _outSaveEdit: function(e) 
                          {
                             var opt = this.opt;
                             var id = opt['id'];

                             Element.removeClassName($(id + '_save'),opt['mouseoverButtonSave']);

                             
                          },

                       //mouseOver button cancelEdit
                      _overCancelEdit: function(e)
                           {
                             var opt = this.opt;
                             var id = opt['id'];

                             Element.addClassName($(id + '_cancel'),opt['mouseoverButtonCancel']);


                           },

                      //mouseOut button cancelEdit  
                        _outCancelEdit: function(e) 
                           {
                             var opt = this.opt;
                             var id = opt['id'];

                             Element.removeClassName($(id + '_cancel'),opt['mouseoverButtonCancel']);


                           },


                  //mouseover handler
                      _mouseOver: function(e)
                      {
                       var opt = this.opt;
                       var id = opt['id'];

                       $(id).setStyle({backgroundColor: opt['mouseover_highlight']}); 
              
                      },
                  //mouseout handler
                      _mouseOut: function(e)
                      {
                       var opt = this.opt;
                       var id = opt['id'];
                       $(id).setStyle({backgroundColor: opt['orig_bk_color']}); 
                      },

                 //mouseclick handler
                     _mouseClick: function(e)
                     {
                       var opt = this.opt;
                       var id = opt['id'];


                      //hide the original text
                      $(id).hide();


                      //compile the start of the edit form
                        var form ='';
                        var start_form = new Template(opt['start_form']);
                        var stop_form = new Template(opt['stop_form']);
                        var form_buttons = new Template(opt['form_buttons']);
                        form += start_form.evaluate({id: id});

                         switch(opt['form_type'])
                             {
                               case 'text':
                                    var size = opt['orig_text_length'] + 15;

                                    if(size > opt['max_size']) size = opt['max_size'];

                                    size = (opt['size']) ? opt['size'] : size;

                                    var text_form = new Template(opt['text_form']);

                                    form +=text_form.evaluate({
                                                              id: id, 
                                                              size: size, 
                                                              value: opt['orig_text_encoded'],
                                                              editfield_class: opt['editfield_class']   
                                                             });
                                    break;


                               case 'textarea':
                                     var rows = (opt['orig_text_length'] / opt['cols']) + 2;

                                      for(var i=0; i< opt['orig_text_length'];i++) 
                                                   
                                                     if(opt['orig_text'].charAt(i) == "\n")  rows++;

                                            if(rows > opt['max_rows']) rows = opt['max_rows'];

                                            rows = (opt['rows']) ? opt['rows'] : rows;

                                      var textarea_form = new Template(opt['textarea_form']);
                                          form +=textarea_form.evaluate({
                                                                        id: id,
                                                                        rows: rows,
                                                                        cols: opt['cols'],
                                                                        value: opt['orig_text_encoded'],
                                                                        editfield_class: opt['editfield_class'] 
                                                                       });

                                     break;

                                case 'select':

                                        var start_select_form = new Template(opt['start_select_form']);
                                            
                                             form +=start_select_form.evaluate({
                                                                               id: id,
                                                                               editfield_class: opt['editfield_class'] 
                                                                             });

                                         var option_form = new Template(opt['select_option_form']);

                                         var selected = '';
                                                 for(var i in opt['select_options']) {
                                               
                                                          if(opt['select_options'][i] == opt['orig_text'])  selected = 'selected = "selected"'; 
                                                                                                       else
                                                                                                             selected = '';
                                                          form +=option_form.evaluate({
                                                                                      id: id,
                                                                                      option: i,
                                                                                      selected: selected,
                                                                                      option_text: opt['select_options'][i] 
                                                                                     }); 
                                                  }//end for          

                                        var stop_select_form = new Template(opt['stop_select_form']);

                                        form += stop_select_form.evaluate({}); 
                                 
                                break;        

 
                             }//end switch

                             form += form_buttons.evaluate({

                                                          id: id,
                                                          savebutton_class: opt['savebutton_class'],   
                                                          savebutton_text: opt['savebutton_text'],
                                                          cancelbutton_class: opt['cancelbutton_class'],   
                                                          cancelbutton_text: opt['cancelbutton_text']
                                                         });

                             form += stop_form.evaluate({});

                             this._displayForm(form); 
                        
                     },


                _cancelEdit: function()
                    {
                      var opt = this.opt;
                      var id = opt['id'];

                      $(id +'_editor').remove();
 
                      $(id).show();
                      $(id).setStyle({backgroundColor:opt['orig_bk_color']}); 
                      
                    }, 

                _saveEdit: function()
                   {
                    var opt = this.opt;
                    var id = opt['id'];   

                    //gather all of the date and pass in the XHR
                      var params = {
                                   'id': id,
                                    'form_type': opt['form_type'],
                                    'old_content': opt['orig_text'],
                                    'new_content': $F(id + '_edit')  
                                   }; 

                    //if control is equal select then prepare params
                      if(opt['form_type'] == 'select') {

			                                 params['new_option'] = params['new_content'];
                                   			 params['new_option_text'] = $(id + '_option_' + params['new_content']).innerHTML;

			                                 params['old_option'] = opt['orig_option'];
			                                 params['old_option_text'] = opt['orig_text'];

                                                         // Over ride the *_content to use the *_option_text instead
                                                         params['old_content'] = params['old_option_text'];
                                                         params['new_content'] = params['new_option_text'];

                                        		}
 


                    //get post data 
                     var post_data = '';
                         for(var i in params) post_data +='&'+ i + '='+encodeURIComponent(params[i]);

                     //strip the first &
                        post_data.sub('&','',1);

                    //put the message saving...

                        var saving = new Template(opt['saving']);

                            saving = saving.evaluate({
                                                     saving_id: id + '_saving',
                                                     saving_class: opt['saving_class'],
                                                     saving_text: opt['saving_text']  
                                                     });
                            //remove the editor...
                              $(id + '_editor').remove();
   
                           //show the saving message... 
                             $(id).insert({after: saving});
                             $(id + '_saving').show();  

                          //copy of this object
                            var my_obj = this;

                          //make a request and save

                            var xhr = new Ajax.Request(opt['save_url'],
                                                 {
                                                   method: 'post',
                                                   postBody: post_data,
                                                   onSuccess: function(t){ 

                                                             //set the content of the editable element = new content
                                                             $(id).innerHTML = t.responseText;

                                                             //process the new content
                                                               my_obj._saveOrigText();
                                                            
                                                             //remove the messege saving..
                                                               $(id + '_saving').remove(); 
           
                                                             $(id).show();
                                                             $(id).setStyle({backgroundColor: opt['orig_bk_color']});
                           
                                                              },
                                                   onFailure: function(t)
                                                                {
                                                                //remove the saving message
                                                                $(id +'_saving').remove();

                                                                //restore the original text of the editable element
                                                                $(id).innerHTML = opt['orig_text'];
                                                                $(id).show();  
                                                                $(id).setStyle({backgroundColor: opt['orig_bk_color']});
                                                                 
                                                                //notify the user that the save failed
                                                                alert("Error save failed!");
                                                         }
                                                 }
                                                 ); 
                     


                   },
  


                _displayForm: function(form)
                     {
                       var opt = this.opt;
                       var id = opt['id'];

                       $(id).insert({after: form});
                       $(id +'_editor').show();

                       if(opt['focus_edit']) $(id + '_edit').focus();


                       if(opt['select_text']) $(id + '_edit').select();


                      //watch for save and cancel button click
                       $(id +'_save').observe('click',opt['saveedit']);
                       $(id +'_cancel').observe('click',opt['canceledit']);

                       $(id +'_save').observe('mouseover',opt['overSaveEdit']);
                       $(id +'_save').observe('mouseout',opt['outSaveEdit']);
                       $(id +'_cancel').observe('mouseover',opt['overCancelEdit']);
                       $(id +'_cancel').observe('mouseout',opt['outCancelEdit']);

                      var myObj = this;  
                     
                      if(opt['cancel_on_esc']) 
                              { 
                              $(id +'_edit').observe('keypress',function(e){

                                                                          if(e.keyCode == Event.KEY_ESC) 
                                                                                    myObj._cancelEdit();
                                                                           }); 
                              }


                     } 

                  

                  
       

};


//attach EditInPlace to $()

    Element.addMethods({
                       editInPlace: function(element,options){
                               if(!options) { var options = {}; }

                               options['id'] = $(element).id;

                               Object.extend(options,arguments[1]);  

                               //create  a new object
                               var eip = new EditInPlace(options);
                                   eip.edit();   
                                                             }
                      });

