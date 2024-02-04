<?php

namespace Modules\User\app\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
use Modules\Business\app\Models\Business;
use Modules\Cart\app\Models\Cart;
use Modules\Cart\app\Models\CartItem;
use Modules\Stock\app\Models\Stock;
use Plank\Mediable\Mediable;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Billable, HasApiTokens, HasFactory, HasPermissions, HasRoles, HasUuids, Mediable, Notifiable, Searchable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'username', 'phone', 'email', 'password',
    ];

    public static function boot()
    {
        parent::boot();
        self::saving(function ($model) {
            // Set username from email (if not available).
            if (empty($model->username)) {
                $model->username = Str::slug(explode('@', $model->email, 2)[0]);
            }

            return $model;
        });
    }

    public function businesses()
    {
        return $this->hasMany(Business::class, 'created_by');
    }

    public function business()
    {
        return $this->hasOne(Business::class, 'created_by')->whereDefault(1); // where default = 1
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function cart_items()
    {
        return $this->hasManyThrough(CartItem::class, Cart::class);
    }

    public function stocks()
    {
        return $this->hasManyThrough(Stock::class, Business::class, 'created_by', 'stockable_id')->where('stocks.stockable_type', Business::class);
    }

    public function name(): Attribute
    {
        return Attribute::get(fn ($name, $attributes) => $attributes['first_name'].' '.$attributes['last_name']);
    }
}
