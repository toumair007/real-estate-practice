<div class="list-group shadow">
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="true">
    Dashboard
    </a>
    <a href="" class="list-group-item list-group-item-action">Message</a>
    <a href="" class="list-group-item list-group-item-action">Wishlist</a>
    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action {{ Request::is('profile') ? 'active' : '' }}">Edit Profile</a>
    <a href="{{ route('logout') }}" class="list-group-item list-group-item-action">Logout</a>
</div>