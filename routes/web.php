<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;

/**
 * FOR SUPER ADMIN
 */
use App\Http\Controllers\SuperAdmin\SuperAdminDashboardController;
use App\Http\Controllers\SuperAdmin\UsersActivityController;
use App\Http\Controllers\SuperAdmin\BlogController;

/**
 * FOR ADMIN
 */
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\AdminCompanyController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\AdminKategoriController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\PromosiController;
use App\Http\Controllers\Admin\BuyerDiskonController;
/**
 * For Buyer
 */

use App\Http\Controllers\Buyer\BuyerDashboardController;
/**
 * For customer
 */
use App\Http\Controllers\Customer\CustomerController;

/**
 * For reseler
 */
use App\Http\Controllers\Reseler\ReselerController;

/**
 * For afiliate
 */
use App\Http\Controllers\Afiliate\AfiliateController;

use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('/adminlogin', [AuthController::class, 'logins'])->name(
    'backend.login'
);

Route::get('/registers', [AuthController::class, 'showRegister'])->name(
    'showRegister'
);
Route::post('registers', [AuthController::class, 'registers'])->name(
    'registers'
);

/**
 * Register Buyer
 */
Route::get('register_reseller', [
    AuthController::class,
    'register_reseller',
])->name('register_reseller');

Route::get('register_distributor', [
    AuthController::class,
    'register_distributor',
])->name('register_distributor');

Route::get('register_customer', [
    AuthController::class,
    'register_customer',
])->name('register_customer');

Route::post('register_buyer', [AuthController::class, 'register_buyer'])->name(
    'register_buyer'
);

// coba

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('blog', [HomeController::class, 'show_blog'])->name('show_blog');
Route::get('blog_detail/{id}/blog', [
    HomeController::class,
    'blog_detail',
])->name('blog_detail');

Route::get('tentang_kami', [HomeController::class, 'tentang_kami'])->name(
    'tentang_kami'
);
Route::get('kontak', [HomeController::class, 'kontak'])->name('kontak');

Route::get('show_shop', [ShopController::class, 'show_shop'])->name(
    'show_shop'
);

Route::get('detail_shop/{id}/detail/{id_category_item}', [
    ShopController::class,
    'detail_shop',
])->name('detail_shop');

Route::post('add_cart', [ShopController::class, 'add_cart'])->name('add_cart');
Route::get('show_cart', [ShopController::class, 'show_cart'])->name(
    'show_cart'
);
Route::get('remove_cart/{id}', [ShopController::class, 'remove_cart'])->name(
    'remove_cart'
);

Route::post('proses_pembayaran', [
    ShopController::class,
    'proses_pembayaran',
])->name('proses_pembayaran');

/**
 * Kontak us
 */
Route::post('store_kontak_us', [
    HomeController::class,
    'store_kontak_us',
])->name('store_kontak_us');

/**
 * ADMIN GROUP
 */

