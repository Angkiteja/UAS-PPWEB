<!-- 
    kenapa namanya menu.blade.php?
blade disini adalah template terkait view yg ada di laravel
semua ada blade nya biar dibaca laravel 
-->
<html>
<head>
    <!-- bootstrap nya -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Angki Teja</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/">My Name <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/about">Say Hi</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="/university">College</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/mahasiswa">List Mahasiswa</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/buku">List Buku</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user">List user</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/galeri">Galeri</a>
        </li>

        <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li> -->

        <!-- <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
        </li> -->

        </ul>

        <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
    </div>
    </nav>

            <!-- <div class="links">
                <a href="/">My Name</a>
                <a href="/about">Say Hi</a>
                <a href="/wau">who are you?</a>
                <a href="/address">Address</a>
                <a href="/university">College </a>
                <a href="/mahasiswa">List Mahasiswa </a>
                <a href="/buku">List Buku </a>
            </div> -->
</body>

</html>

