@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/department-admin.css'])
@include('department-admin.sidebar')

<style>
    li a.active-account, li a:hover, .logout-button:hover {
    background-color: #ffffff;
    color: #1A73E8;
    
}
</style>

<nav class="navbar fixed-top" style="margin-left: 250px;">
    <div class="container-fluid" style="margin-right: 250px;">
        <p class="navbar-brand" href="#" status='disable'>Manage Account</p>
    </div>
</nav>