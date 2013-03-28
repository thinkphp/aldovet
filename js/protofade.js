    var Protofade = Class.create({

                  initialize: function(element, options) {

                              this.options = {

                                   duration: 1,

                                   delay: 4.0,

                                   random: false,
 
                                   slideshow: true,

                                   controls: false 
                              };

                              Object.extend(this.options, options || {});

                              this.element = $(element);

                              this.slides = this.element.childElements();

                              this.num_slides = this.slides.length;

                              this.current_slide = (this.options.random) ? (Math.floor(Math.random()*this.num_slides)) : 0;

                              this.end_slide = this.num_slides - 1;

                              this.slides.invoke('hide');

                              this.slides[this.current_slide].show();

                              if(this.options.slideshow) {

                                      this.startSlideshow();
                              }    

                  },


                  startSlideshow: function(e) {

                             if(e) {

                                  Event.stop(e);
                             }

                             if(!this.running) {

                                  this.executer = new PeriodicalExecuter(function(){this.updateSlide(this.current_slide+1)}.bind(this),this.options.delay);

                                  this.running = true;
                             }

                  },

                  updateSlide: function(next_slide) {

                             if(next_slide > this.end_slide) {

                                      next_slide = 0;

                             } else if(next_slide == -1) {

                                      next_slide = this.end_slide;
                             }

                             this.fadeInOut(next_slide, this.current_slide);		
                  },

                  fadeInOut: function(next,current) {

                             new Effect.Parallel([new Effect.Fade(this.slides[current], { sync: true }),new Effect.Appear(this.slides[next], { sync: true }) ], { duration: this.options.duration });

                             this.current_slide = next;
                  } 
    }); 

    function StartUp() {
	
           new Protofade('nav',{random: true});
	
    }

    document.observe('dom:loaded', StartUp);

         
