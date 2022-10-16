<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Идеальный партнёр</title>
</head>
<body>
    <?php require_once 'functions.inc.php' ?>
    <div class="container">

        <div>
            <?php

                echo '<b>Результат выполнения функции</b> getFullnameFromParts("Иванов", "Иван", "Иванович"):<br/>';  
                echo getFullnameFromParts("Иванов", "Иван", "Иванович")."<br/><br/>"; 

            ?>
            <?php

                echo '<b>Результат выполнения функции</b> print_r(getPartsFromFullname("Васильев Василий Васильевич")):<br/>';
                print_r(getPartsFromFullname("Васильев Василий Васильевич")); echo "<br/><br/>"; 

            ?>
            <?php

                echo '<b>Результат выполнения функции</b> getShortName("Рябинин Владимир Эдуардович"):<br/>';
                echo getShortName("Рябинин Владимир Эдуардович")."<br/><br/>";

            ?>
            <?php

                echo '<b>Результат выполнения функции</b> getGenderFromName("Рябинина Ольга Романовна"):<br/>';
                echo getGenderFromName("Рябинина Ольга Романовна")."<br/><br/>";

            ?>
            <?php

                echo '<b>Результат выполнения функции</b> getGenderDescription($example_persons_array):<br/><br/>';
                echo getGenderDescription($example_persons_array)."<br/><br/>";

            ?>
            <?php

                echo '<b>Результат выполнения функции</b> getPerfectPartner("ГорЯчева", "СВЕТЛАНА", "александровна", $example_persons_array):<br/><br/>';
                echo getPerfectPartner("ГорЯчева", "СВЕТЛАНА", "александровна", $example_persons_array)."<br/>";

            ?>
        </div>

    </div>

</body>
</html>