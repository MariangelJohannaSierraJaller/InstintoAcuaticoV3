<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Instinto Acuático</title>
        <style type="text/css">
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family:'poppins',sans-serif;
        }

        .liquid{
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #000;
        }

        .liquid h2{
            position: absolute;
            font-size:26vw;
        }

        .liquid h2:nth-child(1){
            color: #fff;
            text-shadow: -2px 2px 0px #183954, -4px 4px 0px #183954, -6px 6px 0px #183954, -8px 8px 0px #183954,-18px 18px 20px rgba(0,0,0,0.5), -18px 18px 50px rgba(0,0,0,0.5);
        }

        .liquid h2:nth-child(2){
            color: #2196f3;
            opacity: 0.5;
            animation: animate 3s ease-in-out infinite;
            -webkit-animation: animate 3s ease-in-out infinite;
        }

        .liquid h2:nth-child(3){
            color: #2196f3;
            opacity: 0.5;
            animation: animate 6s ease-in-out infinite;
            -webkit-animation: animate 6s ease-in-out infinite;
        }

        .liquid h2:nth-child(4){
            color: #2196f3;
            animation: animate 4s ease-in-out infinite;
            -webkit-animation: animate 4s ease-in-out infinite;
        }

        @keyframes animate {
            0%{
                clip-path: polygon(0% 46%, 16% 45%, 34% 52%, 50% 61%, 68% 65%, 85% 61%, 100% 53%, 100% 100%, 0% 100%);
            }

            50%{
                clip-path: polygon(0% 66%, 14% 73%, 34% 76%, 50% 71%, 64% 62%, 79% 55%, 100% 51%, 100% 100%, 0% 100%);
            }

            100%{
                clip-path: polygon(0% 46%, 16% 45%, 34% 52%, 50% 61%, 68% 65%, 85% 61%, 100% 53%, 100% 100%, 0% 100%);
            }
        }
        .button a{
            position: absolute;
            transform:translate(-100px,150px) ;
            -webkit-transform:translate(-100px,150px) ;
            -moz-transform:translate(-100px,150px) ;
            -ms-transform:translate(-100px,150px) ;
            -o-transform:translate(-100px,150px) ;
            display: inline-block;
            padding:15px 30px;
            border:2px solid #2196f3;
            margin:40px;
            text-transform: uppercase;
            font-weight: 600;
            text-decoration: none;
            letter-spacing:2px;
            color: #fff;
            -webkit-box-reflect: below 0px linear-gradient(transparent,#0002);
            transition: 0.5s;
            -webkit-transition: 0.5s;
            -moz-transition: 0.5s;
            -ms-transition: 0.5s;
            -o-transition: 0.5s;
            transition-delay: 0s;
        }

        .button a:hover{
            transition-delay: 1.5s;
            color: #000;
            box-shadow:0 0 10px #2196f3, 
                    0 0 20px #2196f3,
                    0 0 40px #2196f3,
                    0 0 80px #2196f3,
                    0 0 160px #2196f3;
        }

        .button a span{
            position: relative;
            z-index:100;
        }

        .button a::before{
            content: "";
            position:absolute;
            left: -20px;
            top:50%;
            transform:translateY(-50%) ;
            -webkit-transform:translateY(-50%) ;
            -moz-transform:translateY(-50%) ;
            -ms-transform:translateY(-50%) ;
            -o-transform:translateY(-50%) ;
            width: 20px;
            height: 2px;
            background: #2196f3;
            box-shadow: 5px -8px 0 #2196f3, 5px 8px 0 #2196f3;
            transition: width 0.5s, left 0.5s, height 0.5s, box-shadow 0.5s;
            -webkit-transition: width 0.5s, left 0.5s, height 0.5s, box-shadow 0.5s;
            -moz-transition: width 0.5s, left 0.5s, height 0.5s, box-shadow 0.5s;
            -ms-transition: width 0.5s, left 0.5s, height 0.5s, box-shadow 0.5s;
            -o-transition: width 0.5s, left 0.5s, height 0.5s, box-shadow 0.5s;
            transition-delay: 1s,0.5s,0s,0s;
        }

        .button a:hover:before{
            width:60%;
            height:100%;
            left:-2px;
            box-shadow: 5px 0px 0 #2196f3, 5px 0px 0 #2196f3;
            transition-delay: 0s,0.5s,0.5s,1s;
        }

        .button a::after{
            content: "";
            position:absolute;
            right: -20px;
            top:50%;
            transform:translateY(-50%) ;
            -webkit-transform:translateY(-50%) ;
            -moz-transform:translateY(-50%) ;
            -ms-transform:translateY(-50%) ;
            -o-transform:translateY(-50%) ;
            width: 20px;
            height: 2px;
            background: #2196f3;
            box-shadow: -5px -8px 0 #2196f3, -5px 8px 0 #2196f3;
            transition: width 0.5s, left 0.5s, height 0.5s, box-shadow 0.5s;
            -webkit-transition: width 0.5s, left 0.5s, height 0.5s, box-shadow 0.5s;
            -moz-transition: width 0.5s, left 0.5s, height 0.5s, box-shadow 0.5s;
            -ms-transition: width 0.5s, left 0.5s, height 0.5s, box-shadow 0.5s;
            -o-transition: width 0.5s, left 0.5s, height 0.5s, box-shadow 0.5s;
            transition-delay: 1s,0.5s,0s,0s;
        }

        .button a:hover:after{
            width:60%;
            height:100%;
            right:-2px;
            box-shadow: -5px 0px 0 #2196f3, -5px 0px 0 #2196f3;
            transition-delay: 0s,0.5s,0.5s,1s;
        }
        </style>
    </head>
    <body>
        <div class="liquid">
            <h2><?php echo($_GET['error']) ?></h2>
            <h2><?php echo($_GET['error']) ?></h2>
            <h2><?php echo($_GET['error']) ?></h2>
            <h2><?php echo($_GET['error']) ?></h2>
            <div class="button">
                <a href="index.php"><span>Home</span></a>
            </div>
        </div>
    </body>  
</html> 