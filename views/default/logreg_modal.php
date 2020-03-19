<div class="log_modal">
	<div class="log_modal_content">
		<span class="log_close" id='logClose'>&times;</span>
		<h2 class='log_heading'>Вход на сайт</h2>
		<div class="log_error hideme"></div>
		<input type="text" id="userEmail" class="log_input" placeholder="Email" name='userEmail'>
		<span class='log_or'>или</span>
		<input type="text" id="userNumber" class="log_input" placeholder="Телефон" name='userName'>
		<input type="password" id="userPassword" class="log_input" placeholder="Пароль" name='userPassword'>
		<a href="#" class='log_register_link' onclick='showReg();'>Не зарегистрированы?</a>
		<button class='log_button' onclick='login();'>ВОЙТИ</button>
	</div>
</div>

<div class="reg_modal">
	<div class="reg_modal_content">
		<span class="reg_close" id='regClose'>&times;</span>
		<h2 class='reg_heading'>Регистрация</h2>
		<div class="reg_error hideme"></div>
		<input type="text" id="userEmail" class="reg_input" placeholder="Email" name='userEmail'>
		<input type="text" id="userName" class="reg_input" placeholder="Имя и фамилия" name='userName'>
		<input type="password" id="userPassword" class="reg_input" placeholder="Пароль" name='userPassword'>
		<button class='reg_button' onclick='register();'>Зарегистрироваться</button>
	</div>
</div>