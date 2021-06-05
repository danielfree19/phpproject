var picad = [];

var count = 1;//for pictures
var x = setInterval(slideshow, 1000);
// everytime this function is on it checks which picture is set right now and
//goes back to the next picture(if its on the last picture its goes to the first picture)
class picsadd {
	_address;
	_num;
	constructor(num, address) {
		this._num = num;
		this._address = address;
	}
	address() {
		return this._address;
	}
}
var r = 0;

// arrow function

window.onload = function onload() {
	for (var i = 0; i < 22; i++) {
		picad.push(new picsadd(i, './assets/img/jpg/' + i + '.jpg'));
	}
}




//שורה שמתחילה את המצגת
	function slideshow() {
		r++;
		if (r == 9) {
			LoadNextPic();
			r = 0;
		}
	}

function LoadNextPic() {
	
		count++;
		if (count == 22)
			count = 1;
		pic.src =  picad[count].address();
}





// everytime this function is on it checks which picture is set right now and goes 
//back to the previous pic(if its on the first picture its goes to the last picture)
function LoadPrevPic() {
	count--;
	if (count == 0)
		count = 21;
	pic.src = picad[count].address();//img/1.jpg - img/21.jpg
}
// sets the picture on the page to the first in the webpage
function tothelast() {
	count = 19;
	pic.src = picad[count].address();
}
//sets the picture on the page to the last picture in the site
function tothefirst() {
	count = 1;
	pic.src = picad[count].address();
}
