<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <style>
        *{
            box-sizing: border-box; padding: 0; margin: 0;
        }
        body{
            background-color: #080710;
            height: 100vh;
            width: 100%;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-content: center;

        }
        header{
            width: 100%;
            background-color: #FF4200;
            height: 10vh;
            display: flex;
            align-items: center;
        }
        i{
            color: #080710;
            transform: scale(3);
            margin-left: 5%;
        }
        h1{
            margin-left: 35%;
            text-transform: uppercase;
        }
        .container{
            background-color: white;
            width: 80%;
            margin-left: 10%;
            height: 80vh;
        }
        .head{
            display: flex;
            background-color: #c4c4c4;
            padding: 2rem;
        }
        .head button{
            margin-left: 25% ;
            padding: 0.5rem 0.5rem ;
            background-color: #FF4200;
            border: none;
            width: 8%;
            font-size: 1rem;
        }
        .head button:hover{
            background-color: #080710;
            color: white;
        }
        .body{
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 100%;
        }
        .left, .right{
            margin-top: 3%; 
            width: 55%;
            background-color: #c4c4c4;
            height: 60vh;
        }
        .left{
            width: 35%;
            height: 50vh;
        }
        .left_head{
            background-color: #FF4200;
            width: 100%;
            height: 30%;
            display: flex;
        }
        .left_body{
            width: 100%;
            display: flex;
            flex-direction: column;
            height: 70%;
        }
        .setting{
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 25%;
        }
        .setting i{
           transform: scale(1.4);
        }
        .setting small{
           font-size: 1.3rem;
        }
    </style>
</head>
<body>
    <header>
        <i class="fi fi-br-game"></i>
        <h1>Pleasure of playing !</h1>
    </header>
    <section class="container">
        <section class="head">
            <h1>Creation and settings of the quizzes</h1>
            <button>Log Out</button>
        </section>
        <section class="body">
            <section class="left">
                <div class="left_head">
                    <img src="" alt="PHOTO">
                    <p>LOGIN: </p>
                </div>
                <div class="left_body">
                    <div class="setting">
                        <small>List of the questions</small>
                        <i class="fi fi-rs-edit"></i>
                    </div>
                    <div class="setting">
                        <small>Create an admin</small>
                        <i class="fi fi-br-plus"></i>
                    </div>
                    <div class="setting">
                        <small>List of the players</small>
                        <i class="fi fi-rs-edit"></i>
                    </div>
                    <div class="setting">
                        <small>Create a question</small>
                        <i class="fi fi-br-plus"></i>
                    </div>
                </div>
            </section>
            <section class="right">

            </section>
        </section>
    </section>

