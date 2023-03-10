@include('layouts.general.top-bar')

<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li class="{{ Route::is('home','filterindex') ? 'mm-active' : '' }}">
                    <a href="{{ route('home') }}">
                        <i class="mdi mdi-home-circle-outline"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                <li class="menu-title" key="t-menu">Delivery</li>
                <li class="{{ Route::is('customer.index','customer.create','customer.edit','customer.view', 'custome.filter', 'customer.breafast.view','customer.lunch.view','customer.dinner.view') ? 'mm-active' : '' }}">
                    <a href="{{ route('customer.index') }}">
                        <i class="mdi mdi-account-tie-outline"></i>
                        <span key="t-dashboards">Create New</span>
                    </a>
                </li>
                <li class="{{ Route::is('deliveryboy.index','deliveryboy.create','deliveryboy.edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('deliveryboy.index') }}">
                        <i class="mdi mdi-truck-delivery-outline"></i>
                        <span key="t-dashboards">Delivery By</span>
                    </a>
                </li>
                <li class="{{ Route::is('sales.index','sales.create','breakfast.edit','lunch.edit','dinner.edit', 'sales.dailyfilter') ? 'mm-active' : '' }}">
                    <a href="{{ route('sales.index') }}">
                        <i class="mdi mdi-credit-card-wireless"></i>
                        <span key="t-dashboards">Daily</span>
                    </a>
                </li>
                <li class="{{ Route::is('payment.index','payment.create','payment.edit','payment.dailyfilter') ? 'mm-active' : '' }}">
                    <a href="{{ route('payment.index') }}">
                        <i class="mdi mdi-currency-brl"></i>
                        <span key="t-dashboards">Payment</span>
                    </a>
                </li>
                <li class="menu-title" key="t-menu">Expenses</li>
                <li class="{{ Route::is('employee.index','employee.create','employee.edit','employee.view') ? 'mm-active' : '' }}">
                    <a href="{{ route('employee.index') }}">
                        <i class="mdi mdi-account-supervisor-circle-outline"></i>
                        <span key="t-dashboards">Create New</span>
                    </a>
                </li>
                <li class="{{ Route::is('expence.index','expence.create','expence.edit','expence.dailyfilter') ? 'mm-active' : '' }}">
                    <a href="{{ route('expence.index') }}">
                        <i class="mdi mdi-contactless-payment-circle-outline"></i>
                        <span key="t-dashboards">Daily</span>
                    </a>
                </li>
                <li class="menu-title" key="t-menu">Account</li>
                <li class="{{ Route::is('accountopen.index','accountopen.create','accountopen.edit', 'accountopen.dailyfilter') ? 'mm-active' : '' }}">
                    <a href="{{ route('accountopen.index') }}">
                        <i class="mdi mdi-folder-open-outline"></i>
                        <span key="t-dashboards">Open Account</span>
                    </a>
                </li>
                <li class="{{ Route::is('accountclose.index','accountclose.create','accountclose.edit', 'accountclose.dailyfilter') ? 'mm-active' : '' }}">
                    <a href="{{ route('accountclose.index') }}">
                        <i class="mdi mdi-close-network-outline"></i>
                        <span key="t-dashboards">Close Account</span>
                    </a>
                </li>
                <li class="{{ Route::is('determination.index','determination.create','determination.edit', 'determination.dailyfilter') ? 'mm-active' : '' }}">
                    <a href="{{ route('determination.index') }}">
                        <i class="mdi mdi-cash-100"></i>
                        <span key="t-dashboards">Denomination</span>
                    </a>
                </li>
                @hasrole('Super-Admin')
                <li class="menu-title" key="t-menu">Settings</li>
                <li class="{{ Route::is('invite.index','invite.create') ? 'mm-active' : '' }}" hidden>
                    <a href="{{ route('invite.index') }}">
                        <i class="dripicons-dot"></i>
                        <span key="t-dashboards">Invite</span>
                    </a>
                </li>
                @endhasrole
                <li class="{{ Route::is('profile') ? 'mm-active' : '' }}">
                    <a href="{{ route('profile') }}">
                        <i class="mdi mdi-account-settings-outline"></i>
                        <span key="t-dashboards">Profile</span>
                    </a>
                </li>
                <li class="{{ Route::is('settings') ? 'mm-active' : '' }}">
                    <a href="{{ route('settings') }}">
                        <i class="mdi mdi-form-textbox-password"></i>
                        <span key="t-dashboards">Password</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
