<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Product Category
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', 'ProductCategoryController@storeCKEditorImages')->name('product-categories.storeCKEditorImages');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product Tag
    Route::delete('product-tags/destroy', 'ProductTagController@massDestroy')->name('product-tags.massDestroy');
    Route::resource('product-tags', 'ProductTagController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::post('products/parse-csv-import', 'ProductController@parseCsvImport')->name('products.parseCsvImport');
    Route::post('products/process-csv-import', 'ProductController@processCsvImport')->name('products.processCsvImport');
    Route::resource('products', 'ProductController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Expense Category
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Income Category
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expense
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Income
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'IncomeController');

    // Expense Report
    Route::delete('expense-reports/destroy', 'ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('expense-reports', 'ExpenseReportController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Slider
    Route::delete('sliders/destroy', 'SliderController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SliderController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SliderController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SliderController');

    // Courier
    Route::delete('couriers/destroy', 'CourierController@massDestroy')->name('couriers.massDestroy');
    Route::resource('couriers', 'CourierController');

    // City
    Route::delete('cities/destroy', 'CityController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CityController');

    // Zone
    Route::delete('zones/destroy', 'ZoneController@massDestroy')->name('zones.massDestroy');
    Route::resource('zones', 'ZoneController');

    // Supplier
    Route::delete('suppliers/destroy', 'SupplierController@massDestroy')->name('suppliers.massDestroy');
    Route::resource('suppliers', 'SupplierController');

    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::resource('settings', 'SettingsController');

    // Menu
    Route::delete('menus/destroy', 'MenuController@massDestroy')->name('menus.massDestroy');
    Route::resource('menus', 'MenuController');

    // Page
    Route::delete('pages/destroy', 'PageController@massDestroy')->name('pages.massDestroy');
    Route::post('pages/media', 'PageController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PageController@storeCKEditorImages')->name('pages.storeCKEditorImages');
    Route::resource('pages', 'PageController');

    // Purchase
    Route::delete('purchases/destroy', 'PurchaseController@massDestroy')->name('purchases.massDestroy');
    Route::resource('purchases', 'PurchaseController');

    // Stock
    Route::delete('stocks/destroy', 'StockController@massDestroy')->name('stocks.massDestroy');
    Route::resource('stocks', 'StockController');

    // Payment
    Route::delete('payments/destroy', 'PaymentController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentController');

    // Customer
    Route::delete('customers/destroy', 'CustomerController@massDestroy')->name('customers.massDestroy');
    Route::resource('customers', 'CustomerController');

    // Order
    Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrderController');

    // Sms Notification
    Route::delete('sms-notifications/destroy', 'SmsNotificationController@massDestroy')->name('sms-notifications.massDestroy');
    Route::resource('sms-notifications', 'SmsNotificationController');

    // Order Notification
    Route::resource('order-notifications', 'OrderNotificationController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Courier Report
    Route::delete('courier-reports/destroy', 'CourierReportController@massDestroy')->name('courier-reports.massDestroy');
    Route::resource('courier-reports', 'CourierReportController');

    // User Report
    Route::delete('user-reports/destroy', 'UserReportController@massDestroy')->name('user-reports.massDestroy');
    Route::resource('user-reports', 'UserReportController');

    // Product Report
    Route::delete('product-reports/destroy', 'ProductReportController@massDestroy')->name('product-reports.massDestroy');
    Route::resource('product-reports', 'ProductReportController');

    // Order Payment
    Route::delete('order-payments/destroy', 'OrderPaymentController@massDestroy')->name('order-payments.massDestroy');
    Route::resource('order-payments', 'OrderPaymentController');

    // Payment Report
    Route::delete('payment-reports/destroy', 'PaymentReportController@massDestroy')->name('payment-reports.massDestroy');
    Route::resource('payment-reports', 'PaymentReportController');

    // Total Inventory
    Route::delete('total-inventories/destroy', 'TotalInventoryController@massDestroy')->name('total-inventories.massDestroy');
    Route::resource('total-inventories', 'TotalInventoryController');

    // Product Review
    Route::delete('product-reviews/destroy', 'ProductReviewController@massDestroy')->name('product-reviews.massDestroy');
    Route::resource('product-reviews', 'ProductReviewController');

    // Review Reply
    Route::delete('review-replies/destroy', 'ReviewReplyController@massDestroy')->name('review-replies.massDestroy');
    Route::resource('review-replies', 'ReviewReplyController');

    // Product Request
    Route::delete('product-requests/destroy', 'ProductRequestController@massDestroy')->name('product-requests.massDestroy');
    Route::resource('product-requests', 'ProductRequestController');

    // Product Variation
    Route::delete('product-variations/destroy', 'ProductVariationController@massDestroy')->name('product-variations.massDestroy');
    Route::post('product-variations/media', 'ProductVariationController@storeMedia')->name('product-variations.storeMedia');
    Route::post('product-variations/ckmedia', 'ProductVariationController@storeCKEditorImages')->name('product-variations.storeCKEditorImages');
    Route::resource('product-variations', 'ProductVariationController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
