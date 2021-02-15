  <style>
  .dropdown{
    width:155px; 
    height:40px;
  }
  .btn.btn-secondary.dropdown-toggle{
    width:155px; 
    height:20px;
  }
  .nav{
    width:100%;
  }
  </style>
    
    <!doctype html>
    <html>
    <head></head>
    <body>
    <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <img src="web.png">
                </li>
              </ul>
              <span class="navbar-text">
              <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        Welcome admin
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="logout.php" style="color:black">LOGOUT</a>
                    </div>
                    </div>
              </span>
            </div>
          </nav>
    </div>
  </div>
  </body>
  </html>