<div class="list-group shadow">
    <a href="{{ route('agent.dashboard') }}" class="list-group-item list-group-item-action {{ Request::is('agent/dashboard') ? 'active' : '' }}" aria-current="true">
    Dashboard
    </a>
    <a href="agent-payment.html" class="list-group-item list-group-item-action">Make Payment</a>
    <a href="agent-orders.html" class="list-group-item list-group-item-action">Orders</a>
    <a href="agent-add-property.html" class="list-group-item list-group-item-action">Add Property</a>
    <a href="agent-all-property.html" class="list-group-item list-group-item-action">All Properties</a>
    <a href="" class="list-group-item list-group-item-action">Message</a>
    <a href="{{ route('agent.profile') }}" class="list-group-item list-group-item-action {{ Request::is('agent/profile') ? 'active' : '' }}">Edit Profile</a>
    <a href="{{ route('agent.logout') }}" class="list-group-item list-group-item-action">Logout</a>
</div>