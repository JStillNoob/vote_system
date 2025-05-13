@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/sidebar.css'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">    

<style>
.user-panel {
    border-bottom: 2px solid #fefffe; /* Just the bottom line */
}

</style>

<nav>
    <ul>
        <a class="active" href='#'><img src="{{ asset('images/SALFORD.png') }}" alt="Logo" class="sidebar-logo"></a>
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

        <li><a class="active" href='#'><i class="fas fa-cog"></i> Manage</a></li>
        <li><a class="active-voters" href={{ route('voters-only') }}><i class="fas fa-id-card"></i> Voters</a></li>
        <li><a class="active-candidates" href={{ route('candidates-DeptAdmin') }}><i class="fas fa-user-tie"></i> Candidates</a></li>
        <li><a class="active-elections" href={{ route('view-election') }}><i class="fas fa-vote-yea"></i> Elections</a></li>
        <li><a class="active-account" href={{ route('manageAcc-DeptAdmin') }}><i class="fas fa-user-edit"></i> Manage Account</a></li>


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




