<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (Session::get('fail'))
        <div class="alert alert-danger"> {{ Session::get('fail') }}</div>
    @endif
    <form action="{{ url('admin/check') }}" method="post">
        @csrf
        <label for="email">email</label>
        <input type="text" id="email" name="email" value="{{ old('email') }}">
        <br>
        <label for="password">password</label>
        <input type="text" id="password" name="password" value="{{ old('password') }}">
        <br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>
