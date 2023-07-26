<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Awesome Blogs</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
    <div id="wrapper" class="container">
        <header>
            <h1>
                <a href="{{route('index')}}">My Awesome Blog</a>
            </h1>
            <p>Welcome to my awesome blog</p>
        </header>
        <section id="main">
            <section id="content">
                @foreach ($posts as $post)
                    <article>
                        <h2>{{$post->title}}</h2>
                        <p>{{$post->content}}</p>
                        <p><small>Posted by <b>{{$post->Author->name}}</b> at <b>{{$post->created_at}}</b></small></p>
                    </article>
                @endforeach
            </section>
            {{$posts->links()}}
        </section>
        <footer>
            <section id="footer-area">
                <section id="footer-outer-block">
                    <aside class="footer-segment">
                        <h4>My Awesome Blog</h4>
                    </aside>
                </section>
            </section>
        </footer>
    </div>
</body>
</html>