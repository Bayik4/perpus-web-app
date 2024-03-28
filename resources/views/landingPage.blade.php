<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Front Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Micro+5&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        body {
            height: 100vh;
            background-color: rgb(5, 5, 5);
            color: white;
            font-family: "Micro 5", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .nav-bar {
            background-color: rgb(0, 0, 0);
            box-shadow: 0px -5px 10px 0px white;
            padding: 3px 15px;
        }

        .container-fluid {
            height: 80vh;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .judul {
            margin-bottom: 0px;
        }

        .judul h1 {
            font-size: 10rem;
            text-shadow: 4px 4px 2px rgb(100, 100, 100);
        }

        .material-symbols-outlined {
            margin-left: 10px;
            font-size: 50px;
        }

        .left-content .nav .btnl {
            padding: 0px 10px 0px 10px;
            text-decoration: none;
            border: 1px solid white;
            color: white;
            font-size: 30px;
            border-radius: 5px;
        }

        .nav {
            margin-top: -40px;
        }

        .left-content .nav .btnl:hover {
            background-color: white;
            color: rgb(68, 68, 68);
        }

        .left-content .nav .btnl:active {
            background-color: white;
            color: white;
        }

        .bookimg {
            filter: drop-shadow(white 0px 0px 8px);
            width: 600px;
        }
    </style>
</head>

<body>
    <div class="nav-bar">
        <h1>PerpusKU</h1>
    </div>
    <div class="container-fluid">
        <div class="left-content">
            <div class="judul">
                <h1>WELCOME</h1>
            </div>
            <div class="nav">
                <a href="{{ url('/login') }}" class="btnl">Get Started</a><span
                    class="material-symbols-outlined ">arrow_circle_right</span>
                {{-- <a href="{{ url('/register') }}" class="btn2">Register</a> --}}
            </div>
        </div>
        <div class="right-content">
            <img src="{{ asset('storage/img/bookshelf.png') }}" class="bookimg" alt="" srcset="">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        const btn = document.querySelector('.btnl');
        const icon = document.querySelector('.material-symbols-outlined');

        btn.addEventListener('mouseover', function() {
            icon.style.marginLeft = '20px';
            icon.style.transition = '0.2s linear';
            icon.style.textShadow = '0px 0px 10px rgb(0, 226, 0)';
        })

        btn.addEventListener('mouseout', function() {
            icon.style.marginLeft = '10px';
            icon.style.transition = '0.2s linear';
            icon.style.textShadow = 'none';
        })

        btn.addEventListener('click', function() {
            icon.style.marginLeft = '40px';
            icon.style.transition = '0.2s linear';
            icon.style.opacity = '0';
        });
    </script>
</body>

</html>
