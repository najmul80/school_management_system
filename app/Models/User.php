<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    private static $admin, $image, $imageName, $imageUrl, $directory;

    public static function storeData($request){
        self::$admin = new User();
        self::$admin->name = $request->name;
        self::$admin->email = $request->email;
        self::$admin->password = bcrypt($request->password);
        self::$admin->usertype = $request->usertype;
        self::$admin->save();
    }

    public static function updateData($request, $id){
        self::$admin = User::find($id);
        self::$admin->name = $request->name;
        self::$admin->email = $request->email;
        self::$admin->usertype = $request->usertype;
        self::$admin->save();
    }

    public static function deleteData($id){
        self::$admin = User::find($id);
        self::$admin->delete();
    }
    
    public static function profileData($request){
        $id = Auth::user()->id;
        self::$admin = User::find($id);
        self::$admin->name = $request->name;
        self::$admin->email = $request->email;
        self::$admin->mobile = $request->mobile;
        self::$admin->address = $request->address;
        // self::$admin->image = self::imageLink($request);

        if ($request->file('image')) {
            if (file_exists(self::$admin->image)) {
                unlink(self::$admin->image);
            }
            self::$admin->image = self::imageLink($request);
        } else {
            self::$imageUrl = self::$admin->image;
        }
        self::$admin->image = self::$imageUrl;
        self::$admin->save();
    }

    public static function imageLink($request)
    {
        self::$image = $request->file('image');
        self::$imageName = rand(11111, 99999) . '.' . self::$image->getClientOriginalExtension();
        self::$directory = 'storage/upload/user_image/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }
    
}
