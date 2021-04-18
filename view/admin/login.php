<link rel="stylesheet" href="/view/res/css/auth.css">

<section id="auth">
    <div class="container">
        <div class="user-form">
            <h2 class="section-title">Авторизация</h2>
            <form action="/admin/auth/process/" redirectTo="/admin/">
                <input type="text" placeholder="Логин" name="login">
                <input type="password" placeholder="Пароль" name="password">
                <button>Отправить</button>
            </form>
        </div>
    </div>
</section>