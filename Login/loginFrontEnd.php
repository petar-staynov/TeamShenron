
<html>
<body>
<head>
<?php
include_once('head.php');
?>
</head>

<main>
    <div class="container body-content span=8 offset=2">
        <div align="center">
            <form class="ui-form" method="post">
                <fieldset>
                    <div class="background-image">
                        <h1  class="ui header" id="h1" style= " font-family: Algerian" >Логин</h1>
                        <div class =" ui form" id="div">
                            <label id="iconTwo" for ='name'><i class="fa fa-envelope" aria-hidden="true"></i></label>
                            <input type="text" name="email" id="email" placeholder="E-mail" required/>

                    </div>
                        <div class="ui form">
                            <label id="iconTwo" for ='email'><i class="fa fa-key" aria-hidden="true"></i></label>
                            <input type="text" name="password" id="password" placeholder="Парола" required/>
                        </div>
                        <div class="wrapper">
                            <button class="ui  button" style="background-color: lightgreen">
                                ВЛЕЗ В СИСТЕМАТА
                            </button>
                        </div>
                        <a href = '#'><p id="redirectLogin"">Все още нямате профил в системата? Създайте си от тук.</p></a>
                    </div>

                </fieldset>
</body>
            </form>
            </div>
        </div>
</main>
</div>
</html>
<style>
    body
    {
        -webkit-background-size: cover;
        background-image: url(images/backgroundoverall.png);
        -moz-background-size: cover;
        background-size:100% 100vh;
        background-repeat:no-repeat;
        text-align: center;
    }
    .background-image
    {
        background-image: url("images/background.png");
    }
    form {
        padding: 200px; width: 800px; display: block; margin: 0 auto
    }
    div
    {

        margin-bottom: 20px;
        margin-top:10px;
    }
    #iconTwo
    {

        color: white;
    }
    #email
    {
        width:162px;
    }
    #password
    {
        width: 162px;
    }
    a:link
    {
        text-align: right;
        color: white;
    }
    a:hover
    {
        color: lightgreen;
    }
    #h1
    {
        color: mintcream;
    }
</style>