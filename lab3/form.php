<?php
include_once 'functions.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="styles/styles.css" rel="stylesheet">
    <title>Lab3_Sukhanov</title>
</head>
<body>
    <form id="my-form" method="post" class="needs-validation"
          action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-2 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="200px" src="https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png">
                        <input type="file" onchange="previewFile()" class="form-control-file" id="Profilphoto" name="Profilphoto" required>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="LastName">Фамилия</label>
                                    <input name="LastName" type="text" class="form-control" id="LastName" required maxlength="30" minlength="2" pattern="[A-Za-zА-Яа-яЁё]+"
                                           title="Поле содержит только текст">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Name">Имя</label>
                                    <input name="Name" type="text" class="form-control" id="Name" required maxlength="30" minlength="2" pattern="[A-Za-zА-Яа-яЁё]+"
                                           title="Поле содержит только текст">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="MiddleName">Отчество</label>
                                    <input name="MiddleName" type="text" class="form-control" id="MiddleName" required minlength="5" maxlength="30" pattern="[A-Za-zА-Яа-яЁё]+"
                                           title="Поле содержит только текст">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Date">Дата рождения:</label>
                                    <input type="date" class="form-control" name="Date" id="Date" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Gender">Пол</label>
                                    <select class="form-select custom-select" aria-label="Default select example" name="Gender" id="Gender" required>
                                        <option value="">-</option>
                                        <option value="M">М</option>
                                        <option value="Ж">Ж</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Nationality">Национальность</label>
                                    <select class="form-select custom-select" aria-label="Default select example" name="Nationality" id="Nationality" required>
                                        <option value="">-</option>
                                        <option value="Россия">Россия</option>
                                        <option value="Украина">Украина</option>
                                        <option value="Беларусь">Беларусь</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 TextArea">
                            <div class="form-group">
                                <label for="shortinfo">Краткая информация</label>
                                <textarea type="text" class="form-control" id="shortinfo" name="shortinfo" rows="3" placeholder="Напишите краткую информацию о себе" required
                                          maxlength="200"></textarea>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="p-3 py-5">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Address">Адрес</label>
                                    <input name="Address" type="text" class="form-control" id="Address" required
                                           value="<?php echo $_POST['Address']?>">
                                    <?php echo $err['Address']?>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <h5>Мои увлечения</h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="hobby1" name="hobby[]" id="Hobby">
                                    <label class="form-check-label" for="Hobby">
                                        Увлечение 1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="hobby2" name="hobby[]" id="Hobby2">
                                    <label class="form-check-label" for="Hobby2">
                                        Увлечение 2
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="hobby3" name="hobby[]" id="Hobby3">
                                    <label class="form-check-label" for="Hobby3">
                                        Увлечение 3
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="hobby4" name="hobby[]" id="Hobby4">
                                    <label class="form-check-label" for="Hobby4">
                                        Увлечение 4
                                    </label>
                                </div>
                                <?php echo $err['hobby']?>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Email">Email</label>
                                        <input name="Email" type="email" class="form-control" id="Email"
                                               aria-describedby="emailHelp" placeholder="Введите email" required
                                        value="<?php echo $_POST['Email']?>">
                                        <?php echo $err['Email']?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Skype">Skype</label>
                                        <input  name="Skype" type="text"  class="form-control" id="Skype" placeholder="Some text" required
                                                value="<?php echo $_POST['Skype']?>">
                                        <?php echo $err['Skype']?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="phone">Телефон</label>
                                    <input name="phone" type="tel" id="phone" class="form-control" required maxlength="13"
                                           value="<?php echo $_POST['phone']?>">
                                    <?php echo $err['phone']?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h5>Связаться со мной:</h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Phone" id="phone1" name="contact">
                                    <label class="form-check-label" for="phone1">
                                        По телефону
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Email" id="email" name="contact">
                                    <label class="form-check-label" for="email">
                                        По электронной почте
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Skype" id="skype" name="contact">
                                    <label class="form-check-label" for="skype">
                                        Skype
                                    </label>
                                </div>
                                <?php echo $err['contact']?>
                            </div>
                            <!--<div class="col-md-12">
                                <div class="form-group">
                                    <label for="phone">Получать рассылку?</label>
                                    <button type="yes">Да</button>
                                    <button type="no">Нет</button>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit" value="Отправить">Отправить</button>
                        <input class="btn btn-primary" type="reset" value="Сбросить">
                    </div>
                    <?php echo $err['success'] ?>
                </div>

            </div>
        </div>
    </form>
    <script src="incs/file.js"></script>
<!--    <script src="incs/main.js"></script>-->
</body>
</html>
