<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit">Login</button>
    </form>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
</body>
</html>
