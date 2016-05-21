<?php
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Lesson_3</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="col-md-12">
<h1>Урок 3. Циклы и массивы</h1>
<?php
echo "<pre><h2>Задание 1</h2></pre>";
$i=0;
$n=100;
echo "числа в промежутке от 0 до 100, которые делятся на 3 без остатка:"."<br>";
$first=true;
while ($i<=$n)
{
    if ((($i%3)===0)&&(!$first))                 //Ноль делится на 3 без остатка, поэтому оставил его в решении
    {
        echo ", {$i}";
    }
    elseif (($i%3)===0)
    {
        echo "{$i}";
        $first=false;
    }
    $i++;
}
echo "<pre><h2>Задание 2</h2></pre>";
$i=0;
$n=10;
$odd_or_even="это ноль";
do
{
    echo "$i - $odd_or_even <br>";
    $i++;
    if (($i%2)===0)
    {
        $odd_or_even="это четное число";
    }
    else {
        $odd_or_even="это нечетное число";
    }
} while ($i<=$n);
echo "<pre><h2>Задание 3</h2></pre>";
for ($i = 0; $i < 10; print "$i ", $i++);
echo "<pre><h2>Задание 4</h2></pre>";
$Russia=[
    "Красноярский край" => ["Красноярск","Норильск","Оймякон","Шарыпово"],
    "Новосибирская область" => ["Новосибирск","Толмачево","Черепаново"],
    "Кемеровская область"=> ["Кемерово","Полысаево","Белово"],
    "Еврейская АО" => []
];
foreach ($Russia as $region => $cities)
{
   $first=true;
    foreach ($cities as $city)
    {
        if (!$first)
        {
            echo ", ";
        }
        else echo "<h3>$region</h3>";
        echo $city;
        $first=false;
    }
    if (!$first) echo ".";
}
echo "<pre><h2>Задание 5</h2></pre>";
$Russia=[
    "Красноярский край" => ["Красноярск","Норильск","Оймякон","Шарыпово","Козулька"],
    "Новосибирская область" => ["Новосибирск","Толмачево","Черепаново"],
    "Кемеровская область"=> ["Кемерово","Полысаево","Белово"],
    "Еврейская АО" => []
];
foreach ($Russia as $region => $cities)
{
    $first=true;
    foreach ($cities as $city)
    {
        if (false!==strrpos($city, "К"))
        {
            if (!$first)
            {
                echo ", ";
            }
            else echo "<h3>$region</h3>";
            echo $city;
            $first=false;
        }
    }
    if (!$first) echo ".";
}
echo "<pre><h2>Задание 6</h2></pre>";
mb_internal_encoding('UTF-8');
mb_regex_encoding('UTF-8');
$alphabet=['а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'jo','ж'=>'zh','з'=>'z','и'=>'i','й'=>'j',
    'к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u',' '=>' ',
    'ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shh','ъ'=>"'",'ы'=>'y','ь'=>"'",'э'=>'je','ю'=>'yu','я'=>'ya',];
function translit ($string, $alphabet )
{
    $n=mb_strlen($string);                                     //Вычисление кол-ва символов в строке
    $string=mb_strtolower($string);                            //Приводим строку к нижнему регистру
    for ($i=0; $i<$n; $i++ )
    {                                                          //В результате цикла создаем массив из символов
        $ruSymbol[] = mb_substr($string, $i, 1, 'UTF-8');      //строки на входе функции
    }
    foreach ($ruSymbol as $symbol)                             //Заменяем значение каждого элемента на соответствующий
    {                                                          //ему элемент из массива алфавита (значение первого
        if (array_key_exists("$symbol", $alphabet))            //совпадает с индексом второго). Создаем новый массив
        {
            $enSymbol[]=$alphabet[$symbol];
        }
    }
    $enString=implode('',$enSymbol );                          //Объединяем элементы массива в строку
    return $enString;                                          //В результате выводим итоговую строку
}
$Example="Пример Произвольного Заголовка^___^!";
echo "<p>".translit($Example, $alphabet)."</p>";
echo "<pre><h2>Задание 7</h2></pre>";
echo "<h3>Вариант 1</h3>";
function change_space ($string)
{
    $n=mb_strlen($string);
    for ($i=0; $i<$n; $i++ )
    {
        $ruSymbol[] = mb_substr($string, $i, 1, 'UTF-8');
    }
    foreach ($ruSymbol as $key => $value)
    {
        if ($value===" ")
        {
            $ruSymbol[$key]="_";
        }
    }
    $FinishString=implode('',$ruSymbol );
    return $FinishString;
}
echo change_space($Example);
echo "<h3>Вариант 2</h3>";
function change_space_2 ($string)
{
    $FinishString=mb_ereg_replace(" ","_" , $string);
    return $FinishString;
}

echo "<p>".change_space_2($Example)."</p>";
echo "<pre><h2>Задание 8</h2></pre>";
function translit_and_change ($string, $alphabet )
{
    $n=mb_strlen($string);
    $string=mb_strtolower($string);
    for ($i=0; $i<$n; $i++ )
    {
        $ruSymbol[] = mb_substr($string, $i, 1, 'UTF-8');
    }
    foreach ($ruSymbol as $symbol)                             //Заменяем значение каждого элемента на соответствующий
    {                                                          //ему элемент из массива алфавита (значение первого
        if (array_key_exists("$symbol", $alphabet))            //совпадает с индексом второго). Создаем новый массив
        {
            $enSymbol[]=$alphabet[$symbol];
        }
    }
    foreach ($enSymbol as $key => $value)
    {
        if ($value===" ")
        {
            $enSymbol[$key]="_";
        }
    }
    $FinishString=implode('',$enSymbol );
    return $FinishString;
}
echo "<p>".translit_and_change($Example, $alphabet)."</p>";
?>
    </div>
</div>
</body>
</html>