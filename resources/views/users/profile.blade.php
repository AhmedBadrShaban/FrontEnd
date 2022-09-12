<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <title>Restaurant</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap");

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: "Roboto", sans-serif;
            height: 100vh;
        }

        .body {
            width: 350px;
            height: 500px;
            background-color: #e1e1e1;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 1px 13px -1px rgb(0 0 0 / 10%);
        }

        .header {
            display: flex;
            border-bottom: 1px solid #979797;
            padding-bottom: 15px;
        }

        .header .image {
            width: 110px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .header .image img {
            width: 100%;
        }

        .header .info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-left: 10px;
        }

        .header .info .name {
            font-size: 36px;
            letter-spacing: 2px;
            font-weight: 400;
        }

        .edit-btn {
            display: flex;
            background-color: #a72f2f;
            color: white;
            padding: 10px;
            border-radius: 50px;
            justify-content: center;
            transition: 0.3s;
            width: 110px;
            margin-top: 12px;
            text-decoration: none;

        }
        .edit-btn:visited {
            color: white;
        }
        .edit-btn i {
            margin-right: 9px;

        }

        .edit-btn:hover {
            background-color: #641e1e;
            color: white;
            cursor: pointer;
        }

        .information {
            display: grid;
            margin-top: 20px;
            gap: 20px;
        }

        .item .item-head {
            font-weight: bold;
            margin-bottom: 10px;
        }

        nav {
            position: absolute;
            top: 15px;
            left: 15px;
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav form button {
            outline: none;
            border: 1px solid #00000012;
            padding: 5px 12px;
            margin-left: 15px;
            font-size: 16px;
            border-radius: 5px;
        }

        nav ul li:first-child {
            display: flex;
            align-items: center
        }
        .ordered, h1 a{
            color: black;
        }
        .ordered:visited, h1 a:visited
        {
            color: black;
        }
    </style>
</head>
<body>
@auth
    <nav class="flex items-center mb-4">
        <a href="/index"></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            <li>
        <span class="font-bold">
          Welcome {{auth()->user()->name}}
        </span>
            </li>
            <li>
                <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    <div class="body">
        <div class="header">
            <div class="info">
                <div class="name">{{auth()->user()->name}}</div>
                <a class="edit-btn" href = "/profile/edit" >
                    <i class="fa-solid fa-pen"></i> Edit Profile
                </a>
            </div>
        </div>
        <div class="information">
            <div class="item">
                <div class="item-head">INFO</div>
            </div>
            <div class="item">
                <div class="item-head">Email</div>
                <div class="item-desc">{{auth()->user()->email}}</div>
            </div>
            <div class="item">
                <div class="item-head">Address</div>
                <div class="item-desc">{{auth()->user()->address}}</div>
            </div>
            <div class="item">
                <a class="item-head ordered" href="/OrderedMeals">Recently Ordered Meals</a>
            </div>
        </div>
    </div>
@else
    <h1>
        404 Cannot find page. Please <a href="/register">Register</a> or <a href="/login">Log In</a>
    </h1>
@endauth
</body>
</html>
