@include('layouts.general.top-bar')

<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li class="{{ Route::is('home') ? 'mm-active' : '' }}">
                    <a href="{{ route('home') }}">
                        <i class="dripicons-dot"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="{{ Route::is('accountopen.index','accountopen.create','accountopen.edit') ? 'mm-active' : '' }}" hidden>
                    <a href="{{ route('accountopen.index') }}">
                        <i class="dripicons-dot"></i>
                        <span key="t-dashboards">Open Account</span>
                    </a>
                </li>
                <li class="{{ Route::is('accountclose.index','accountclose.create','accountclose.edit') ? 'mm-active' : '' }}" hidden>
                    <a href="{{ route('accountclose.index') }}">
                        <i class="dripicons-dot"></i>
                        <span key="t-dashboards">Close Account</span>
                    </a>
                </li>
                <li class="{{ Route::is('employee.index','employee.create','employee.edit','employee.view') ? 'mm-active' : '' }}">
                    <a href="{{ route('employee.index') }}">
                        <i class="dripicons-dot"></i>
                        <span key="t-dashboards">Staff & Sales Member</span>
                    </a>
                </li>
                <li class="{{ Route::is('customer.index','customer.create','customer.edit','customer.view','customer.breafast.view','customer.lunch.view','customer.dinner.view') ? 'mm-active' : '' }}">
                    <a href="{{ route('customer.index') }}">
                        <i class="dripicons-dot"></i>
                        <span key="t-dashboards">Customer</span>
                    </a>
                </li>
                <li class="{{ Route::is('payment.index','payment.create','payment.edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('payment.index') }}">
                        <i class="dripicons-dot"></i>
                        <span key="t-dashboards">Payment</span>
                    </a>
                </li>
                <li class="{{ Route::is('sales.index','sales.create','breakfast.edit','lunch.edit','dinner.edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('sales.index') }}">
                        <i class="dripicons-dot"></i>
                        <span key="t-dashboards">Sales</span>
                    </a>
                </li>
                <li class="{{ Route::is('expence.index','expence.create','expence.edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('expence.index') }}">
                        <i class="dripicons-dot"></i>
                        <span key="t-dashboards">Expense</span>
                    </a>
                </li>
                @hasrole('Super-Admin')
                <li class="menu-title" key="t-menu">Settings</li>
                <li class="{{ Route::is('invite.index','invite.create') ? 'mm-active' : '' }}">
                    <a href="{{ route('invite.index') }}">
                        <i class="dripicons-dot"></i>
                        <span key="t-dashboards">Invite</span>
                    </a>
                </li>
                @endhasrole
                <li class="{{ Route::is('profile') ? 'mm-active' : '' }}">
                    <a href="{{ route('profile') }}">
                        <i class="dripicons-dot"></i>
                        <span key="t-dashboards">Profile</span>
                    </a>
                </li>
                <li class="{{ Route::is('settings') ? 'mm-active' : '' }}">
                    <a href="{{ route('settings') }}">
                        <i class="dripicons-dot"></i>
                        <span key="t-dashboards">Password</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
