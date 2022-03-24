{{--

<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside> --}}


          <!-- ========== Left Sidebar Start ========== -->
          <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu" data-widget="treeview" role="menu" data-accordion="false">
                        <li >
                            <a class="waves-effect" href="{{ route("admin.home") }}">
                                <i class="fas fa-fw fa-tachometer-alt nav-icon">
                                </i>
                                <span>
                                    {{ trans('global.dashboard') }}
                                </span>
                            </a>
                        </li>
                        @can('user_management_access')
                            <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/user-alerts*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }}">
                                <a class="waves-effect has-arrow" href="#">
                                    <i class="fa-fw nav-icon fas fa-users">

                                    </i>
                                    <span>
                                        {{ trans('cruds.userManagement.title') }}

                                    </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    @can('permission_access')
                                        <li >
                                            <a href="{{ route("admin.permissions.index") }}" class="waves-effect {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-unlock-alt">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.permission.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('role_access')
                                        <li >
                                            <a href="{{ route("admin.roles.index") }}" class="waves-effect {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-briefcase">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.role.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('user_access')
                                        <li >
                                            <a href="{{ route("admin.users.index") }}" class="waves-effect {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-user">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.user.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('user_alert_access')
                                        <li >
                                            <a href="{{ route("admin.user-alerts.index") }}" class="waves-effect {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-bell">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.userAlert.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('audit_log_access')
                                        <li >
                                            <a href="{{ route("admin.audit-logs.index") }}" class="waves-effect {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-file-alt">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.auditLog.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('product_management_access')
                            <li class="nav-item has-treeview {{ request()->is("admin/products*") ? "menu-open" : "" }} {{ request()->is("admin/product-categories*") ? "menu-open" : "" }} {{ request()->is("admin/product-tags*") ? "menu-open" : "" }} {{ request()->is("admin/product-reviews*") ? "menu-open" : "" }} {{ request()->is("admin/review-replies*") ? "menu-open" : "" }} {{ request()->is("admin/product-requests*") ? "menu-open" : "" }} {{ request()->is("admin/product-variations*") ? "menu-open" : "" }}">
                                <a class="waves-effect has-arrow" href="#">
                                    <i class="fa-fw nav-icon fas fa-shopping-cart">

                                    </i>
                                    <span>
                                        {{ trans('cruds.productManagement.title') }}

                                    </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    @can('product_access')
                                        <li >
                                            <a href="{{ route("admin.products.index") }}" class="waves-effect {{ request()->is("admin/products") || request()->is("admin/products/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-shopping-cart">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.product.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('product_category_access')
                                        <li >
                                            <a href="{{ route("admin.product-categories.index") }}" class="waves-effect {{ request()->is("admin/product-categories") || request()->is("admin/product-categories/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-folder">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.productCategory.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('product_tag_access')
                                        <li >
                                            <a href="{{ route("admin.product-tags.index") }}" class="waves-effect {{ request()->is("admin/product-tags") || request()->is("admin/product-tags/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-folder">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.productTag.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('product_review_access')
                                        <li >
                                            <a href="{{ route("admin.product-reviews.index") }}" class="waves-effect {{ request()->is("admin/product-reviews") || request()->is("admin/product-reviews/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-cogs">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.productReview.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('review_reply_access')
                                        <li >
                                            <a href="{{ route("admin.review-replies.index") }}" class="waves-effect {{ request()->is("admin/review-replies") || request()->is("admin/review-replies/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-cogs">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.reviewReply.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('product_request_access')
                                        <li >
                                            <a href="{{ route("admin.product-requests.index") }}" class="waves-effect {{ request()->is("admin/product-requests") || request()->is("admin/product-requests/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-cogs">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.productRequest.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('product_variation_access')
                                        <li >
                                            <a href="{{ route("admin.product-variations.index") }}" class="waves-effect {{ request()->is("admin/product-variations") || request()->is("admin/product-variations/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-cogs">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.productVariation.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('website_access')
                            <li class="nav-item has-treeview {{ request()->is("admin/sliders*") ? "menu-open" : "" }} {{ request()->is("admin/settings*") ? "menu-open" : "" }} {{ request()->is("admin/menus*") ? "menu-open" : "" }} {{ request()->is("admin/pages*") ? "menu-open" : "" }} {{ request()->is("admin/sms-notifications*") ? "menu-open" : "" }}">
                                <a class="waves-effect has-arrow" href="#">
                                    <i class="fa-fw nav-icon fas fa-cogs">

                                    </i>
                                    <span>
                                        {{ trans('cruds.website.title') }}

                                    </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    @can('slider_access')
                                        <li >
                                            <a href="{{ route("admin.sliders.index") }}" class="waves-effect {{ request()->is("admin/sliders") || request()->is("admin/sliders/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon far fa-images">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.slider.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('setting_access')
                                        <li >
                                            <a href="{{ route("admin.settings.index") }}" class="waves-effect {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-cogs">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.setting.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('menu_access')
                                        <li >
                                            <a href="{{ route("admin.menus.index") }}" class="waves-effect {{ request()->is("admin/menus") || request()->is("admin/menus/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-cogs">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.menu.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('page_access')
                                        <li >
                                            <a href="{{ route("admin.pages.index") }}" class="waves-effect {{ request()->is("admin/pages") || request()->is("admin/pages/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon far fa-file-alt">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.page.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('sms_notification_access')
                                        <li >
                                            <a href="{{ route("admin.sms-notifications.index") }}" class="waves-effect {{ request()->is("admin/sms-notifications") || request()->is("admin/sms-notifications/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-cogs">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.smsNotification.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('courier_management_access')
                            <li class="nav-item has-treeview {{ request()->is("admin/couriers*") ? "menu-open" : "" }} {{ request()->is("admin/cities*") ? "menu-open" : "" }} {{ request()->is("admin/zones*") ? "menu-open" : "" }}">
                                <a class="waves-effect has-arrow" href="#">
                                    <i class="fa-fw nav-icon fas fa-cogs">

                                    </i>
                                    <span>
                                        {{ trans('cruds.courierManagement.title') }}

                                    </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    @can('courier_access')
                                        <li >
                                            <a href="{{ route("admin.couriers.index") }}" class="waves-effect {{ request()->is("admin/couriers") || request()->is("admin/couriers/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-truck-loading">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.courier.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('city_access')
                                        <li >
                                            <a href="{{ route("admin.cities.index") }}" class="waves-effect {{ request()->is("admin/cities") || request()->is("admin/cities/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-map-marker">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.city.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('zone_access')
                                        <li >
                                            <a href="{{ route("admin.zones.index") }}" class="waves-effect {{ request()->is("admin/zones") || request()->is("admin/zones/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-map-marker-alt">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.zone.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('payment_management_access')
                            <li class="nav-item has-treeview {{ request()->is("admin/payments*") ? "menu-open" : "" }} {{ request()->is("admin/order-payments*") ? "menu-open" : "" }}">
                                <a class="waves-effect has-arrow" href="#">
                                    <i class="fa-fw nav-icon fas fa-cogs">

                                    </i>
                                    <span>
                                        {{ trans('cruds.paymentManagement.title') }}

                                    </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    @can('payment_access')
                                        <li >
                                            <a href="{{ route("admin.payments.index") }}" class="waves-effect {{ request()->is("admin/payments") || request()->is("admin/payments/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-hand-holding-usd">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.payment.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('order_payment_access')
                                        <li >
                                            <a href="{{ route("admin.order-payments.index") }}" class="waves-effect {{ request()->is("admin/order-payments") || request()->is("admin/order-payments/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-cogs">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.orderPayment.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('order_management_access')
                            <li class="nav-item has-treeview {{ request()->is("admin/customers*") ? "menu-open" : "" }} {{ request()->is("admin/orders*") ? "menu-open" : "" }} {{ request()->is("admin/order-notifications*") ? "menu-open" : "" }}">
                                <a class="waves-effect has-arrow" href="#">
                                    <i class="fa-fw nav-icon fas fa-cogs">

                                    </i>
                                    <span>
                                        {{ trans('cruds.orderManagement.title') }}

                                    </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    @can('customer_access')
                                        <li >
                                            <a href="{{ route("admin.customers.index") }}" class="waves-effect {{ request()->is("admin/customers") || request()->is("admin/customers/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-cogs">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.customer.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('order_access')
                                        <li >
                                            <a href="{{ route("admin.orders.index") }}" class="waves-effect {{ request()->is("admin/orders") || request()->is("admin/orders/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-clipboard-list">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.order.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('order_notification_access')
                                        <li >
                                            <a href="{{ route("admin.order-notifications.index") }}" class="waves-effect {{ request()->is("admin/order-notifications") || request()->is("admin/order-notifications/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-cogs">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.orderNotification.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('expense_management_access')
                            <li class="nav-item has-treeview {{ request()->is("admin/income-categories*") ? "menu-open" : "" }} {{ request()->is("admin/expense-categories*") ? "menu-open" : "" }} {{ request()->is("admin/expenses*") ? "menu-open" : "" }} {{ request()->is("admin/incomes*") ? "menu-open" : "" }} {{ request()->is("admin/expense-reports*") ? "menu-open" : "" }}">
                                <a class="waves-effect has-arrow" href="#">
                                    <i class="fa-fw nav-icon fas fa-money-bill">

                                    </i>
                                    <span>
                                        {{ trans('cruds.expenseManagement.title') }}

                                    </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    @can('income_category_access')
                                        <li >
                                            <a href="{{ route("admin.income-categories.index") }}" class="waves-effect {{ request()->is("admin/income-categories") || request()->is("admin/income-categories/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-list">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.incomeCategory.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('expense_category_access')
                                        <li >
                                            <a href="{{ route("admin.expense-categories.index") }}" class="waves-effect {{ request()->is("admin/expense-categories") || request()->is("admin/expense-categories/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-list">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.expenseCategory.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('expense_access')
                                        <li >
                                            <a href="{{ route("admin.expenses.index") }}" class="waves-effect {{ request()->is("admin/expenses") || request()->is("admin/expenses/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-arrow-circle-right">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.expense.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('income_access')
                                        <li >
                                            <a href="{{ route("admin.incomes.index") }}" class="waves-effect {{ request()->is("admin/incomes") || request()->is("admin/incomes/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-arrow-circle-right">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.income.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('expense_report_access')
                                        <li >
                                            <a href="{{ route("admin.expense-reports.index") }}" class="waves-effect {{ request()->is("admin/expense-reports") || request()->is("admin/expense-reports/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-chart-line">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.expenseReport.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('report_access')
                            <li class="nav-item has-treeview {{ request()->is("admin/courier-reports*") ? "menu-open" : "" }} {{ request()->is("admin/user-reports*") ? "menu-open" : "" }} {{ request()->is("admin/product-reports*") ? "menu-open" : "" }} {{ request()->is("admin/payment-reports*") ? "menu-open" : "" }} {{ request()->is("admin/total-inventories*") ? "menu-open" : "" }}">
                                <a class="waves-effect has-arrow" href="#">
                                    <i class="fa-fw nav-icon fas fa-cogs">

                                    </i>
                                    <span>
                                        {{ trans('cruds.report.title') }}

                                    </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    @can('courier_report_access')
                                        <li >
                                            <a href="{{ route("admin.courier-reports.index") }}" class="waves-effect {{ request()->is("admin/courier-reports") || request()->is("admin/courier-reports/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-cogs">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.courierReport.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('user_report_access')
                                        <li >
                                            <a href="{{ route("admin.user-reports.index") }}" class="waves-effect {{ request()->is("admin/user-reports") || request()->is("admin/user-reports/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-cogs">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.userReport.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('product_report_access')
                                        <li >
                                            <a href="{{ route("admin.product-reports.index") }}" class="waves-effect {{ request()->is("admin/product-reports") || request()->is("admin/product-reports/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-cogs">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.productReport.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('payment_report_access')
                                        <li >
                                            <a href="{{ route("admin.payment-reports.index") }}" class="waves-effect {{ request()->is("admin/payment-reports") || request()->is("admin/payment-reports/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-cogs">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.paymentReport.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('total_inventory_access')
                                        <li >
                                            <a href="{{ route("admin.total-inventories.index") }}" class="waves-effect {{ request()->is("admin/total-inventories") || request()->is("admin/total-inventories/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-cogs">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.totalInventory.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('store_access')
                            <li class="nav-item has-treeview {{ request()->is("admin/suppliers*") ? "menu-open" : "" }} {{ request()->is("admin/purchases*") ? "menu-open" : "" }} {{ request()->is("admin/stocks*") ? "menu-open" : "" }}">
                                <a class="waves-effect has-arrow" href="#">
                                    <i class="fa-fw nav-icon fas fa-cogs">

                                    </i>
                                    <span>
                                        {{ trans('cruds.store.title') }}

                                    </span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    @can('supplier_access')
                                        <li >
                                            <a href="{{ route("admin.suppliers.index") }}" class="waves-effect {{ request()->is("admin/suppliers") || request()->is("admin/suppliers/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-cogs">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.supplier.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('purchase_access')
                                        <li >
                                            <a href="{{ route("admin.purchases.index") }}" class="waves-effect {{ request()->is("admin/purchases") || request()->is("admin/purchases/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-cogs">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.purchase.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('stock_access')
                                        <li >
                                            <a href="{{ route("admin.stocks.index") }}" class="waves-effect {{ request()->is("admin/stocks") || request()->is("admin/stocks/*") ? "active" : "" }}">
                                                <i class="fa-fw nav-icon fas fa-cogs">

                                                </i>
                                                <span>
                                                    {{ trans('cruds.stock.title') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                            @can('profile_password_edit')
                                <li >
                                    <a class="waves-effect {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                        <i class="fa-fw fas fa-key nav-icon">
                                        </i>
                                        <span>
                                            {{ trans('global.change_password') }}
                                        </span>
                                    </a>
                                </li>
                            @endcan
                        @endif
                        <li >
                            <a href="#" class="waves-effect" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                <span>
                                    <i class="fas fa-fw fa-sign-out-alt nav-icon">

                                    </i>
                                    <span>{{ trans('global.logout') }}</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                    {{-- <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="index.html" class="waves-effect">
                                <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="calendar.html" class=" waves-effect">
                                <i class="ri-calendar-2-line"></i>
                                <span>Calendar</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-mail-send-line"></i>
                                <span>Email</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="email-inbox.html">Inbox</a></li>
                                <li><a href="email-read.html">Read Email</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-layout-3-line"></i>
                                <span>Layouts</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow">Vertical</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                                        <li><a href="layouts-compact-sidebar.html">Compact Sidebar</a></li>
                                        <li><a href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                                        <li><a href="layouts-boxed.html">Boxed Layout</a></li>
                                        <li><a href="layouts-preloader.html">Preloader</a></li>
                                        <li><a href="layouts-colored-sidebar.html">Colored Sidebar</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="layouts-horizontal.html">Horizontal</a></li>
                                        <li><a href="layouts-hori-topbar-light.html">Topbar light</a></li>
                                        <li><a href="layouts-hori-boxed-width.html">Boxed width</a></li>
                                        <li><a href="layouts-hori-preloader.html">Preloader</a></li>
                                        <li><a href="layouts-hori-colored-header.html">Colored Header</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-title">Pages</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-account-circle-line"></i>
                                <span>Authentication</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="auth-login.html">Login</a></li>
                                <li><a href="auth-register.html">Register</a></li>
                                <li><a href="auth-recoverpw.html">Recover Password</a></li>
                                <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-profile-line"></i>
                                <span>Utility</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="pages-starter.html">Starter Page</a></li>
                                <li><a href="pages-timeline.html">Timeline</a></li>
                                <li><a href="pages-directory.html">Directory</a></li>
                                <li><a href="pages-invoice.html">Invoice</a></li>
                                <li><a href="pages-404.html">Error 404</a></li>
                                <li><a href="pages-500.html">Error 500</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">Components</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-pencil-ruler-2-line"></i>
                                <span>UI Elements</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="ui-alerts.html">Alerts</a></li>
                                <li><a href="ui-buttons.html">Buttons</a></li>
                                <li><a href="ui-cards.html">Cards</a></li>
                                <li><a href="ui-carousel.html">Carousel</a></li>
                                <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                                <li><a href="ui-grid.html">Grid</a></li>
                                <li><a href="ui-images.html">Images</a></li>
                                <li><a href="ui-lightbox.html">Lightbox</a></li>
                                <li><a href="ui-modals.html">Modals</a></li>
                                <li><a href="ui-offcanvas.html">Offcavas</a></li>
                                <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                <li><a href="ui-tabs-accordions.html">Tabs & Accordions</a></li>
                                <li><a href="ui-typography.html">Typography</a></li>
                                <li><a href="ui-video.html">Video</a></li>
                                <li><a href="ui-general.html">General</a></li>

                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-vip-crown-2-line"></i>
                                <span>Advanced UI</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="advance-rangeslider.html">Range Slider</a></li>
                                <li><a href="advance-roundslider.html">Round Slider</a></li>
                                <li><a href="advance-session-timeout.html">Session Timeout</a></li>
                                <li><a href="advance-sweet-alert.html">Sweetalert 2</a></li>
                                <li><a href="advance-rating.html">Rating</a></li>
                                <li><a href="advance-notifications.html">Notifications</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="ri-eraser-fill"></i>
                                <span class="badge rounded-pill bg-danger float-end">8</span>
                                <span>Forms</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="form-elements.html">Form Elements</a></li>
                                <li><a href="form-validation.html">Form Validation</a></li>
                                <li><a href="form-advanced.html">Form Advanced Plugins</a></li>
                                <li><a href="form-editors.html">Form Editors</a></li>
                                <li><a href="form-uploads.html">Form File Upload</a></li>
                                <li><a href="form-xeditable.html">Form X-editable</a></li>
                                <li><a href="form-wizard.html">Form Wizard</a></li>
                                <li><a href="form-mask.html">Form Mask</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-table-2"></i>
                                <span>Tables</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="tables-basic.html">Basic Tables</a></li>
                                <li><a href="tables-datatable.html">Data Tables</a></li>
                                <li><a href="tables-responsive.html">Responsive Table</a></li>
                                <li><a href="tables-editable.html">Editable Table</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-bar-chart-line"></i>
                                <span>Charts</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="charts-apex.html">Apex Charts</a></li>
                                <li><a href="charts-chartjs.html">Chartjs Charts</a></li>
                                <li><a href="charts-flot.html">Flot Charts</a></li>
                                <li><a href="charts-knob.html">Jquery Knob Charts</a></li>
                                <li><a href="charts-sparkline.html">Sparkline Charts</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-brush-line"></i>
                                <span>Icons</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="icons-remix.html">Remix Icons</a></li>
                                <li><a href="icons-materialdesign.html">Material Design</a></li>
                                <li><a href="icons-dripicons.html">Dripicons</a></li>
                                <li><a href="icons-fontawesome.html">Font awesome 5</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-map-pin-line"></i>
                                <span>Maps</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="maps-google.html">Google Maps</a></li>
                                <li><a href="maps-vector.html">Vector Maps</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-share-line"></i>
                                <span>Multi Level</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 1.1</a></li>
                                <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="javascript: void(0);">Level 2.1</a></li>
                                        <li><a href="javascript: void(0);">Level 2.2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                    </ul> --}}
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
