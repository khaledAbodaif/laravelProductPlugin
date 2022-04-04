<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color: #8080800f;">
<div class="main-container">

@yield('content')

{{--side menu--}}
<style>
    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica,
        Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    }

    .main-container {
        padding: 30px;
    }

    /* HEADING */

    .heading {
        text-align: center;
    }

    .heading__title {
        font-weight: 600;
    }

    .heading__credits {
        margin: 10px 0px;
        color: #888888;
        font-size: 25px;
        transition: all 0.5s;
    }

    .heading__link {
        text-decoration: none;
    }

    .heading__credits .heading__link {
        color: inherit;
    }

    /* CARDS */

    .cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .card {
        margin: 20px;
        padding: 20px;
        width: 500px;
        min-height: 200px;
        display: grid;
        grid-template-rows: 20px 50px 1fr 50px;
        border-radius: 10px;
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
        transition: all 0.2s;
    }

    .card:hover {
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
        transform: scale(1.01);
    }

    .card__link,
    .card__exit,
    .card__icon {
        position: relative;
        text-decoration: none;
        color: #252525;
    }

    .card__link::after {
        position: absolute;
        top: 25px;
        left: 0;
        content: "";
        width: 0%;
        height: 3px;
        background-color: rgba(255, 255, 255, 0.6);
        transition: all 0.5s;
    }

    .card__link:hover::after {
        width: 100%;
    }

    .card__exit {
        grid-row: 1/2;
        justify-self: end;
    }

    .card__icon {
        grid-row: 2/3;
        font-size: 30px;
    }

    .card__title {
        grid-row: 3/4;
        font-weight: 400;
        color: #ffffff;
    }

    .card__apply {
        grid-row: 4/5;
        align-self: center;
    }

    /* CARD BACKGROUNDS */

    .card-1 {
        background: radial-gradient(#1fe4f5, #3fbafe);
    }



    /* RESPONSIVE */

    @media (max-width: 1600px) {
        .cards {
            justify-content: center;
        }
    }
</style>

    <div class="cards">
        <div class="card card-1">

            <p class="card__apply">
                <a class="card__link" href="#">Apply Now <i class="fas fa-arrow-right"></i></a>
            </p>
            <p class="card__apply">
                <a class="card__link" href="#">Apply Now <i class="fas fa-arrow-right"></i></a>
            </p>
            <p class="card__apply">
                <a class="card__link" href="#">Apply Now <i class="fas fa-arrow-right"></i></a>
            </p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
