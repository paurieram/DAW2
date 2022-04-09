<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Mou Fitxa</h1>
    <?php
        $daw = rand(1,6);
        echo "<img src='img/$daw.svg'>";
    ?>
    <p>
        <svg width="620" height="120" viewbox="-15 -15 620 120" style="background-color:white; font-family:sans-serif">
            <!-- 1 -->
            <rect x="0" y="0" width="100" height="100" stroke="black" stroke-width="1" fill="none"></rect>
            <text x="50" y="80" text-anchor="middle" font-size="80" fill="lightgray">1</text>
            <?php
                if ($daw==1){
                    echo "<circle cx='50' cy='50' r='30' stroke='black' stroke-width='2' fill='red'>";
                }
            ?>
            <!-- 2 -->
            <rect x="100" y="0" width="100" height="100" stroke="black" stroke-width="1" fill="none"></rect>
            <text x="150" y="80" text-anchor="middle" font-size="80" fill="lightgray">2</text>
            <!-- 3 -->
            <rect x="200" y="0" width="100" height="100" stroke="black" stroke-width="1" fill="none"></rect>
            <text x="250" y="80" text-anchor="middle" font-size="80" fill="lightgray">3</text>
            <!-- 4 -->
            <rect x="300" y="0" width="100" height="100" stroke="black" stroke-width="1" fill="none"></rect>
            <text x="350" y="80" text-anchor="middle" font-size="80" fill="lightgray">4</text>
            <!-- 5 -->
            <rect x="400" y="0" width="100" height="100" stroke="black" stroke-width="1" fill="none"></rect>
            <text x="450" y="80" text-anchor="middle" font-size="80" fill="lightgray">5</text>
            <!-- 6 -->
            <rect x="500" y="0" width="100" height="100" stroke="black" stroke-width="1" fill="none"></rect>
            <text x="550" y="80" text-anchor="middle" font-size="80" fill="lightgray">6</text>
        </svg>
    </p>
</body>
</html>