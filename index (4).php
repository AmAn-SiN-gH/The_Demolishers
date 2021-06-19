<?php
// Initialize the session
session_start();

$username2='gfg';
$username="id17053996_udaiveer";
$databasename="id17053996_login";
$password="me]1FyeM|m59rTY[";
$hostname="localhost";
$con=mysqli_connect($hostname,$username,$password,$databasename);

if(isset($_POST['submit'])){
  $name=mysqli_real_escape_string($con,$_POST['name']);
  $email=mysqli_real_escape_string($con,$_POST['email']);
  $age=mysqli_real_escape_string($con,$_POST['age']);
  $suggestions=mysqli_real_escape_string($con,$_POST['suggestions']);
  $lquery = "insert into login( text, email, age,suggestions) values ('$name','$email','$age','$suggestions') where username='$username2'";
  mysqli_query($con,$lquery);
  foreach($_POST['check_list'] as $selected){
  if($selected==='horror'){
      $queryhorror="update login set horror='1' where email='$email'";
      mysqli_query($con,$queryhorror);
  }
  if($selected==='action'){
    $queryaction="update login set action='1' where email='$email'";
    mysqli_query($con,$queryaction);
}
if($selected==='adventure'){
  $queryadventure="update login set adventure='1' where email='$email'";
  mysqli_query($con,$queryadventure);
}
if($selected==='comedy'){
  $querycomedy="update login set comedy='1' where email='$email'";
  mysqli_query($con,$querycomedy);
}
if($selected==='fantasy'){
  $queryfantasy="update login set fantasy='1' where email='$email'";
  mysqli_query($con,$queryfantasy);
}
if($selected==='sci-fi'){
  $queryscifi="update login set sci-fi='1' where email='$email'";
  mysqli_query($con,$queryscifi);
}

}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        /* body {
    color: white;
    background-color: black;
} */

.top-flex {
    background-color: black;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
}

.genre-selection {
    font-size: 20px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: center;
}

.container div {
    margin: 10px;
}

.container div label {
    cursor: pointer;
}

.container div label input[type="checkbox"] {
    display: none;
}

.container div label span {
    position: relative;
    display: flex;
    background: grey;
    background-color: #810000;
    padding: 8px 15px;
    color: #f7f7f7;
    text-shadow: 0 1px 4px #f7f7f7;
    border-radius: 30px;
    font-size: 25px;
    transition: 0.5s;
    user-select: none;
    overflow: hidden;
}

.container div label span :before {
    content: '';
    position: absolute;
    background: #810000;
}

.container div label input[type="checkbox"]:checked~span {
    background: #CE1212;
    text-shadow: #af0404;
}

.form-group {
    display: flex;
    margin: 12px;
}

.section {
    display: flex;
    margin: auto;
    width: 100%;
    overflow-x: auto;
}

.section img {
    width: 300px;
    transition: 250ms all;
}

#movie-searchable {
    margin-top: 20px;
}

img:hover {
    cursor: pointer;
    transform: scale(1.2);
    margin-left: 40px;
}

#inputValue {
    width: 760px;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    outline: none;
    color: #495057;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: .25rem;
}

.top-search {
    font-size: 20px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-weight: 300;
}

#search {
    color: white;
    background-color: blue;
    outline: none;
    min-height: 20px;
    border-radius: 30px;
    font-weight: 400;
    font-size: 16px;
    text-align: center;
    line-height: 1;
    padding: .375rem .75rem;
    margin: 0px 10px;
    cursor: pointer;
}

.content {
    border: 1px solid red;
    height: 300px;
    display: none;
}

.content-display {
    display: block;
}
a{text-decoration:none;}
  </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Web App</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&display=swap" rel="stylesheet">
</head>