Route::group(
    [
        'as' => 'admin.',
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'middleware' => ['auth', 'admin'],
    ],
    function () {
        /**
         * Promosi Pengenalan
         */
        Route::get('promosi_pengenalan', [
            PromosiController::class,
            'promosi_pengenalan',
        ])->name('promosi_pengenalan');
        Route::get('create_promosi_pengenalan', [
            PromosiController::class,
            'create_promosi_pengenalan',
        ])->name('create_promosi_pengenalan');
        Route::post('store_promosi_pengenalan', [
            PromosiController::class,
            'store_promosi_pengenalan',
        ])->name('store_promosi_pengenalan');
        Route::get('edit_promosi_pengenalan/{id}/edit', [
            PromosiController::class,
            'edit_promosi_pengenalan',
        ])->name('edit_promosi_pengenalan');
        Route::put('update_promosi_pengenalan/{id}/update', [
            PromosiController::class,
            'update_promosi_pengenalan',
        ])->name('update_promosi_pengenalan');

        Route::delete('delete_promosi_pengenalan/{id}/delete', [
            PromosiController::class,
            'delete_promosi_pengenalan',
        ])->name('delete_promosi_pengenalan');

        /**
         * Promosi
         */
        Route::get('promosi', [PromosiController::class, 'promosi'])->name(
            'promosi'
        );

        /**
         * Testimoni
         */
        Route::get('create_testimoni', [
            PromosiController::class,
            'create_testimoni',
        ])->name('create_testimoni');

        Route::post('store_testimoni', [
            PromosiController::class,
            'store_testimoni',
        ])->name('store_testimoni');
        Route::get('edit_testimoni/{id}/edit', [
            PromosiController::class,
            'edit_testimoni',
        ])->name('edit_testimoni');
        Route::put('update_testimoni/{id}/update', [
            PromosiController::class,
            'update_testimoni',
        ])->name('update_testimoni');
        Route::delete('delete_testimoni/{id}/delete', [
            PromosiController::class,
            'delete_testimoni',
        ])->name('delete_testimoni');

        /**
         * Video
         */
        Route::get('create_video', [
            PromosiController::class,
            'create_video',
        ])->name('create_video');

        Route::post('store_video', [
            PromosiController::class,
            'store_video',
        ])->name('store_video');
        Route::get('edit_video/{id}/edit', [
            PromosiController::class,
            'edit_video',
        ])->name('edit_video');
        Route::put('update_video/{id}/update', [
            PromosiController::class,
            'update_video',
        ])->name('update_video');
        Route::delete('delete_video/{id}/delete', [
            PromosiController::class,
            'delete_video',
        ])->name('delete_video');

        //Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', [
            AdminDashboardController::class,
            'index',
        ])->name('dashboard');

        /**
         * admin setting
         */
        Route::get('admin_settings', [
            AdminSettingsController::class,
            'index',
        ])->name('admin.settings');

        Route::put('admin_profile_update', [
            AdminSettingsController::class,
            'admin_profile_update',
        ])->name('admin.profil.update');

        Route::get('admin_profile', [
            AdminSettingsController::class,
            'admin_profile',
        ])->name('admin.profile');

        Route::put('admin_password_update', [
            AdminSettingsController::class,
            'admin_password_update',
        ])->name('admin.password.update');
        /**
         * Diskon
         */
        Route::get('show_buyer_diskon', [
            BuyerDiskonController::class,
            'show_buyer_diskon',
        ])->name('show_buyer_diskon');

        Route::get('create_buyer_diskon', [
            BuyerDiskonController::class,
            'create_buyer_diskon',
        ])->name('create_buyer_diskon');
        Route::post('store_buyer_diskon', [
            BuyerDiskonController::class,
            'store_buyer_diskon',
        ])->name('store_buyer_diskon');
        Route::get('edit_buyer_diskon/{id}/edit', [
            BuyerDiskonController::class,
            'edit_buyer_diskon',
        ])->name('edit_buyer_diskon');
        Route::put('update_buyer_diskon/{id}/update', [
            BuyerDiskonController::class,
            'update_buyer_diskon',
        ])->name('update_buyer_diskon');
        Route::delete('delete_buyer_diskon/{id}/delete', [
            BuyerDiskonController::class,
            'delete_buyer_diskon',
        ])->name('delete_buyer_diskon');

        /**
         * KOntak us
         */
        Route::get('kontak_us', [
            AdminCompanyController::class,
            'kontak_us',
        ])->name('kontak_us');
        Route::delete('delete_kontak_us/{id}/delete', [
            AdminCompanyController::class,
            'delete_kontak_us',
        ])->name('delete_kontak_us');

        /**
         * Tentang Kami (FOUNDER)
         */
        Route::get('admin_tentangkami', [
            AdminCompanyController::class,
            'admin_tentangkami',
        ])->name('admin_tentangkami');

        Route::get('add_admin_tentangkami', [
            AdminCompanyController::class,
            'add_admin_tentangkami',
        ])->name('add_admin_tentangkami');

        Route::post('store_admin_tentangkami', [
            AdminCompanyController::class,
            'store_admin_tentangkami',
        ])->name('store_admin_tentangkami');

        Route::get('admin_edit_tentangkami/{id}/edit', [
            AdminCompanyController::class,
            'admin_edit_tentangkami',
        ])->name('admin_edit_tentangkami');

        Route::put('update_admin_tentangkami/{id}/update', [
            AdminCompanyController::class,
            'update_admin_tentangkami',
        ])->name('update_admin_tentangkami');

        Route::delete('delete_admin_tentangkami/{id}/delete', [
            AdminCompanyController::class,
            'delete_admin_tentangkami',
        ])->name('delete_admin_tentangkami');

        /**
         * Tentang Kami (HISTORI)
         */

        Route::get('admin_histori_tentangkami', [
            AdminCompanyController::class,
            'admin_histori_tentangkami',
        ])->name('admin_histori_tentangkami');

        Route::get('create_histori_admin_tentangkami', [
            AdminCompanyController::class,
            'create_histori_admin_tentangkami',
        ])->name('create_histori_admin_tentangkami');

        Route::post('store_histori_admin_tentangkami', [
            AdminCompanyController::class,
            'store_histori_admin_tentangkami',
        ])->name('store_histori_admin_tentangkami');

        Route::get('edit_histori_tentangkami/{id}/edit', [
            AdminCompanyController::class,
            'edit_histori_tentangkami',
        ])->name('edit_histori_tentangkami');

        Route::put('update_histori_admin_tentangkami/{id}/update', [
            AdminCompanyController::class,
            'update_histori_admin_tentangkami',
        ])->name('update_histori_admin_tentangkami');

        Route::delete('delete_histori_admin_tentangkami/{id}/delete', [
            AdminCompanyController::class,
            'delete_histori_admin_tentangkami',
        ])->name('delete_histori_admin_tentangkami');
        /**
         * VISI & MISI
         */

        Route::get('admin_visimisi', [
            AdminCompanyController::class,
            'admin_visimisi',
        ])->name('admin_visimisi');

        Route::get('create_admin_visimisi', [
            AdminCompanyController::class,
            'create_admin_visimisi',
        ])->name('create_admin_visimisi');

        Route::post('store_admin_visimisi', [
            AdminCompanyController::class,
            'store_admin_visimisi',
        ])->name('store_admin_visimisi');

        Route::get('edit_admin_visimisi/{id}/edit', [
            AdminCompanyController::class,
            'edit_admin_visimisi',
        ])->name('edit_admin_visimisi');

        Route::put('update_admin_visimisi/{id}/update', [
            AdminCompanyController::class,
            'update_admin_visimisi',
        ])->name('update_admin_visimisi');

        Route::delete('delete_admin_visimisi/{id}/delete', [
            AdminCompanyController::class,
            'delete_admin_visimisi',
        ])->name('delete_admin_visimisi');

        // CMS KONTAK

        Route::get('admin_kontak', [
            AdminCompanyController::class,
            'admin_kontak',
        ])->name('admin_kontak');

        Route::get('add_admin_kontak', [
            AdminCompanyController::class,
            'add_admin_kontak',
        ])->name('add_admin_kontak');

        Route::post('store_admin_kontak', [
            AdminCompanyController::class,
            'store_admin_kontak',
        ])->name('store_admin_kontak');

        Route::get('admin_kontak/{id}/edit', [
            AdminCompanyController::class,
            'edit_admin_kontak',
        ])->name('edit_admin_kontak');

        Route::put('updt_admin_kontak/{id}/update', [
            AdminCompanyController::class,
            'update_admin_kontak',
        ])->name('update_admin_kontak');

        Route::delete('delete_admin_kontak/{id}/delete', [
            AdminCompanyController::class,
            'delete_admin_kontak',
        ])->name('delete_admin_kontak');

        /**
         * KATEGORI PRODUK
         *
         *  */

        Route::get('show_admin_kategori', [
            AdminKategoriController::class,
            'show_admin_kategori',
        ])->name('show_admin_kategori');

        Route::get('create_admin_kategori', [
            AdminKategoriController::class,
            'create_admin_kategori',
        ])->name('create_admin_kategori');

        Route::post('store_admin_kategori', [
            AdminKategoriController::class,
            'store_admin_kategori',
        ])->name('store_admin_kategori');

        Route::get('edit_admin_kategori/{id}/edit', [
            AdminKategoriController::class,
            'edit_admin_kategori',
        ])->name('edit_admin_kategori');

        Route::put('update_admin_kategori/{id}/update', [
            AdminKategoriController::class,
            'update_admin_kategori',
        ])->name('update_admin_kategori');

        Route::delete('delete_admin_kategori/{id}/delete', [
            AdminKategoriController::class,
            'delete_admin_kategori',
        ])->name('delete_admin_kategori');

        /**
         * PRODUK
         *
         *  */

        Route::get('create_admin_produk', [
            ProdukController::class,
            'create_admin_produk',
        ])->name('create_admin_produk');

        Route::get('show_admin_produk', [
            ProdukController::class,
            'show_admin_produk',
        ])->name('show_admin_produk');

        Route::post('store_admin_produk', [
            ProdukController::class,
            'store_admin_produk',
        ])->name('store_admin_produk');

        Route::get('edit_admin_produk/{id}/edit', [
            ProdukController::class,
            'edit_admin_produk',
        ])->name('edit_admin_produk');

        Route::put('update_admin_produk/{id}/update', [
            ProdukController::class,
            'update_admin_produk',
        ])->name('update_admin_produk');

        Route::put('update_admin_img_produk/{id}/update', [
            ProdukController::class,
            'update_admin_img_produk',
        ])->name('update_admin_img_produk');

        Route::delete('delete_admin_produk/{id}/delete', [
            ProdukController::class,
            'delete_admin_produk',
        ])->name('delete_admin_produk');

        /**
         * Transaksi
         */
        Route::get('admin_transaksi', [
            ProdukController::class,
            'admin_transaksi',
        ])->name('admin_transaksi');

        Route::get('update_status_prepare/{id}/update', [
            ProdukController::class,
            'update_status_prepare',
        ])->name('update_status_prepare');

        Route::get('update_status_ondelivery/{id}/update', [
            ProdukController::class,
            'update_status_ondelivery',
        ])->name('update_status_ondelivery');

        Route::get('update_status_finished/{id}/update', [
            ProdukController::class,
            'update_status_finished',
        ])->name('update_status_finished');

        /**
         * ADMIN BLOG
         */

        Route::get('show_admin_blog', [
            AdminBlogController::class,
            'show_admin_blog',
        ])->name('show_admin_blog');

        Route::get('create_admin_blog', [
            AdminBlogController::class,
            'create_admin_blog',
        ])->name('create_admin_blog');

        Route::get('detail_admin_blog/{id}/show', [
            AdminBlogController::class,
            'detail_admin_blog',
        ])->name('detail_admin_blog');

        Route::post('store_admin_blog', [
            AdminBlogController::class,
            'store_admin_blog',
        ])->name('store_admin_blog');

        Route::get('edit_admin_blog/{id}/edit', [
            AdminBlogController::class,
            'edit_admin_blog',
        ])->name('edit_admin_blog');

        Route::put('update_admin_blog/{id}/update', [
            AdminBlogController::class,
            'update_admin_blog',
        ])->name('update_admin_blog');

        Route::delete('delete_admin_blog/{id}/delete', [
            AdminBlogController::class,
            'delete_admin_blog',
        ])->name('delete_admin_blog');

        /**
         * PENGGUNA (AFILIATE)
         *
         */
        Route::get('show_admin_afiliate', [
            PenggunaController::class,
            'show_admin_afiliate',
        ])->name('show_admin_afiliate');

        Route::get('edit_admin_afiliate/{id}/edit', [
            PenggunaController::class,
            'edit_admin_afiliate',
        ])->name('edit_admin_afiliate');

        Route::put('update_admin_afiliate/{id}/update', [
            PenggunaController::class,
            'update_admin_afiliate',
        ])->name('update_admin_afiliate');

        Route::get('ubah_status', [
            PenggunaController::class,
            'ubah_status',
        ])->name('ubah_status');

        Route::get('detail_afiliate/{id}/detail', [
            PenggunaController::class,
            'detail_afiliate',
        ])->name('detail_afiliate');

        // Route::delete('delete_admin_afiliate/{id}/delete', [
        //     AdminBlogController::class,
        //     'delete_admin_afiliate',
        // ])->name('delete_admin_afiliate');

        /**
         * PENGGUNA (RESELLER)
         *
         */
        Route::get('show_admin_reseller', [
            PenggunaController::class,
            'show_admin_reseller',
        ])->name('show_admin_reseller');

        Route::get('ubah_status_reseller', [
            PenggunaController::class,
            'ubah_status_reseller',
        ])->name('ubah_status_reseller');

        Route::get('detail_reseller/{id}/detail', [
            PenggunaController::class,
            'detail_reseller',
        ])->name('detail_reseller');
    }
);

