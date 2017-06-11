(function () {
	var Menu = function(id,button) {
		var self = this;
		this.tag = 'open';
		var timer = null;
		this.obj = document.getElementById(id);
		this.odiv = document.getElementById(button);
		this.odiv.addEventListener('click',function(e) {
				e.stopPropagation();
				self.switch();	
		},false);
		
		Menu.prototype.startMove = function(target) {
			clearInterval(timer);
			if(this.obj.offsetLeft <= target) {
				speed = 5;
				timer = setInterval(function() {
				if(self.obj.offsetLeft >= target) {
					clearInterval(timer);
				}
				else {
					self.obj.style.left = self.obj.offsetLeft+speed+'px';	
				}
			},30);
			}else if (this.obj.offsetLeft >= target) {
				speed = -50;
				timer = setInterval(function() {
				if(self.obj.offsetLeft <= target) {
					clearInterval(timer);
				}
				else {
					self.obj.style.left = self.obj.offsetLeft+speed-45+'px';	
				}
			},30);
			}	
		}
		// Menu.prototype.endMove = function() {
		// 	clearInterval(timer);
		// 	timer = setInterval(function() {
		// 		if(self.obj.offsetLeft <= -750) {
		// 			clearInterval(timer);
		// 		}
		// 		else {
		// 			self.obj.style.left = self.obj.offsetLeft-50+'px';	
		// 			console.log(self.obj.offsetLeft);
		// 		}
		// 	},30);
		// }
		Menu.prototype.switch = function() {
			if (this.tag === 'open') {
				console.log('open');
				this.startMove(0);
				this.tag = 'close';
			}else {
				console.log('close');
				this.startMove(-750);
				this.tag = 'open';
			}
			
		}

	};
	var opp = new Menu('px_out1','px_out11');
	//var opp1 = new Menu('px_out2','px_out12');
})();


	(function () {
	var Menu = function(id,button) {
		var self = this;
		this.tag = 'open';
		var timer = null;
		this.obj = document.getElementById(id);
		this.odiv = document.getElementById(button);
		this.odiv.addEventListener('click',function(e) {
				e.stopPropagation();
				self.switch();	
		},false);
		
		Menu.prototype.startMove = function(target) {
			clearInterval(timer);
			if(this.obj.offsetLeft >= target) {
				speed = 260;
				timer = setInterval(function() {
				if(self.obj.offsetLeft <= target) {
					clearInterval(timer);
				}
				else {
					self.obj.style.left = self.obj.offsetLeft-speed+'px';	
					console.log(self.obj.offsetLeft-speed);

				}
			},30);
			}else if (this.obj.offsetLeft <= target) {
				speed = 1;
				timer = setInterval(function() {
				if(self.obj.offsetLeft >= target) {
					clearInterval(timer);
				}
				else {
					self.obj.style.left = self.obj.offsetLeft+speed-150+'px';
					console.log(self.obj.offsetLeft+speed);	
				}
			},30);
			}	
		}
		Menu.prototype.switch = function() {
			if (this.tag === 'open') {
				console.log('open');
				this.startMove(250);
				this.tag = 'close';
			}else {
				console.log('close');
				this.startMove(970);
				this.tag = 'open';
			}
			
		}

	};
	var opp = new Menu('px_out2','px_out12');
})();








