<html>
    <body>
        <h1>ADMIN</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

           <input type="submit" value="Logout" />
        </form>
    </body>
</html>
