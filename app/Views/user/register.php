<main class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm card-form">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <h2 class="fw-bold"><i class="bi bi-person-plus text-primary me-2"></i>Регистрация</h2>
                            <p class="text-muted">Создайте аккаунт, чтобы начать публиковать посты</p>
                        </div>

                        <form id="registrationForm" method="post" action="/register">
                            <div class="mb-4">
                                <label for="name" class="form-label">Имя</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Введите ваше имя" value="<?= getOld('name') ?>">
                                </div>
                                <div class="invalid-feedback">Пожалуйста, введите ваше имя</div>
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Введите ваш email" value="<?= getOld('email') ?>">
                                </div>
                                <div class="invalid-feedback">Пожалуйста, введите корректный email</div>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Пароль</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Создайте пароль">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                <div class="invalid-feedback">Пароль должен содержать минимум 6 символов</div>
                                <div class="form-text">Минимум 6 символов</div>
                            </div>

                            <div class="mb-4">
                                <label for="confirmPassword" class="form-label">Подтверждение пароля</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Повторите пароль">
                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                <div class="invalid-feedback">Пароли не совпадают</div>
                            </div>

                            <div class="d-grid gap-2 mt-5">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-person-plus me-2"></i>Зарегистрироваться
                                </button>
                            </div>

                            <div class="text-center mt-4">
                                <p class="text-muted">Уже есть аккаунт? <a href="<?= getHref('/login') ?>" class="text-primary">Войдите</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
