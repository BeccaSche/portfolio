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
	var likes = $("<p><a href='#' class='like-counter'>Like this? </a><span class='click-text'><a class='clicks'+i></span></p>")
	var preClicks = myMovies[i].preLikes

	$(".clicks").html(preClicks);
		$('.like-counter').click(function() {
			preClicks += 1;
			$(".clicks").html(preClicks);
			$('.like-counter').addClass("liked");
		});
	
	movieBox.append(poster).append(titel).append(description).append(preClicks).append(likes)
	}

	})


    
