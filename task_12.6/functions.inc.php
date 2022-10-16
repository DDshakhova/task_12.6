<!DOCTYPE html>
<?php
// что было дано
$example_persons_array = [
    [
        'fullname' => 'Иванов Иван Иванович',
        'job' => 'tester',
    ],
    [
        'fullname' => 'Степанова Наталья Степановна',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Пащенко Владимир Александрович',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Громов Александр Иванович',
        'job' => 'fullstack-developer',
    ],
    [
        'fullname' => 'Славин Семён Сергеевич',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Цой Владимир Антонович',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Быстрая Юлия Сергеевна',
        'job' => 'PR-manager',
    ],
    [
        'fullname' => 'Шматко Антонина Сергеевна',
        'job' => 'HR-manager',
    ],
    [
        'fullname' => 'аль-Хорезми Мухаммад ибн-Муса',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Бардо Жаклин Фёдоровна',
        'job' => 'android-developer',
    ],
    [
        'fullname' => 'Шварцнегер Арнольд Густавович',
        'job' => 'babysitter',
    ],
];

function getPartsFromFullname($fullname){
    $partsArr=array_combine(['surname','name','patronymic'], explode(' ',$fullname));
    return $partsArr;
}

function getFullnameFromParts($partSur='Иванов',$partName='Иван',$partPatronymic='Иванович'){
    $fullname=$partSur.' '.$partName.' '.$partPatronymic;
    return $fullname;
}

function getShortName($fullname='Иванов Иван Иванович'){
    $shortName=getPartsFromFullname($fullname)['name'] .' '. mb_substr(getPartsFromFullname($fullname)['surname'], 0, 1) . '.';  //  'Иван И.'
    return $shortName;
    }

function getGenderFromName($fullname='Иванов Иван Иванович'){
$partsArr=getPartsFromFullname($fullname);
$sumGenderAttr=0; 

// мужчины
if (mb_substr($partsArr['patronymic'], -2) == 'ич'){
$sumGenderAttr++;
}
else if ((mb_substr($partsArr['name'], -1) == 'й') || (mb_substr($partsArr['name'], -1) == 'н')){
$sumGenderAttr++;
}
else if (mb_substr($partsArr['surname'], -1) == 'в'){
$sumGenderAttr++;
}

// женщины
if (mb_substr($partsArr['patronymic'], -3) == 'вна'){
    $sumGenderAttr--;
}
else if (mb_substr($partsArr['name'], -1) == 'а'){
    $sumGenderAttr--;
}
else if (mb_substr($partsArr['surname'], -2) == 'ва'){
    $sumGenderAttr--;
}

return $sumGenderAttr <=> 0; // -1 - female, 1 - male, 0 - undefined
}

function getGenderDescription (){
    $example_persons_array = [
        [
            'fullname' => 'Иванов Иван Иванович',
            'job' => 'tester',
        ],
        [
            'fullname' => 'Степанова Наталья Степановна',
            'job' => 'frontend-developer',
        ],
        [
            'fullname' => 'Пащенко Владимир Александрович',
            'job' => 'analyst',
        ],
        [
            'fullname' => 'Громов Александр Иванович',
            'job' => 'fullstack-developer',
        ],
        [
            'fullname' => 'Славин Семён Сергеевич',
            'job' => 'analyst',
        ],
        [
            'fullname' => 'Цой Владимир Антонович',
            'job' => 'frontend-developer',
        ],
        [
            'fullname' => 'Быстрая Юлия Сергеевна',
            'job' => 'PR-manager',
        ],
        [
            'fullname' => 'Шматко Антонина Сергеевна',
            'job' => 'HR-manager',
        ],
        [
            'fullname' => 'аль-Хорезми Мухаммад ибн-Муса',
            'job' => 'analyst',
        ],
        [
            'fullname' => 'Бардо Жаклин Фёдоровна',
            'job' => 'android-developer',
        ],
        [
            'fullname' => 'Шварцнегер Арнольд Густавович',
            'job' => 'babysitter',
        ],
    ];
    $generalNumber = count($example_persons_array);
    $maleNumber = 0;
    $femaleNumber = 0;

    $maleNumber = count(array_filter($example_persons_array, function($partArray){
        $temp = getGenderFromName($partArray['fullname']);
        return ($temp == '1') ? true : false;
    }));
    $femaleNumber = count(array_filter($example_persons_array, function($partArray){
        $temp = getGenderFromName($partArray['fullname']);
        return ($temp == '-1') ? true : false;
    }));

    $textGenderDescription = "Гендерный состав аудитории:<br/>---------------------------<br/>";
    $textGenderDescription .= "Мужчины - ".number_format(($maleNumber / $generalNumber)*100, 2, '.', '')."%<br/>";
    $textGenderDescription .= "Женщины - ".number_format(($femaleNumber / $generalNumber)*100, 2, '.', '')."%<br/>";
    $textGenderDescription .= "Не удалось определить - ".(100 - number_format((($maleNumber + $femaleNumber) / $generalNumber)*100, 2, '.', ''))."%<br/>";
    return $textGenderDescription;
}


