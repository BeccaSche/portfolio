var myMovies = JSON.parse(movies)
console.log(myMovies[0].preLikes)

$(document).ready(function(){

	var movieList = $("<div></div>").addClass("movieList")
	$("main").prepend(movieList)

	for (i = 0; i < myMovies.length; i++) {

	var movieBox = $("<div></div>").addClass("movieBox")
	movieList.append(movieBox)

	var titel = $("<div class='text'><h2>" + myMovies[i].titel + "</h2><p class='desc'>" + myMovies[i].discrp + "</p></div>")
	var poster = $("<img class='poster' src='" + myMovies[i].poster + "'alt='Poster'>")
	var likes = $("<div><button class='start-button'>Start</button></div><form class='like-form'><button class='like-button'>0 Likes</button></form>")

	movieBox.append(poster).append(titel).append(likes)

	var count = 0;

// target elements
	var $startButton = $('.start-button'); // class
	var $likeForm = $('form');  // tag
	var $likeButton = $('.like-button');  // class
	
	$likeForm.hide();
	
// hide start button and show input buttons
	function onShowButtons() {
	  $startButton.hide();
	  $likeForm.show(); 
	}

	function onButtonSubmit(e) {
	    // prevents automatic refresh on submit
	    e.preventDefault();
	    count++;

	    if(count === 1) {
	        $likeButton.html('1 Like')
	    }
	    else {
	      $likeButton.html(count + ' Likes');
	    }
	}


// add event listener
	$startButton.on('click', onShowButtons);
	$likeForm.on('submit', onButtonSubmit);
	
	
	}

	})
