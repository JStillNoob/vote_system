@vite(['resources/css/app.css', 'resources/js/app.js','resources/css/sidebar.css'])

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">    

<style>
    .user-panel {
        border-bottom: 2px solid #fefffe; /* Just the bottom line */
    }
    
    </style>


<nav>
    <ul>
        <a class="active" href='#'><img src="{{ asset('storage/schoolIcon.png') }}" alt="Logo" class="sidebar-logo"></a>
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-2 pb-2 mb-2 d-flex">
                <div class="image">
                    <img src="" style="min-height: 35px" class="img-circle elevation-2 hidden" alt="">
                </div>
                <div class="info">
                    <a href="#" class="d-block hidden"></a>
                </div>
            </div>

        <li><a class="active" href={{  route('departments.index')}}><i class="fas fa-building"></i> Manage Department</a></li>
        <li><a class="active-sample" href="{{ route('positions.index') }}"><i class="fas fa-briefcase"></i> Manage Positions</a></li>
        <li><a class="active-position" href={{ route('view-users')}}><i class="fas fa-user-edit"></i> Users</a></li>
        <li><a class="active-election" href={{ 'election-admin' }}><i class="fas fa-vote-yea"></i> Election</a></li>



        <div class="sidebar-bottom">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="logout-button">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </ul>
</nav>
