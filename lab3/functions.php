<?php

function clear_data($val){
    $val = trim($val);
    $val = stripcslashes($val);
    $val = strip_tags($val);
    $val = htmlspecialchars($val);

    return $val;
}

$address = clear_data($_POST['Address']);
$email = clear_data($_POST['Email']);
$skype = clear_data($_POST['Skype']);
$phone = clear_data($_POST['phone']);
$Hobby = $_POST['hobby'];
$Contact = $_POST['contact'];

$pattern_phone = "/^\+380\d{3}\d{2}\d{2}\d{2}$/";
$pattern_text = "[A-Za-zА-Яа-яЁё]";
$err  = [];
$flag = 0;

if ($_SERVER['REQUEST_METHOD']== 'POST'){
    if (empty($address)){
        $err['Address'] = '<small class="text-danger">Поле не может быть пустым</small>';
        $flag = 1;
    }elseif (is_numeric($address)){
        $err['Address'] = '<small class="text-danger">Неверно указан формат адреса</small>';
        $flag = 1;
    }
    if (empty($Hobby)){
        $err['hobby'] = '<small class="text-danger">Выберите хотя бы одно увлечение</small>';
        $flag = 1;
    }
    if (empty($skype)){
        $err['Skype'] = '<small class="text-danger">Поле не может быть пустым</small>';
        $flag = 1;
    }elseif (is_numeric($skype)){
        $err['Skype'] = '<small class="text-danger">Неверно указан формат</small>';
        $flag = 1;
    }
    if (empty($email)){
        $err['Email'] = '<small class="text-danger">Поле не может быть пустым</small>';
        $flag = 1;
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $err['Email'] = '<small class="text-danger">Неверно указан Email</small>';
        $flag = 1;
    }
    if (empty($phone)){
        $err['phone'] = '<small class="text-danger">Поле не может быть пустым</small>';
        $flag = 1;
    } elseif (!preg_match($pattern_phone, $phone)){
        $err['phone'] = '<small class="text-danger">Неверно указан формат телефона</small>';
        $flag = 1;
    }
    if (empty($Contact)){
        $err['contact'] = '<small class="text-danger">Выберите вид связи</small>';
        $flag = 1;
    }
    if ($flag == 0){
        $fp  = fopen('form-data.json', 'w');
        fwrite($fp, json_encode($_POST));
        fclose($fp);
        Header("Location:". $_SERVER['HTTP_REFERER']."?mes=success");
    }
}

if ($_GET['mes'] == 'success'){
    $err['success'] = '<div class="alert alert-success">Форма успешно отправлена!</div>';
}
//$email = $_POST['email'];
//$result = null;
//
//if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//    $result = '<div class="alert alert-danger">' . 'E-mail адрес ' . $email . ' указан не верно.' . '</div>';
//    header('Location: ' . '/form.php?error=' . base64_encode($result));
//} else {
//    $fp = fopen('form-data.json', 'w');
//    fwrite($fp, json_encode($_POST));
//    fclose($fp);
//    header('Location: ' . '/form.php');
//}


//function debug($data){
//    echo '<pre' . print_r($data, 1) . '<pre>';
//}
//
//function load($data){
//    foreach ($_POST as $k => $v){
//        if (array_key_exists($k, $data)){
//            $data[$k]['value'] = $v;
//        }
//    }
//    return $data;
//}
//
//function validate($data){
//    $errors = '';
//    foreach ($data as $k => $v) {
//        if ($data [$k]['required'] && empty($data[$k]['value'])){
//            $errors .= "<li class='alert alert-danger' role='alert' >
//                                        Вы не заполнили поле {$data[$k]['field_name']}
//                                    </li>";
//        }
//    }
//
//    return $errors;
//}
//$email = $_POST['Email'];
//if(filter_var($email, FILTER_VALIDATE_EMAIL)){
//    echo "Адрес указан корректно";
//}else{
//    echo 'Адрес указан не правильно';
//}
//
//$HOBBY = $_POST['hobby'];
//if(empty($HOBBY)){
//    echo ("Не выбрано не одно увлечение.");
//}
//else{
//    $N  = count($HOBBY);
//
//    echo ("Вы выбрали $N увлечение(я): ");
//    for ($i = 0; $i < $N; $i++){
//        echo ($HOBBY[$i] . '');
//    }
//}
//
//$CONTACT = $_POST['contact'];
//if(empty($CONTACT)){
//    echo ("Не выбран не олин вид связи.");
//}
//else{
//    $N  = count($CONTACT);
//
//    echo ("Вы выбрали $N видов связи(ей): ");
//    for ($i = 0; $i < $N; $i++){
//        echo ($CONTACT[$i] . '');
//    }
//}
//
//$pattern = "/^\+380\d{3}\d{2}\d{2}\d{2}$/";
//$PHONE = $_POST['phone'];
//if(empty($PHONE)){
//    echo ("Номер не введен");
//}
//elseif(preg_match($pattern, $PHONE)) echo "Номер валиден: $PHONE";
//else echo "Не валиден";
//
//if(empty($_POST)){
//    echo "Форма пустая";
//}else{
//    $fp  = fopen('form-data.json', 'w');
//    fwrite($fp, json_encode($_POST));
//    fclose($fp);
//    header('Location ' . '/form.php');
//}