<body style="background-color: #231E23";>
    <div class="body-container">
        <div class="top-flex" style="background:#91091E; border: 5px solid #EEEBDD;border-radius:40px;">
            <h1 style="color: #EEEBDD; padding:30px 50px 80px ;font-size:40px;">Among Us</h1>
            <a  style="position:absolute; top:150px; left:30%; background-color:#810000;border:2px solid #EEEBDD; border-radius:10px; padding:6px;font-size:20px; color:#EEEBDD " href="#">Contact</a>
             <a style="position:absolute; top:150px;left:50%; background-color:#810000;border:2px solid #EEEBDD ; border-radius:10px; padding:6px;font-size:20px; color:#EEEBDD; " href="aboutUs.html">About us</a> 
             <a style="position:absolute; top:150px; right:30%; background-color:#810000;border:2px solid #EEEBDD; border-radius:10px;padding:6px;font-size:20px; color:#EEEBDD;" href="#">Test</a>
            <a  style="position:absolute; padding:3px; right:3%; top:30px; color: #EEEBDD; background-color:#810000;border:2px solid #EEEBDD; border-radius:10px; " class="header-link "href="login.php?logout='1'"><b>Sign out</b> </a>
        </div>
        <br>
        <div class="genre-selection">
            <p style="color:#EEEBDD; font-family: 'Baloo Tammudu 2', cursive;">Select the genre you want :</p>
        </div>
        <div class="container">
            <div>
                <label>
                        <input type="checkbox" class="check" name="" title="Horror" genre="27">
                        <span>Horror</span>
                    </label>
            </div>

            <div>
                <label>
                        <input type="checkbox" class="check" name="" title="Action" genre="28">
                        <span>Action</span>
                    </label>
            </div>

            <div>
                <label>
                        <input type="checkbox" class="check" name="" title="Adventure" genre="12">
                        <span>Adventure</span>
                    </label>
            </div>

            <div>
                <label>
                        <input type="checkbox" class="check" name="" title="Comedy" genre="35">
                        <span>Comedy</span>
                    </label>
            </div>
            <div>
                <label>
                        <input type="checkbox" class="check" name="" title="Fantasy" genre="14">
                        <span>Fantasy</span>
                    </label>
            </div>

            <div>
                <label>
                        <input type="checkbox" class="check" name="" title="Sci-Fi" genre="878">
                        <span>SciFi</span>
                    </label>
            </div>

        </div>
        <form>
            <p style="color:#EEEBDD; font-family: 'Baloo Tammudu 2', cursive;" class="top-search">Press the Submit button to get latest movies according to your choices</p>
            <p style="color:#EEEBDD; font-family: 'Baloo Tammudu 2', cursive;" class="top-search">If you have any specific interest, type it in the search box.</p>
            <div class="form-group">
                <input type="text" id="inputValue">
                <button style="background:#810000" type="submit" id="search">Submit </button>
                <button style="background:#810000;border:2px; border-radius:30px;color:#EEEBDD;" id=button><b>Reset Values</b></button>
            </div>
        </form>

    </div>

    <div id="movie-searchable"></div>
    <div id="movie-container"></div>

    <script >
    const buttonElement = document.querySelector('#search');
const Reload = document.querySelector('#button');
const inputElement = document.querySelector('#inputValue');
const movieSearchable = document.querySelector('#movie-searchable');
const movieContainer = document.querySelector('#movie-container');
var checkboxes = document.querySelectorAll("input[type=checkbox]");
const genreList = [27, 28, 12, 35, 14, 878];
const titleList = ["Horror", "Action", "Adventure", "Comedy", "Fantasy", "Sci-Fi"]
const state = 0;

        const API_KEY = 'dd7a3b94079c2d6160d427a9157ba5f3';
const IMAGE_URL = 'https://image.tmdb.org/t/p/w500/';
const url = 'https://api.themoviedb.org/3/search/movie?api_key=dd7a3b94079c2d6160d427a9157ba5f3';

function generateUrl(path) {
    const url = `https://api.themoviedb.org/3${path}?api_key=dd7a3b94079c2d6160d427a9157ba5f3&language=en-US`;
    return url;
}

