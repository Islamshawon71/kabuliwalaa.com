<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'product_create',
            ],
            [
                'id'    => 29,
                'title' => 'product_edit',
            ],
            [
                'id'    => 30,
                'title' => 'product_show',
            ],
            [
                'id'    => 31,
                'title' => 'product_delete',
            ],
            [
                'id'    => 32,
                'title' => 'product_access',
            ],
            [
                'id'    => 33,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 34,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 35,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 36,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 37,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 38,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 39,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 40,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 41,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 42,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 43,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 44,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 45,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 46,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 47,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 48,
                'title' => 'expense_create',
            ],
            [
                'id'    => 49,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 50,
                'title' => 'expense_show',
            ],
            [
                'id'    => 51,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 52,
                'title' => 'expense_access',
            ],
            [
                'id'    => 53,
                'title' => 'income_create',
            ],
            [
                'id'    => 54,
                'title' => 'income_edit',
            ],
            [
                'id'    => 55,
                'title' => 'income_show',
            ],
            [
                'id'    => 56,
                'title' => 'income_delete',
            ],
            [
                'id'    => 57,
                'title' => 'income_access',
            ],
            [
                'id'    => 58,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 59,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 60,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 61,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 62,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 63,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 64,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 65,
                'title' => 'website_access',
            ],
            [
                'id'    => 66,
                'title' => 'slider_create',
            ],
            [
                'id'    => 67,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 68,
                'title' => 'slider_show',
            ],
            [
                'id'    => 69,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 70,
                'title' => 'slider_access',
            ],
            [
                'id'    => 71,
                'title' => 'courier_management_access',
            ],
            [
                'id'    => 72,
                'title' => 'courier_create',
            ],
            [
                'id'    => 73,
                'title' => 'courier_edit',
            ],
            [
                'id'    => 74,
                'title' => 'courier_show',
            ],
            [
                'id'    => 75,
                'title' => 'courier_delete',
            ],
            [
                'id'    => 76,
                'title' => 'courier_access',
            ],
            [
                'id'    => 77,
                'title' => 'city_create',
            ],
            [
                'id'    => 78,
                'title' => 'city_edit',
            ],
            [
                'id'    => 79,
                'title' => 'city_show',
            ],
            [
                'id'    => 80,
                'title' => 'city_delete',
            ],
            [
                'id'    => 81,
                'title' => 'city_access',
            ],
            [
                'id'    => 82,
                'title' => 'zone_create',
            ],
            [
                'id'    => 83,
                'title' => 'zone_edit',
            ],
            [
                'id'    => 84,
                'title' => 'zone_show',
            ],
            [
                'id'    => 85,
                'title' => 'zone_delete',
            ],
            [
                'id'    => 86,
                'title' => 'zone_access',
            ],
            [
                'id'    => 87,
                'title' => 'supplier_create',
            ],
            [
                'id'    => 88,
                'title' => 'supplier_edit',
            ],
            [
                'id'    => 89,
                'title' => 'supplier_show',
            ],
            [
                'id'    => 90,
                'title' => 'supplier_delete',
            ],
            [
                'id'    => 91,
                'title' => 'supplier_access',
            ],
            [
                'id'    => 92,
                'title' => 'setting_create',
            ],
            [
                'id'    => 93,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 94,
                'title' => 'setting_show',
            ],
            [
                'id'    => 95,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 96,
                'title' => 'setting_access',
            ],
            [
                'id'    => 97,
                'title' => 'menu_create',
            ],
            [
                'id'    => 98,
                'title' => 'menu_edit',
            ],
            [
                'id'    => 99,
                'title' => 'menu_show',
            ],
            [
                'id'    => 100,
                'title' => 'menu_delete',
            ],
            [
                'id'    => 101,
                'title' => 'menu_access',
            ],
            [
                'id'    => 102,
                'title' => 'page_create',
            ],
            [
                'id'    => 103,
                'title' => 'page_edit',
            ],
            [
                'id'    => 104,
                'title' => 'page_show',
            ],
            [
                'id'    => 105,
                'title' => 'page_delete',
            ],
            [
                'id'    => 106,
                'title' => 'page_access',
            ],
            [
                'id'    => 107,
                'title' => 'purchase_create',
            ],
            [
                'id'    => 108,
                'title' => 'purchase_edit',
            ],
            [
                'id'    => 109,
                'title' => 'purchase_show',
            ],
            [
                'id'    => 110,
                'title' => 'purchase_delete',
            ],
            [
                'id'    => 111,
                'title' => 'purchase_access',
            ],
            [
                'id'    => 112,
                'title' => 'stock_create',
            ],
            [
                'id'    => 113,
                'title' => 'stock_edit',
            ],
            [
                'id'    => 114,
                'title' => 'stock_show',
            ],
            [
                'id'    => 115,
                'title' => 'stock_delete',
            ],
            [
                'id'    => 116,
                'title' => 'stock_access',
            ],
            [
                'id'    => 117,
                'title' => 'payment_management_access',
            ],
            [
                'id'    => 118,
                'title' => 'payment_create',
            ],
            [
                'id'    => 119,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 120,
                'title' => 'payment_show',
            ],
            [
                'id'    => 121,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 122,
                'title' => 'payment_access',
            ],
            [
                'id'    => 123,
                'title' => 'order_management_access',
            ],
            [
                'id'    => 124,
                'title' => 'customer_create',
            ],
            [
                'id'    => 125,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 126,
                'title' => 'customer_show',
            ],
            [
                'id'    => 127,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 128,
                'title' => 'customer_access',
            ],
            [
                'id'    => 129,
                'title' => 'order_create',
            ],
            [
                'id'    => 130,
                'title' => 'order_edit',
            ],
            [
                'id'    => 131,
                'title' => 'order_show',
            ],
            [
                'id'    => 132,
                'title' => 'order_delete',
            ],
            [
                'id'    => 133,
                'title' => 'order_access',
            ],
            [
                'id'    => 134,
                'title' => 'sms_notification_create',
            ],
            [
                'id'    => 135,
                'title' => 'sms_notification_edit',
            ],
            [
                'id'    => 136,
                'title' => 'sms_notification_show',
            ],
            [
                'id'    => 137,
                'title' => 'sms_notification_delete',
            ],
            [
                'id'    => 138,
                'title' => 'sms_notification_access',
            ],
            [
                'id'    => 139,
                'title' => 'order_notification_show',
            ],
            [
                'id'    => 140,
                'title' => 'order_notification_access',
            ],
            [
                'id'    => 141,
                'title' => 'report_access',
            ],
            [
                'id'    => 142,
                'title' => 'courier_report_create',
            ],
            [
                'id'    => 143,
                'title' => 'courier_report_edit',
            ],
            [
                'id'    => 144,
                'title' => 'courier_report_show',
            ],
            [
                'id'    => 145,
                'title' => 'courier_report_delete',
            ],
            [
                'id'    => 146,
                'title' => 'courier_report_access',
            ],
            [
                'id'    => 147,
                'title' => 'user_report_create',
            ],
            [
                'id'    => 148,
                'title' => 'user_report_edit',
            ],
            [
                'id'    => 149,
                'title' => 'user_report_show',
            ],
            [
                'id'    => 150,
                'title' => 'user_report_delete',
            ],
            [
                'id'    => 151,
                'title' => 'user_report_access',
            ],
            [
                'id'    => 152,
                'title' => 'product_report_create',
            ],
            [
                'id'    => 153,
                'title' => 'product_report_edit',
            ],
            [
                'id'    => 154,
                'title' => 'product_report_show',
            ],
            [
                'id'    => 155,
                'title' => 'product_report_delete',
            ],
            [
                'id'    => 156,
                'title' => 'product_report_access',
            ],
            [
                'id'    => 157,
                'title' => 'order_payment_create',
            ],
            [
                'id'    => 158,
                'title' => 'order_payment_edit',
            ],
            [
                'id'    => 159,
                'title' => 'order_payment_show',
            ],
            [
                'id'    => 160,
                'title' => 'order_payment_delete',
            ],
            [
                'id'    => 161,
                'title' => 'order_payment_access',
            ],
            [
                'id'    => 162,
                'title' => 'payment_report_create',
            ],
            [
                'id'    => 163,
                'title' => 'payment_report_edit',
            ],
            [
                'id'    => 164,
                'title' => 'payment_report_show',
            ],
            [
                'id'    => 165,
                'title' => 'payment_report_delete',
            ],
            [
                'id'    => 166,
                'title' => 'payment_report_access',
            ],
            [
                'id'    => 167,
                'title' => 'total_inventory_create',
            ],
            [
                'id'    => 168,
                'title' => 'total_inventory_edit',
            ],
            [
                'id'    => 169,
                'title' => 'total_inventory_show',
            ],
            [
                'id'    => 170,
                'title' => 'total_inventory_delete',
            ],
            [
                'id'    => 171,
                'title' => 'total_inventory_access',
            ],
            [
                'id'    => 172,
                'title' => 'store_access',
            ],
            [
                'id'    => 173,
                'title' => 'product_review_create',
            ],
            [
                'id'    => 174,
                'title' => 'product_review_edit',
            ],
            [
                'id'    => 175,
                'title' => 'product_review_show',
            ],
            [
                'id'    => 176,
                'title' => 'product_review_delete',
            ],
            [
                'id'    => 177,
                'title' => 'product_review_access',
            ],
            [
                'id'    => 178,
                'title' => 'review_reply_create',
            ],
            [
                'id'    => 179,
                'title' => 'review_reply_edit',
            ],
            [
                'id'    => 180,
                'title' => 'review_reply_show',
            ],
            [
                'id'    => 181,
                'title' => 'review_reply_delete',
            ],
            [
                'id'    => 182,
                'title' => 'review_reply_access',
            ],
            [
                'id'    => 183,
                'title' => 'product_request_create',
            ],
            [
                'id'    => 184,
                'title' => 'product_request_edit',
            ],
            [
                'id'    => 185,
                'title' => 'product_request_show',
            ],
            [
                'id'    => 186,
                'title' => 'product_request_delete',
            ],
            [
                'id'    => 187,
                'title' => 'product_request_access',
            ],
            [
                'id'    => 188,
                'title' => 'product_variation_create',
            ],
            [
                'id'    => 189,
                'title' => 'product_variation_edit',
            ],
            [
                'id'    => 190,
                'title' => 'product_variation_show',
            ],
            [
                'id'    => 191,
                'title' => 'product_variation_delete',
            ],
            [
                'id'    => 192,
                'title' => 'product_variation_access',
            ],
            [
                'id'    => 193,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
