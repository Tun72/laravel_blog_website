<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #333;
            color: #fff;
        }
        h2 {
            font-size: 40px;
            color: green;
        }

        p {
            font-size: 16px;
            letter-spacing: 1px
        }

        div {
            width: 600px;
            margin: 0 auto;
        }

        a {
            color: green !important;
        }
    </style>
</head>

<body>
    <div>
        <h2>Hello, {{ $name }} </h2>
        <p>Your subscribed blogs have updates. check out <a href="{{ asset("/blogs/" . {{$blog->slug}} )}}">here</a></p>
    </div>
</body>

</html>
