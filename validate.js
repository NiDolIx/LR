var form_1 = document.querySelector('.container_registration') // форма регистрации
var reg = form_1.querySelector('.reg') // кнопка "зарегистрироваться"
var name_form = form_1.querySelector('.name_form')
var password_form = form_1.querySelector('.password_form')
var password_relod_form = form_1.querySelector('.password_relod_form')
var email_form = form_1.querySelector('.email_form')
var telephone_form = form_1.querySelector('.telephone_form')
var fields = form_1.querySelectorAll('.fields')

var form_2 = document.querySelector('.container_login') // форма авторизации
var log = form_2.querySelector('.log') // кнопка "войти"
var name_form_2 = form_2.querySelector('.name_form_2')
var password_form_2 = form_2.querySelector('.password_form_2')
var field = form_2.querySelectorAll('.field')


// валидация формы регистрации
form_1.addEventListener('submit', function (event) {
  event.preventDefault()

  var errors = form_1.querySelectorAll('.error')

  for (var i = 0; i < errors.length; i++) {
    errors[i].remove()
  }

  for (var i = 0; i < fields.length; i++) { // Поиск незаполненных полей 
    if (!fields[i].value) {
      console.log('field is blank', fields[i])
      var error = document.createElement('div')
      error.className='error'
      error.style.color = 'red'
      error.innerHTML = 'Cannot be blank'
      form_1[i].parentElement.insertBefore(error, fields[i])
    }
  }

  if (password_form.value !== password_relod_form.value) { // Проверка на совпадение паролей
    console.log('not equals')
    var error = document.createElement('div')
    error.className = 'error'
    error.style.color = 'red'
    error.innerHTML = 'Passwords doesnt match'
    password_form.parentElement.insertBefore(error, password_form)
  }

  // Вывод полей в консоль
  console.log("form: ", name_form.value)
  console.log("form: ", password_form.value)
  console.log("form: ", email_form.value)
  console.log("form: ", telephone_form.value)



  let registerForm = new FormData(form_1);
    fetch('register.php', {
     method: 'POST',
     body: registerForm
  }
)
.then(response => response.json())
.then((result) => {
  if (result.errors) {
     alert(result.errors);
  } else {
    document.location.reload();
  }
})
.catch(error => console.log(error));
})


// валидация формы авторизации 
form_2.addEventListener('submit', function (event) {
  event.preventDefault()

  var errors = form_2.querySelectorAll('.error')

  for (var i = 0; i < errors.length; i++) {
    errors[i].remove()
  }

  for (var i = 0; i < field.length; i++) { // Поиск незаполненных полей 
    if (!field[i].value) {
      console.log('field is blank', field[i])
      var error = document.createElement('div')
      error.className='error'
      error.style.color = 'red'
      error.innerHTML = 'Cannot be blank'
      form_2[i].parentElement.insertBefore(error, field[i])
    }
  }

  // Вывод полей в консоль
  console.log("form: ", name_form_2.value)
  console.log("form: ", password_form_2.value)

  let registerForm = new FormData(form_2);
    fetch('login.php', {
     method: 'POST',
     body: registerForm
  }
)
.then(response => response.json())
.then((result) => {
  if (result.errors) {
     alert(result.errors);
  } else {
    document.location.reload();
  }
})
.catch(error => console.log(error));
})