function searchMovie(value) {
    const path = '/search/movie';
    const url = generateUrl(path) + '&query=' + value;
    requestMovies(url, renderSearchMovies, handleError);
}

function requestMovies(url, onComplete, onError) {
    fetch(url)
        .then((res) => res.json())
        .then((onComplete))
        .catch(onError);
}

function getUpcomingMovies() {
    const path = '/movie/upcoming';
    const url = generateUrl(path);
    const render = renderMovies.bind({ title: ' Upcoming Movies' })
    requestMovies(url, render, handleError);
}

function getAnyUpcomingMovies(val, title) {
    const path = '/movie/upcoming';
    const url = generateUrl(path);

    fetch(url)
        .then((res) => res.json())
        .then((data) => {
            const movies = data.results;
            const movieBlock = createAnyMovieContainer(movies, title, val);
            movieContainer.appendChild(movieBlock);
            console.log('Data:', data);
        })
        .catch(handleError);
}

function createAnyMovieContainer(movies, title = '', val) { //adds section code in index file
    const movieElement = document.createElement('div');
    movieElement.setAttribute('class', 'movie');
    const movieTemplate = `
            <h2>${title}</h2>
             <section class="section">
             ${anyMovieSection(movies,val)}
            </section>
            <div class="content">
                <p id="content-close">x</p>
            </div>`;
    movieElement.innerHTML = movieTemplate;
    return movieElement;

}

function anyMovieSection(movies, value) { //returns the image path dynamically
    console.log("movies:", movies);
    return movies.map((movie) => { //looping over results
        if (movie.poster_path != null) {
            const genre = movie.genre_ids;
            for (let i = 0; i < genre.length; i++) {
                if (genre[i] == value)
                    return `<img src=${IMAGE_URL+movie.poster_path} data-movie-id=${movie.id}
                    data-movie-title=${movie.original_title}/>`;
            }
        }
    })
}
function getSelectedTitle() {
    var checked = [];

    for (var i = 0; i < checkboxes.length; i++) {
        var checkbox = checkboxes[i];
        if (checkbox.checked)
            checked.push(checkbox.title);
    }
    return checked;
}



function movieSection(movies) { //returns the image path dynamically
    return movies.map((movie) => { //looping over results
        if (movie.poster_path != null)
            return `<img src=${IMAGE_URL+movie.poster_path} data-movie-id=${movie.id}/>`;
    })
}


function createMovieContainer(movies, title = '') { //adds section code in index file
    const movieElement = document.createElement('div');
    movieElement.setAttribute('class', 'movie');
    const movieTemplate = `
            <h2>${title}</h2>
             <section class="section">
             ${movieSection(movies)}
            </section>
            <div class="content">
                <p id="content-close">x</p>
            </div>`;
    movieElement.innerHTML = movieTemplate;
    return movieElement;

}



function renderSearchMovies(data) {
    const movies = data.results;
    const movieBlock = createMovieContainer(movies, 'Your Search');
    movieSearchable.appendChild(movieBlock);
}

function renderMovies(data) {
    const movies = data.results;
    const movieBlock = createMovieContainer(movies, this.title);
    movieContainer.appendChild(movieBlock);
    console.log('Data:', data);

}


function handleError(error) {
    console.log("Error:", error);
}




buttonElement.onclick = function(event) {
    if (state == 0) {
        event.preventDefault(); //stopping from refresh
        const value = inputElement.value;
        searchMovie(value);
        inputElement.value = '';


        var title = getSelectedTitle();
        console.log(title);

        for (let i = 0; i < title.length; i++) {
            for (let j = 0; j < titleList.length; j++) {
                if (title[i] === titleList[j])
                    getAnyUpcomingMovies(genreList[j], titleList[j]);
            }
        }
    }
}
Reload.onclick = function(event) {
        window.location.reload(true);
    }
    </script>

</body>

</html>