<nav class="navbar navbar-inverse">
  <div class="navbar-header">
    <a class="navbar-brand" href="{{ URL::to('secure') }}">Welcome {{$user->name }}</a>
  </div>
  <ul class="nav navbar-nav">
    <li><a href="{{ URL::to('ffl') }}">Dealers</a></li>
    <li><a href="{{ URL::to('userdetail') }}">User Profile</a></li>
    @if ($user->fflid > 0)    
    <li><a href="{{ URL::to('ffldetail/edit') }}">Dealer Profile</a></li>
    @endif
    <li><a href="{{ URL::to('logout') }}">Logout</a></li>
    <li>
      <form name="myform" action="/ffl" method="get" class="navbar-form">
        <input type="text" name="name" placeholder="Dealer Search">
        <input type="submit" value="Search">
      </form>
    </li>
  </ul>

</nav>