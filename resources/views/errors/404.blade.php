<!DOCTYPE html>
<html>
<head>
    <title>Oops! 404 Error</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <style>
        html, body {
            height: 100%;
        }
        *,:after,:before {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            font-weight: 500;
            font-family: 'Lato';
        }

        .container {
            height: 100%;
            text-align: center;
            margin: 0 auto;
            position: relative;
        }

        .content {
            padding-top: 10em;
        }

        .title {
            font-size: 32px;
            margin: 1em 0;
        }
        .content a {
            font-size: 18px;
            color: #5FCF80;
            text-decoration: none;
        }
        a span {
            color: #C792E3;
        }
        .footer {

        }
        .footer img {
            position: absolute;
            bottom: 0;
            left: 12.9999%;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Oops! The requested URL was not found on this system</div>
        <a href="{{ url('/') }}"><span>return</span> {{ url('/') }}</a>
    </div>
    <div class="footer">
        <img src="/images/404.png" alt="404 notfound">
    </div>
</div>
</body>
</html>