/**
 * SUPER ADMIN GROUP
 */
Route::group(
    [
        'as' => 'superadmin.',
        'prefix' => 'superadmin',
        'namespace' => 'SuperAdmin',
        'middleware' => ['auth', 'superadmin'],
    ],
    function () {
        Route::get('dashboard', [
            SuperAdminDashboardController::class,
            'index',
        ])->name('dashboard');

        /**
         *  ADMIN
         */
        Route::get('show_user_admin', [
            UsersActivityController::class,
            'show_user_admin',
        ])->name('show_user_admin');

        Route::get('create_user_admin', [
            UsersActivityController::class,
            'create_user_admin',
        ])->name('create_user_admin');

        Route::post('store_user_admin', [
            UsersActivityController::class,
            'store_user_admin',
        ])->name('store_user_admin');

        Route::get('edit_user_admin/{id}/edit', [
            UsersActivityController::class,
            'edit_user_admin',
        ])->name('edit_user_admin');

        Route::put('update_user_admin/{id}/update', [
            UsersActivityController::class,
            'update_user_admin',
        ])->name('update_user_admin');

        Route::delete('delete_user_admin/{id}/delete', [
            UsersActivityController::class,
            'delete_user_admin',
        ])->name('delete_user_admin');

        Route::get('ubah_status_admin', [
            UsersActivityController::class,
            'ubah_status_admin',
        ])->name('ubah_status_admin');

        /**
         * BLOG
         */

        Route::get('show_superadmin_blog', [
            BlogController::class,
            'show_superadmin_blog',
        ])->name('show_superadmin_blog');

        Route::get('create_superadmin_blog', [
            BlogController::class,
            'create_superadmin_blog',
        ])->name('create_superadmin_blog');

        Route::get('detail_superadmin_blog/{id}/show', [
            BlogController::class,
            'detail_superadmin_blog',
        ])->name('detail_superadmin_blog');

        Route::post('store_superadmin_blog', [
            BlogController::class,
            'store_superadmin_blog',
        ])->name('store_superadmin_blog');

        Route::get('edit_superadmin_blog/{id}/edit', [
            BlogController::class,
            'edit_superadmin_blog',
        ])->name('edit_superadmin_blog');

        Route::put('update_superadmin_blog/{id}/update', [
            BlogController::class,
            'update_superadmin_blog',
        ])->name('update_superadmin_blog');

        Route::delete('delete_superadmin_blog/{id}/delete', [
            BlogController::class,
            'delete_superadmin_blog',
        ])->name('delete_superadmin_blog');
    }
);

