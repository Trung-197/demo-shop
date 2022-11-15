<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::before(function ($user, $ability) {
            if ($user->email == 'superadmin@gmail.com') {
                return true;
            }
        });

        Gate::define('category-list',function ($user)
        {
            return $user->checkPermissionAccess(config('permissions.access.category-list'));
        });

        Gate::define('category-create',function ($user)
        {
            return $user->checkPermissionAccess('category_create');
        });
        Gate::define('category-edit',function ($user)
        {
            return $user->checkPermissionAccess(config('category_edit'));
        });
        Gate::define('category-delete',function ($user)
        {
            return $user->checkPermissionAccess(config('category_delete'));
        });
        Gate::define('menu-list',function ($user)
        {
            return $user->checkPermissionAccess(config('permissions.access.menu-list'));
        });
        Gate::define('product-list',function ($user)
        {
            return $user->checkPermissionAccess(config('permissions.access.product-list'));
        });
        Gate::define('product-create',function ($user)
        {
            return $user->checkPermissionAccess(config('product_create'));
        });
        Gate::define('product-edit',function ($user)
        {
            return $user->checkPermissionAccess(config('product_edit'));
        });
        Gate::define('product-delete',function ($user)
        {
            return $user->checkPermissionAccess(config('product_delete'));
        });
        Gate::define('slider-list',function ($user)
        {
            return $user->checkPermissionAccess(config('permissions.access.slider-list'));
        });
        Gate::define('slider-create',function ($user)
        {
            return $user->checkPermissionAccess(config('slider_create'));
        });
        Gate::define('slider-edit',function ($user)
        {
            return $user->checkPermissionAccess(config('slider_edit'));
        });
        Gate::define('slider-delete',function ($user)
        {
            return $user->checkPermissionAccess(config('slider_delete'));
        });
        Gate::define('setting-list',function ($user)
        {
            return $user->checkPermissionAccess(config('permissions.access.setting-list'));
        });
        Gate::define('setting-create',function ($user)
        {
            return $user->checkPermissionAccess(config('setting_create'));
        });
        Gate::define('setting-edit',function ($user)
        {
            return $user->checkPermissionAccess(config('setting_edit'));
        });
        Gate::define('setting-delete',function ($user)
        {
            return $user->checkPermissionAccess(config('setting_delete'));
        });
        Gate::define('role-list',function ($user)
        {
            return $user->checkPermissionAccess(config('permissions.access.role-list'));
        });
        Gate::define('role-create',function ($user)
        {
            return $user->checkPermissionAccess(config('role_create'));
        });
        Gate::define('role-edit',function ($user)
        {
            return $user->checkPermissionAccess(config('role_edit'));
        });
        Gate::define('role-delete',function ($user)
        {
            return $user->checkPermissionAccess(config('role_delete'));
        });
        Gate::define('permission-create',function ($user)
        {
            return $user->checkPermissionAccess(config('permission_create'));
        });
    }
}
