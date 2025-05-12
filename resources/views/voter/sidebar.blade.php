@vite(['resources/css/app.css', 'resources/js/app.js','resources/css/sidebar.css'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">    



<nav>
    <ul>
        <img src="{{ asset('storage/schoolIcon.png') }}" alt="Logo" class="sidebar-logo">

        <li><a class="active" href="{{ route('election') }}"><i class="fas fa-vote-yea"></i> Election</a></li>
        <li><a class="active-manageAcc" href="{{ route('showElections') }}"><i class="fas fa-user-edit"></i> Manage Acount</a></li>


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
