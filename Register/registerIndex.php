<html>
<body>
<head>
    <?php
include_once "head.php";
?>
</head>
<main>
        <div class="container body-content span=8 offset=2">
            <div align="center">
                <form class="ui-form" method="post">
                    <fieldset>
                        <div class="background-image">
                          <h1  class="ui header" id="h1" style= "font-family: Algerian" >Регистрация</h1>
                            <img src="images/Oxygen-Icons.org-Oxygen-Categories-applications-education-school.ico"
                                 style="width: 60px; height: 50px" name="icon">

                            <div class =" ui form" id="div">
                                <label id="iconTwo" for ='name'><i class="fa fa-envelope" aria-hidden="true"></i></label>
                                <input type="text" name="email" id="email" placeholder="E-mail" required/>

                            </div>
                                <div class =" ui form" id="div">
                                <label id="iconTwo" for ='name'><i class="fa fa-user" aria-hidden="true"></i></label>
                                    <input type="text" name="name" id="name" placeholder="Име" required/>

                         </div>
                            <div class =" ui form" id="div">
                                <label id="iconTwo" for ='name'><i class="fa fa-user" aria-hidden="true"></i></label>
                                <input type="text" name="name" id="name" placeholder="Презиме" required/>
                                </div>
                            <div class =" ui form" id="div">
                                <label id="iconTwo" for ='name'><i class="fa fa-user" aria-hidden="true"></i></label>
                                <input type="text" name="name" id="name" placeholder="Фамилия" required/>
                            </div>
                            <div class="ui form">
                                    <label id="iconTwo" for="age"><i class="fa fa-calendar-o" aria-hidden="true"></i> </label>
                                    <input class="ccformfield" name="age" id="age" type="text" placeholder="Възраст" onfocus="(this.type='date')" required/>
                            </div>
                            <div class="ui form">
                                <label id="iconTwo" for ='email'><i class="fa fa-key" aria-hidden="true"></i></label>
                                <input type="text" name="password" id="password" placeholder="Парола" required/>
                            </div>
                                <div class="two fields">
                                    <div class = "field">
                                        <label id="iconTwo" for ='gender'><i class="fa fa-venus-mars" aria-hidden="true"></i></label>
                                   <select class="ui selection dropdown" id="gender">
                                       <option value="">Мъж</option>
                                       <option value="">Жена</option>
                                   </select>
                                        </div>

                                        </div>
                            <div class = "field">
                                <label id="iconTwo" for ='role'><i class="fa fa-users" aria-hidden="true"></i></label>
                                <select class="ui selection dropdown" id="role">
                                    <option value="">Ученик</option>
                                    <option value="">Учител</option>
                                    <option value="">Директор</option>
                                </select>
                            </div>
                            <div class="ui form">

                                <label id="iconTwo" for ='school'><i class="fa fa-university" aria-hidden="true"></i></label>
                                <select class="ui selection dropdown" id="school">
                                    <option value="">ОУ"Й.ЙОВКОВ"</option>
                                    <option value="">СУ "Иван Вазов"</option>
                                    <option value="">ОУ "Х. Ботев"-Севлиево</option>
                                </select>
                            </div>

                            <div class="ui form" id="divClass">
                                <label id="iconTwo" for ='school'><i class="fa fa-graduation-cap" aria-hidden="true"></i></label>
                                    <input type="text" id="class" name="class" placeholder="Клас"/>

                                    <input type="text" id="class" name="class" placeholder="Паралелка"/>
                            </div>
                            <div class="wrapper">
                            <button class="ui  button" style="background-color: lightgreen">
                                РЕГИСТРИРАЙ МЕ
                            </button>
                                </div>
                            <a href = '#'><p id="redirectLogin"">Вече имате профил в системата? Влезте от тук.</p></a>
                            </div>

                                </form>
                            </div>
                        </fieldset>
                </form>
            </div>
</div>
</div>
</main>
</body>
</html>
<style>

    .background-image
    {
        background-image: url("images/background.png");

    }

    form {
        display: inline-block;
        background: #95b599;
        margin: 0;
        width:500px;
        text-align: center;

    }
    body
    {
        -webkit-background-size: cover;
        background-image: url(images/backgroundoverall.png);
        -moz-background-size: cover;
        background-size:100% 100vh;
        background-repeat:no-repeat;
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
    #name{
        width: 162px;
    }
    #email
    {
        width: 162px;
    }
    #password
    {
        width: 162px;
    }
    #age
    {
        width: 162px;
    }
#class
{
    width:100px;

}
    #divClass
    {
        display:table;
        text-align: center;
        padding-left: 130px;

    }

#school
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
