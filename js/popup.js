document.addEventListener('DOMContentLoaded', function () {
    // Получаем элементы модальных окон и кнопки для их открытия/закрытия
    var modalReg = document.getElementById('myPopup');
    var modalAuth = document.getElementById('authPopup');
    var openModalButton = document.getElementById('openModal');
    var switchToAuthButton = document.getElementById('switchToAuth');
    var switchToRegisterButton = document.getElementById('switchToRegister');
    var closeModalElements = document.querySelectorAll('.close');
  
    // Функция для открытия модального окна регистрации
    function openRegModal() {
      modalReg.style.display = 'block';
      modalAuth.style.display = 'none';
    }
  
    // Функция для открытия модального окна авторизации
    function openAuthModal() {
      modalAuth.style.display = 'block';
      modalReg.style.display = 'none';
    }
  
    // Функция для закрытия всех модальных окон
    function closeModal() {
      modalReg.style.display = 'none';
      modalAuth.style.display = 'none';
    }
  
    // Обработчик событий для кнопки "Вход", который открывает окно авторизации
    switchToAuthButton.addEventListener('click', function(event) {
      openAuthModal();
      event.stopPropagation(); // Это предотвратит всплытие события
    });
  
    // Обработчик событий для кнопки "Регистрация", который открывает окно регистрации
    switchToRegisterButton.addEventListener('click', function(event) {
      openRegModal();
      event.stopPropagation(); // Это предотвратит всплытие события
    });
  
    // Обработчик событий для кнопки открытия модального окна регистрации
    openModalButton.addEventListener('click', openRegModal);
  
  // Закрытие модального окна при клике вне его области
  window.addEventListener('click', function (event) {
    if (event.target === modalReg || event.target === modalAuth) {
    closeModal();
    }
    });
  
    // Закрытие модального окна при клике на элементы с классом 'close'
    closeModalElements.forEach(function (element) {
      element.addEventListener('click', closeModal);
    });
  });