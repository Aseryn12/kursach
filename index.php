<?php
    include("DBconn/connection.php");
    include("kurs&lengSelect.php");
    session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="assests/style/style.css">
        <title> Восток - школа иностранных языков в Магнитогорске </title>
    </head>
    <body>
    <div id="appi">
        <?php if(isset($_SESSION['error'])): ?>
        {{ShowError()}}
        <?php 
            session_unset($_SESSION['error']);
            endif; 
        ?>
        <header>
            <div class="logo">
                <h1 class="logoH1"> <span class="west">WEST</span>-<span class="east">EAST</span> </h1>
            </div>
            <nav>
                <a href="#onas"> О нас </a>
                <a href="#leng"> Языки </a>
                <a href="#kurs"> Курсы </a>
                <a href="#teach"> Учителя </a>
            </nav>
            <div class="matt">
            <form v-if="inBtn" action="DBconn/uconn.php" class="form" method="POST">
                <label>Логин: <input type="text" name="logg" class="inp"></label>
                <label>Пароль: <input type="password" name="pass" class="inp"></label>
                <input type="submit" class="inButton" value="Войти">
            </form>
            <button class="bu" v-if="!inBtn" @click="inBtn=!inBtn"><a href="#" class="button">Вход</a></button>
            </div>
        </header>
        <main>
            <a class="yakor" name="onas"></a>
            <section class="about">
                <h2> О нас </h2>
                <p class="aboutText" style="text-align: justify ">Школа иностранных языков "WEST-EAST" осуществляет свою деятельность уже на протяжении 10 лет.
                Наша программа обучения построенна на рекомендациях и нормах, принятых в менистерствах образования соответствующих стран. С нами работают
                педогоги с большим опытом, прошедшие практику за границей. Мы готовы предоставить вам обучение по нескольким языкам.</p>
            </section>
            <a class="yakor" name="leng"></a>
            <section class="lengSection">
                <h2> Языки </h2>
                <div  class="showLeng">
                    <div v-show="it && !eng && !gr && !fr && !iv && !ch" class="name">
                        <?php echo "<h3 class='lengName'>" . $rowsL[0][0] . "<h3>" ?>
                    </div>
                    <div v-show="it && !eng && !gr && !fr && !iv && !ch" class="imgShow">
                        <?php 
                            echo "<h3 class='lengDisc'>" . $rowsL[0][1] . "<h3>";
                        ?>
                    </div>
                    <div v-show="eng && !it && !gr && !fr && !iv && !ch" class="name">
                        <?php echo "<h3 class='lengName'>" . $rowsL[1][0] . "<h3>" ?>
                    </div>
                    <div v-show="eng && !it && !gr && !fr && !iv && !ch" class="imgShow">
                        <?php 
                            echo "<h3 class='lengDisc'>" . $rowsL[1][1] . "<h3>";
                        ?>
                    </div>
                    <div v-show="gr && !eng && !it && !fr && !iv && !ch" class="name">
                        <?php echo "<h3 class='lengName'>" . $rowsL[2][0] . "<h3>" ?>
                    </div>
                    <div v-show="gr && !eng && !it && !fr && !iv && !ch" class="imgShow">
                        <?php 
                            echo "<h3 class='lengDisc'>" . $rowsL[2][1] . "<h3>";
                        ?>
                    </div>
                    <div v-show="fr && !eng && !gr && !it && !iv && !ch" class="name">
                        <?php echo "<h3 class='lengName'>" . $rowsL[3][0] . "<h3>" ?>
                    </div>
                    <div v-show="fr && !eng && !gr && !it && !iv && !ch" class="imgShow">
                        <?php 
                            echo "<h3 class='lengDisc'>" . $rowsL[3][1] . "<h3>";
                        ?>
                    </div>
                    <div v-show="iv && !eng && !gr && !fr && !it && !ch" class="name">
                        <?php echo "<h3 class='lengName'>" . $rowsL[4][0] . "<h3>" ?>
                    </div>
                    <div v-show="iv && !eng && !gr && !fr && !it && !ch" class="imgShow">
                        <?php 
                            echo "<h3 class='lengDisc'>" . $rowsL[4][1] . "<h3>";
                        ?>
                    </div>
                    <div v-show="ch && !eng && !gr && !fr && !iv && !it" class="name">
                        <?php echo "<h3 class='lengName'>" . $rowsL[5][0] . "<h3>" ?>
                    </div>
                    <div v-show="ch && !eng && !gr && !fr && !iv && !it" class="imgShow">
                        <?php 
                            echo "<h3 class='lengDisc'>" . $rowsL[5][1] . "<h3>";
                        ?>
                    </div>
                </div>
                <div  class="lengus">
                    <div v-on:click="ClickRowsID(4)" class="circ eng">
                    </div>
                    <div v-on:click="ClickRowsID(0)" class="circ itl">
                    </div>
                    <div v-on:click="ClickRowsID(2)" class="circ gr">
                    </div>
                    <div v-on:click="ClickRowsID(1)" class="circ fr">
                    </div>
                    <div v-on:click="ClickRowsID(5)" class="circ iv">
                    </div>
                    <div v-on:click="ClickRowsID(3)" class="circ ch">
                    </div>
                </div>
            </section>
            <a class="yakor" name="kurs"></a>
            <section class="kursi">
                <h2> Курсы </h2>
                <div class="kurses">
                <?php
                    for($i = 0; $i < $countK; $i++){ 
                        echo "<div class='kurs' class='k$i'>";
                        for($j = 1; $j < $countKM; $j++){
                            echo "<p class='inKurs'>" . htmlspecialchars($rowsK[$i][$j], ENT_QUOTES, 'UTF-8') . "</p>";
                        }
                        $idKurs = $rowsK[$i][0];
                        echo "<button><a href='register/register.php?id=$idKurs' class='button'>Записаться на курс</a></button>";
                        echo "</div>";
                    }
                ?>
                </div>
            </section>
            <a class="yakor" name="teach"></a>
            <section class="tae">
                <div class="flexForArr">
                    <div class="glush">
                    <div v-if="!massVid1 == 0" v-on:click="functionLeft" class="circus left">
                    </div>
                    </div>
                    <div class="assda">
                    <h2> Наши учителя </h2>
                    <div class="teachers">
                        <?php
                            for($i = 0; $i < $countTE; $i++){ 
                                echo "<div class='teach' class='$i' v-if='functionShow($i)'>";
                                for($j = 0; $j < $countTEM; $j++){
                                    if($j == 0){
                                        $fullName = htmlspecialchars($rowsT[$i][0], ENT_QUOTES, 'UTF-8') . " " . htmlspecialchars($rowsT[$i][1], ENT_QUOTES, 'UTF-8')  . " " .  htmlspecialchars($rowsT[$i][2], ENT_QUOTES, 'UTF-8');
                                        echo "<h4 class='inTeach'>" . $fullName . "</h4>";
                                        echo "<p> Язык: " . htmlspecialchars($rowsT[$i][3], ENT_QUOTES, 'UTF-8') . "</p>";
                                        echo "<p> Образование: " . htmlspecialchars($rowsT[$i][4], ENT_QUOTES, 'UTF-8') . "</p>";
                                    }
                                }
                                echo "</div>";
                            }
                        ?>
                    </div>
                    </div>
                    <div class="glush">
                    <div v-if="massVid3 != <?= $countTE-1?>" v-on:click="functionRight" class="circus right">
                    </div>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <div class="contacts">
                <p> Тел: +7 (972) 653 42 06<br>
                    +7 (902) 555 98 16 </p>
                <p>e-mail: infovostok@mail.ru</p>
                <p>Адрес: Магнитогорск, улица труда, 14/3</p>                
            </div>
        </footer>
        </div>
        <script src="assests/js/vue.js">
        </script>
        <script src="assests/js/main.js">
        </script>
    </div>
    </body>
</html>