<style>
    body {
        font-family: "Comic Sans MS", sans-serif;
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .login-container {
        background: white;
        border: 2px solid #000;
        padding: 40px;
        width: 320px;
        box-shadow: 10px 10px 0 #000;
        text-align: center;
    }

    h1 {
        font-size: 28px;
        margin-bottom: 30px;
    }

    .input-group {
        margin-bottom: 20px;
        text-align: left;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-size: 16px;
    }

    input {
        width: 100%;
        padding: 12px;
        border: 2px solid #000;
        box-shadow: 3px 3px 0 #000;
        font-size: 14px;
    }

    button {
        background-color: #ffcc00;
        border: 2px solid #000;
        padding: 12px;
        width: 100%;
        cursor: pointer;
        box-shadow: 3px 3px 0 #000;
        font-size: 16px;
    }

    button:hover {
        background-color: #ffeb3b;
    }

    @media (max-width: 600px) {
        .login-container {
            width: 90%;
            padding: 30px;
        }
    }
</style>
<div class="login-container">
    <h1>Register</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('register-user') }}" id="loginForm" method="post">
        @csrf
        <div class="input-group">
            <label for="name">name</label>
            <input type="name" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="input-group">
            <label for="email">email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"  required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="input-group">
            <label for="confirm_password">confirm password</label>
            <input type="password" id="confirm_password" name="password_confirmation" required>
        </div>
        <button type="submit">Register</button>
    </form>
</div>
