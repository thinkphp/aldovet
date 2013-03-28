var Shake = new Class({
	Implements:Options,
		options:{
			distance: 10,
			duration: 50,
			transition: Fx.Transitions.Sine.easeInOut,
			loops: 8
		},
		
	initialize:function(element,options){
		this.setOptions(options);
		this.element=$(element);
		if(this.element.getStyle('position')!='absolute') this.element.setStyle('position','relative');
		this.tween = new Fx.Tween(this.element,{ 
			link: 'chain', 
			duration: this.options.duration,
			transition: this.options.transition
		});
	},
	
	shake:function(){
		var d = this.options.distance;

		for(x=0;x<this.options.loops;x++) {this.tween.start('left',d).start('left',-d);}

		this.tween.start('left',d).start('left',0);
	}
	
});