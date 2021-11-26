<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

Auth::routes();

// Route::get('/home', [
//     App\Http\Controllers\HomeController::class,
//     'index',
// ])->name('home');

Route::get('/', [AuthController::class, 'logins'])->name('backend.login');
Route::get('/registers', [AuthController::class, 'showRegister'])->name(
    'showRegister'
);
Route::post('registers', [AuthController::class, 'registers'])->name(
    'registers'
);

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

        Route::get('admin_profile_update', [
            AdminSettingsController::class,
            'admin_profile_update',
        ])->name('admin.profil.update');

        Route::put('admin_password_update', [
            AdminSettingsController::class,
            'admin_password_update',
        ])->name('admin.password.update');

        // CMS tentang kami
        Route::get('admin_tentangkami', [
            AdminCompanyController::class,
            'admin_tentangkami',
        ])->name('admin.admin_tentangkami');

        Route::get('admin_edit_tentangkami/{id}/edit', [
            AdminCompanyController::class,
            'admin_edit_tentangkami',
        ])->name('admin_edit_tentangkami');

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

Route::group(
    [
        'as' => 'customer.',
        'prefix' => 'customer',
        'namespace' => 'Customer',
        'middleware' => ['auth', 'customer'],
    ],
    function () {
        Route::get('customer/dashboard', [
            CustomerController::class,
            'index',
        ])->name('customer.dashboard');
    }
);

Route::group(
    [
        'as' => 'reseler.',
        'prefix' => 'reseler',
        'namespace' => 'Reseler',
        'middleware' => ['auth', 'reseler'],
    ],
    function () {
        Route::get('reseler/dashboard', [
            ReselerController::class,
            'index',
        ])->name('reseler.dashboard');
    }
);

Route::group(
    [
        'as' => 'afiliate.',
        'prefix' => 'afiliate',
        'namespace' => 'Afiliate',
        'middleware' => ['auth', 'afiliate'],
    ],
    function () {
        Route::get('afiliate/dashboard', [
            AfiliateController::class,
            'index',
        ])->name('afiliate.dashboard');
    }
);
