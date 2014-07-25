<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Admin Panel</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">Profile</a></li>
        <li>{{ link_to_route('new_admin','Add Admin') }}</li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Competition <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('competitions.create','Add Competition') }}</li>
            <li>{{ link_to_route('competitions.index','All Competitions') }}</li>
          </ul>
        </li>

		    <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Team <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('users.create','Add Team') }}</li>
            <li>{{ link_to_route('users.index','All Teams') }}</li>
          </ul>
        </li>


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Problems <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('problems.create','Add Problem') }}</li>
            <li>{{ link_to_route('problems.index','All Problems') }}</li>
           </ul>
        </li>

        
        <li>{{ link_to_route('user_logout','Logout') }}</li>
        

      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>