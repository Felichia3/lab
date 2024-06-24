
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="models.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo"><a href="index.php"><img src="img/Главная/logo.svg"/></a></div>
            <div class="menu">
                <ul class="main-menu">
                    <li class="main-menu__link"><a href="aboutUs.html" class="main-menu__item">О нас</a></li>
                    <li class="main-menu__link"><a href="casting.html" class="main-menu__item">Кастинг</a></li>
                    <li class="main-menu__link"><a href="contacts.html" class="main-menu__item">Контакты</a></li>
                    <li class="main-menu__link"><a href="models.php" class="main-menu__item">Модели</a></li>
                    <li class="main-menu__link"><a href="index.php" id="openModal" class="main-menu__item">Личный кабинет</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="women">
            <h2>Модели</h2>
            </div>
        </div>
    </div>

</body>
</html>    
<?php
require_once 'vvv/connect.php';
$connect = mysqli_connect('localhost', 'root', 'root', 'model_agency');

// Получение уникальных значений параметров для фильтрации
$heights = mysqli_query($connect, "SELECT DISTINCT Height FROM Models ORDER BY Height");
$weights = mysqli_query($connect, "SELECT DISTINCT Weight FROM Models ORDER BY Weight");
$waists = mysqli_query($connect, "SELECT DISTINCT Waist FROM Models ORDER BY Waist");
$hairColors = mysqli_query($connect, "SELECT DISTINCT HairColor FROM Models ORDER BY HairColor");
$eyesColors = mysqli_query($connect, "SELECT DISTINCT Eyes FROM Models ORDER BY Eyes");

// Получение всех моделей
$result = mysqli_query($connect, "SELECT m.Height, m.Weight, m.Waist, m.HairColor, m.Eyes, u.name, u.avatar FROM Models m JOIN users u ON m.ID_Models = u.id WHERE u.role != 'admin'");
$models = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <style>
        .cards {
            display: flex;
            flex-wrap: wrap;

        }
        .model-card {
            display: flex;
            flex-direction: column;
            align-items: center; /* Центрирование содержимого карточки */
            width: 350px; /* Ширина карточки */

            padding: 10px;
            margin: 10px;
            text-align: center;
        }
        .user-avatar {
            width: 100%; /* Ширина картинки равна ширине карточки */
            height: auto;
        }
        .cards_text {
            text-align: center; /* Выравнивание текста по центру */
            margin-top: 8px; /* Отступ сверху для текста */
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="sample">   
                <p>рост</p>
        <select id="heightFilter">
            <option value="">Рост</option>
            <?php while ($row = mysqli_fetch_assoc($heights)) { echo "<option value='{$row['Height']}'>{$row['Height']}</option>"; } ?>
        </select>
        <p>вес</p>
        <select id="weightFilter">
            <option value="">Вес</option>
            <?php while ($row = mysqli_fetch_assoc($weights)) { echo "<option value='{$row['Weight']}'>{$row['Weight']}</option>"; } ?>
        </select>
        <p>талия</p>
        <select id="waistFilter">
            <option value="">Талия</option>
            <?php while ($row = mysqli_fetch_assoc($waists)) { echo "<option value='{$row['Waist']}'>{$row['Waist']}</option>"; } ?>
        </select>
        <p>волосы</p>
        <select id="hairColorFilter">
            <option value="">Цвет волос</option>
            <?php while ($row = mysqli_fetch_assoc($hairColors)) { echo "<option value='{$row['HairColor']}'>{$row['HairColor']}</option>"; } ?>
        </select>
        <p>глаза</p>
        <select id="eyesColorFilter">
            <option value="">Цвет глаз</option>
            <?php while ($row = mysqli_fetch_assoc($eyesColors)) { echo "<option value='{$row['Eyes']}'>{$row['Eyes']}</option>"; } ?>
        </select>
        </div>
        <div class="cards" id="modelsContainer">
            <?php foreach ($models as $model): ?>
                <div class="model-card" data-height="<?= $model['Height'] ?>" data-weight="<?= $model['Weight'] ?>" data-waist="<?= $model['Waist'] ?>" data-haircolor="<?= $model['HairColor'] ?>" data-eyes="<?= $model['Eyes'] ?>">
                    <img src="<?= $model['avatar'] ?>" alt="Фото модели" class="user-avatar">
                    <p class="cards_text"><?= $model['name'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
             // Получение элементов фильтров по их идентификаторам
            var heightFilter = document.getElementById('heightFilter');
            var weightFilter = document.getElementById('weightFilter');
            var waistFilter = document.getElementById('waistFilter');
            var hairColorFilter = document.getElementById('hairColorFilter');
            var eyesColorFilter = document.getElementById('eyesColorFilter');

             // Функция для фильтрации моделей
            function filterModels() {
                 // Получение выбранных значений фильтров
                var height = heightFilter.value;
                var weight = weightFilter.value;
                var waist = waistFilter.value;
                var hairColor = hairColorFilter.value;
                var eyesColor = eyesColorFilter.value;

                // Получение всех карточек моделей
                var models = document.getElementById('modelsContainer').children;
                for (var i = 0; i < models.length; i++) {
                    var model = models[i];
                    // Проверка соответствия модели выбранным фильтрам
                    if ((height && model.dataset.height !== height) ||
                        (weight && model.dataset.weight !== weight) ||
                        (waist && model.dataset.waist !== waist) ||
                        (hairColor && model.dataset.haircolor !== hairColor) ||
                        (eyesColor && model.dataset.eyes !== eyesColor)) {
                        model.style.display = 'none';
                        // Если модель не соответствует, она скрывается
                    } else {
                        model.style.display = 'flex';
                        // Если соответствует, она отображается
                    }
                }
            }
// Назначение обработчиков событий на изменение значений фильтров
            heightFilter.addEventListener('change', filterModels);
            weightFilter.addEventListener('change', filterModels);
            waistFilter.addEventListener('change', filterModels);
            hairColorFilter.addEventListener('change', filterModels);
            eyesColorFilter.addEventListener('change', filterModels);
        });
    </script>
</body>
</html>
