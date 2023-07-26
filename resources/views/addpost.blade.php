<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Your Blog</title>
    <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/
        html5.js"></script><![endif]-->
</head>

<body>
    @if (Auth::check())
        <section class="container">
            <div class="content">
                <h1>Welcome to Admin Area, {{ Auth::user()->name }} ! - <b><a href="{{ route('logout') }}">Logout</a></b>
                </h1>
                @if(Session::has('error'))
                    <h3 class="text-danger text-alert" style="color:red;">{{Session::get('error')}}</h3>
                @endif
                @if(Session::has('success'))
                    <h3 class="text-succes text-alert" style="color:green;">{{Session::get('success')}}</h3>
                @endif
                <form action="{{ route('add_post') }}" method="post" name="add_post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Enter Post Subject</label>
                        <input type="text" name="title" value="" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="content">Enter Post's Content</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="submit">Save -></button>
                    </div>

                </form>
            </div>
        </section>
    @else
        <section class="container">
            <div class="login">
                <h1>Please Login</h1>
                <form action="{{ route('login') }}" method="post" name="login">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" value="" id="password" class="form-control">
                    </div>
                    <div class="form-group submit">
                        <button type="submit" class="btn btn-primary" name="commit">Login</button>
                    </div>
                </form>
            </div>
        </section>
    @endif

</body>

</html>