/**
 * FOR BUYER
 */
Route::group(
    [
        'as' => 'buyer.',
        'prefix' => 'buyer',
        'namespace' => 'Buyer',
        'middleware' => ['auth', 'buyer', 'verified'],
    ],
    function () {
        Route::get('dashboard', [
            BuyerDashboardController::class,
            'index',
        ])->name('dashboard');

        Route::put('update_pembayaran/{id}/update', [
            BuyerDashboardController::class,
            'update_pembayaran',
        ])->name('update_pembayaran');

        Route::get('profile', [
            BuyerDashboardController::class,
            'profile',
        ])->name('profile');

        Route::put('update_profile/{id}/update', [
            BuyerDashboardController::class,
            'update_profile',
        ])->name('update_profile');

        Route::put('update_image_profile/{id}/update', [
            BuyerDashboardController::class,
            'update_image_profile',
        ])->name('update_image_profile');

        Route::put('update_katasandi', [
            BuyerDashboardController::class,
            'update_katasandi',
        ])->name('update_katasandi');
    }
);

// Route::group(
//     [
//         'as' => 'customer.',
//         'prefix' => 'customer',
//         'namespace' => 'Customer',
//         'middleware' => ['auth', 'customer'],
//     ],
//     function () {
//         Route::get('customer/dashboard', [
//             CustomerController::class,
//             'index',
//         ])->name('customer.dashboard');
//     }
// );

// Route::group(
//     [
//         'as' => 'reseler.',
//         'prefix' => 'reseler',
//         'namespace' => 'Reseler',
//         'middleware' => ['auth', 'reseler'],
//     ],
//     function () {
//         Route::get('reseler/dashboard', [
//             ReselerController::class,
//             'index',
//         ])->name('reseler.dashboard');
//     }
// );

// Route::group(
//     [
//         'as' => 'afiliate.',
//         'prefix' => 'afiliate',
//         'namespace' => 'Afiliate',
//         'middleware' => ['auth', 'afiliate'],
//     ],
//     function () {
//         Route::get('afiliate/dashboard', [
//             AfiliateController::class,
//             'index',
//         ])->name('afiliate.dashboard');
//     }
// );
