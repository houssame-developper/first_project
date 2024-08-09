<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function isAdmin():bool{
        return $this->hasRole('admin');
    }
    public function isEditor():bool{
        return $this->hasRole('editor');
    }
    private function hasRole(string $role):bool{
return $this->getAttribute('role') === $role;
    }
 
   public function getRedirectRoute() {
       if($this->isEditor()){
return 'editor_dashboard';
       } else if($this->isAdmin()){
        return 'admin_dashboard';
 }
 return RouteServiceProvider::$HOME;
}
}
