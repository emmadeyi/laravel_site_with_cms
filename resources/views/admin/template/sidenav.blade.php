<div class="sidebar text-dark" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>
                {{-- <li>
                    <a href="{{ route('users.index') }}"><i class="fa fa-user"></i> <span>Account</span></a>
                </li> --}}
                <li>
                    <a href="{{ route('projects.index') }}"><i class="fa fa-cube"></i> <span>Projects</span></a>
                </li>
                <li>
                    <a href="{{ route('fleets.index') }}"><i class="fa fa-cube"></i> <span>Fleets/ Equipment</span></a>
                </li>
                <li>
                    <a href="{{ route('galleries.index') }}"><i class="fa fa-cube"></i> <span>Gallery</span></a>
                </li>
                <li>
                    <a href="{{ route('accounts') }}"><i class="fa fa-users"></i> <span>Accounts</span></a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i>
                            <span>{{ __('Logout') }}</span>
                    </a>
    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>