function getPerfectPartner($surnameFirstPartner, $nameFirstPartner, $patronomycFirstPartner, $example_persons_array){
    $surnameFirstPartner = mb_convert_case($surnameFirstPartner, MB_CASE_TITLE_SIMPLE);
    $nameFirstPartner = mb_convert_case($nameFirstPartner, MB_CASE_TITLE_SIMPLE);
    $patronomycFirstPartner = mb_convert_case($patronomycFirstPartner, MB_CASE_TITLE_SIMPLE);
    $fullNameFirstPartner = getFullnameFromParts($surnameFirstPartner, $nameFirstPartner, $patronomycFirstPartner);
    $genderFirstPartner = getGenderFromName($fullNameFirstPartner);

    $example_persons_array = [
        [
            'fullname' => 'Иванов Иван Иванович',
            'job' => 'tester',
        ],
        [
            'fullname' => 'Степанова Наталья Степановна',
            'job' => 'frontend-developer',
        ],
        [
            'fullname' => 'Пащенко Владимир Александрович',
            'job' => 'analyst',
        ],
        [
            'fullname' => 'Громов Александр Иванович',
            'job' => 'fullstack-developer',
        ],
        [
            'fullname' => 'Славин Семён Сергеевич',
            'job' => 'analyst',
        ],
        [
            'fullname' => 'Цой Владимир Антонович',
            'job' => 'frontend-developer',
        ],
        [
            'fullname' => 'Быстрая Юлия Сергеевна',
            'job' => 'PR-manager',
        ],
        [
            'fullname' => 'Шматко Антонина Сергеевна',
            'job' => 'HR-manager',
        ],
        [
            'fullname' => 'аль-Хорезми Мухаммад ибн-Муса',
            'job' => 'analyst',
        ],
        [
            'fullname' => 'Бардо Жаклин Фёдоровна',
            'job' => 'android-developer',
        ],
        [
            'fullname' => 'Шварцнегер Арнольд Густавович',
            'job' => 'babysitter',
        ],
    ];

    if ($genderFirstPartner != 0){
        do {
            $randomElementArray = array_rand($example_persons_array, 1);
            $genderSecondPartner = getGenderFromName($example_persons_array[$randomElementArray]['fullname']);
        } while (($genderSecondPartner == 0) || ($genderFirstPartner == $genderSecondPartner));
        $fullNameSecondPartner = $example_persons_array[$randomElementArray]['fullname'];
        $PerfectPartner = getShortName($fullNameFirstPartner)." + ".getShortName($fullNameSecondPartner)." = ♡ Идеально на ".number_format((mt_rand(5000, 10000)/100),2)."%"." ♡";
    }
        else{
            $PerfectPartner = "Мы не можем определить Ваш пол. Подобрать идеального партнёра не получилось...";
        }
    return $PerfectPartner;
}
?>
