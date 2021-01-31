var myMovies = JSON.parse(movies)
console.log(myMovies[0].preLikes)

$(document).ready(function () {

    var movieList = $("<div></div>").addClass("movieList")
    $("main").prepend(movieList)

    for (let i = 0; i < myMovies.length; i++) {

        var movieBox = $("<div></div>").addClass("movieBox" + i);
        movieList.append(movieBox);

        var text_movie = $("<div class='text'><h2>" + myMovies[i].titel + "</h2><p class='desc'>" + myMovies[i].discrp + "</p></div>");
        var poster = $("<img class='poster' src='" + myMovies[i].poster + "'alt='Poster'>");


        movieBox.append(poster).append(text_movie);

        let likeField = $('<div class="wtLikes"><a class="like-counter' + i + '"><img class="thumb" src="img/thumb.png"></a><span class="click-text"><a id="clicks' + i + '"></a></span></div>');
        $(".movieBox" + i).append(likeField);
        let preClicks = myMovies[i].preLikes;
        $("#clicks" + i).html(preClicks);
        $('.like-counter' + i).on("click", function () {
            preClicks += 1;
            $("#clicks" + i).html(preClicks);
        });

    }


})