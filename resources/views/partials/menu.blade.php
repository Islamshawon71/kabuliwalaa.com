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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li>
                    <select class="searchable-field form-control">

                    </select>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/user-alerts*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_alert_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-alerts.index") }}" class="nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bell">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userAlert.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('product_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/products*") ? "menu-open" : "" }} {{ request()->is("admin/product-categories*") ? "menu-open" : "" }} {{ request()->is("admin/product-tags*") ? "menu-open" : "" }} {{ request()->is("admin/product-reviews*") ? "menu-open" : "" }} {{ request()->is("admin/review-replies*") ? "menu-open" : "" }} {{ request()->is("admin/product-requests*") ? "menu-open" : "" }} {{ request()->is("admin/product-variations*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-shopping-cart">

                            </i>
                            <p>
                                {{ trans('cruds.productManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('product_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.products.index") }}" class="nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-shopping-cart">

                                        </i>
                                        <p>
                                            {{ trans('cruds.product.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.product-categories.index") }}" class="nav-link {{ request()->is("admin/product-categories") || request()->is("admin/product-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.productCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_tag_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.product-tags.index") }}" class="nav-link {{ request()->is("admin/product-tags") || request()->is("admin/product-tags/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.productTag.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_review_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.product-reviews.index") }}" class="nav-link {{ request()->is("admin/product-reviews") || request()->is("admin/product-reviews/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.productReview.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('review_reply_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.review-replies.index") }}" class="nav-link {{ request()->is("admin/review-replies") || request()->is("admin/review-replies/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.reviewReply.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_request_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.product-requests.index") }}" class="nav-link {{ request()->is("admin/product-requests") || request()->is("admin/product-requests/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.productRequest.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_variation_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.product-variations.index") }}" class="nav-link {{ request()->is("admin/product-variations") || request()->is("admin/product-variations/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.productVariation.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('website_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/sliders*") ? "menu-open" : "" }} {{ request()->is("admin/settings*") ? "menu-open" : "" }} {{ request()->is("admin/menus*") ? "menu-open" : "" }} {{ request()->is("admin/pages*") ? "menu-open" : "" }} {{ request()->is("admin/sms-notifications*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.website.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('slider_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sliders.index") }}" class="nav-link {{ request()->is("admin/sliders") || request()->is("admin/sliders/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-images">

                                        </i>
                                        <p>
                                            {{ trans('cruds.slider.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('setting_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.settings.index") }}" class="nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.setting.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('menu_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.menus.index") }}" class="nav-link {{ request()->is("admin/menus") || request()->is("admin/menus/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.menu.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('page_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.pages.index") }}" class="nav-link {{ request()->is("admin/pages") || request()->is("admin/pages/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.page.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('sms_notification_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sms-notifications.index") }}" class="nav-link {{ request()->is("admin/sms-notifications") || request()->is("admin/sms-notifications/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.smsNotification.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('courier_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/couriers*") ? "menu-open" : "" }} {{ request()->is("admin/cities*") ? "menu-open" : "" }} {{ request()->is("admin/zones*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.courierManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('courier_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.couriers.index") }}" class="nav-link {{ request()->is("admin/couriers") || request()->is("admin/couriers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-truck-loading">

                                        </i>
                                        <p>
                                            {{ trans('cruds.courier.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('city_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.cities.index") }}" class="nav-link {{ request()->is("admin/cities") || request()->is("admin/cities/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-map-marker">

                                        </i>
                                        <p>
                                            {{ trans('cruds.city.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('zone_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.zones.index") }}" class="nav-link {{ request()->is("admin/zones") || request()->is("admin/zones/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-map-marker-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.zone.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('payment_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/payments*") ? "menu-open" : "" }} {{ request()->is("admin/order-payments*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.paymentManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('payment_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.payments.index") }}" class="nav-link {{ request()->is("admin/payments") || request()->is("admin/payments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hand-holding-usd">

                                        </i>
                                        <p>
                                            {{ trans('cruds.payment.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('order_payment_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.order-payments.index") }}" class="nav-link {{ request()->is("admin/order-payments") || request()->is("admin/order-payments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.orderPayment.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('order_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/customers*") ? "menu-open" : "" }} {{ request()->is("admin/orders*") ? "menu-open" : "" }} {{ request()->is("admin/order-notifications*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.orderManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('customer_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.customers.index") }}" class="nav-link {{ request()->is("admin/customers") || request()->is("admin/customers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.customer.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('order_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.orders.index") }}" class="nav-link {{ request()->is("admin/orders") || request()->is("admin/orders/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-clipboard-list">

                                        </i>
                                        <p>
                                            {{ trans('cruds.order.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('order_notification_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.order-notifications.index") }}" class="nav-link {{ request()->is("admin/order-notifications") || request()->is("admin/order-notifications/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.orderNotification.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('expense_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/income-categories*") ? "menu-open" : "" }} {{ request()->is("admin/expense-categories*") ? "menu-open" : "" }} {{ request()->is("admin/expenses*") ? "menu-open" : "" }} {{ request()->is("admin/incomes*") ? "menu-open" : "" }} {{ request()->is("admin/expense-reports*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-money-bill">

                            </i>
                            <p>
                                {{ trans('cruds.expenseManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('income_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.income-categories.index") }}" class="nav-link {{ request()->is("admin/income-categories") || request()->is("admin/income-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-list">

                                        </i>
                                        <p>
                                            {{ trans('cruds.incomeCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('expense_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.expense-categories.index") }}" class="nav-link {{ request()->is("admin/expense-categories") || request()->is("admin/expense-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-list">

                                        </i>
                                        <p>
                                            {{ trans('cruds.expenseCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('expense_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.expenses.index") }}" class="nav-link {{ request()->is("admin/expenses") || request()->is("admin/expenses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-arrow-circle-right">

                                        </i>
                                        <p>
                                            {{ trans('cruds.expense.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('income_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.incomes.index") }}" class="nav-link {{ request()->is("admin/incomes") || request()->is("admin/incomes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-arrow-circle-right">

                                        </i>
                                        <p>
                                            {{ trans('cruds.income.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('expense_report_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.expense-reports.index") }}" class="nav-link {{ request()->is("admin/expense-reports") || request()->is("admin/expense-reports/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-chart-line">

                                        </i>
                                        <p>
                                            {{ trans('cruds.expenseReport.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('report_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/courier-reports*") ? "menu-open" : "" }} {{ request()->is("admin/user-reports*") ? "menu-open" : "" }} {{ request()->is("admin/product-reports*") ? "menu-open" : "" }} {{ request()->is("admin/payment-reports*") ? "menu-open" : "" }} {{ request()->is("admin/total-inventories*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.report.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('courier_report_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.courier-reports.index") }}" class="nav-link {{ request()->is("admin/courier-reports") || request()->is("admin/courier-reports/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.courierReport.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_report_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-reports.index") }}" class="nav-link {{ request()->is("admin/user-reports") || request()->is("admin/user-reports/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userReport.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_report_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.product-reports.index") }}" class="nav-link {{ request()->is("admin/product-reports") || request()->is("admin/product-reports/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.productReport.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('payment_report_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.payment-reports.index") }}" class="nav-link {{ request()->is("admin/payment-reports") || request()->is("admin/payment-reports/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.paymentReport.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('total_inventory_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.total-inventories.index") }}" class="nav-link {{ request()->is("admin/total-inventories") || request()->is("admin/total-inventories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.totalInventory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('store_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/suppliers*") ? "menu-open" : "" }} {{ request()->is("admin/purchases*") ? "menu-open" : "" }} {{ request()->is("admin/stocks*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.store.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('supplier_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.suppliers.index") }}" class="nav-link {{ request()->is("admin/suppliers") || request()->is("admin/suppliers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.supplier.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('purchase_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.purchases.index") }}" class="nav-link {{ request()->is("admin/purchases") || request()->is("admin/purchases/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.purchase.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('stock_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.stocks.index") }}" class="nav-link {{ request()->is("admin/stocks") || request()->is("admin/stocks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.stock.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>