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

    private static $admin, $discount, $assignStudent, $student, $image, $imageName, $imageUrl, $directory;

    public static function storeData($request){
        self::$admin = new User();
        $code = rand(0000,9999);
        self::$admin->code = $code;
        self::$admin->role = $request->role;
        self::$admin->name = $request->name;
        self::$admin->email = $request->email;
        self::$admin->password = bcrypt($code);
        self::$admin->usertype = 'Admin';
        self::$admin->save();
    }

    public static function updateData($request, $id){
        self::$admin = User::find($id);
        self::$admin->role = $request->role;
        self::$admin->name = $request->name;
        self::$admin->email = $request->email;
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

    
    public static function stdRegDataStore($request, $std_auto_id)
    {
        self::$student = new User();
        $code = rand(00000,99999);
        self::$student->code = $code;
        self::$student->id_no = $std_auto_id;
        self::$student->password = bcrypt($code);
        self::$student->usertype = 'Student';
        self::$student->name = $request->name;
        self::$student->email = $request->email;
        self::$student->mobile = $request->mobile;
        self::$student->address = $request->address;
        self::$student->fname = $request->fname;
        self::$student->mname = $request->mname;
        self::$student->gender = $request->gender;
        self::$student->religion = $request->religion;
        self::$student->dob = date('Y-m-d',strtotime($request->dob));
        self::$student->image = self::stdImage($request);
        self::$student->save();

        self::$assignStudent = new AssignStudent();
        self::$assignStudent->student_id = self::$student->id;
        self::$assignStudent->year_id = $request->year_id;
        self::$assignStudent->class_id = $request->class_id;
        self::$assignStudent->shift_id = $request->shift_id;
        self::$assignStudent->group_id = $request->group_id;
        self::$assignStudent->save();

        self::$discount = new DiscountStudent();
        self::$discount->assign_student_id = self::$assignStudent->id;
        self::$discount->fee_category_id = 1;
        self::$discount->discount = $request->discount;
        self::$discount->save();
    }

    public static function stdRegDataUpdate($request, $id)
    {
        self::$student = User::where('id', $id)->first();
        self::$student->name = $request->name;
        self::$student->email = $request->email;
        self::$student->mobile = $request->mobile;
        self::$student->address = $request->address;
        self::$student->fname = $request->fname;
        self::$student->mname = $request->mname;
        self::$student->gender = $request->gender;
        self::$student->religion = $request->religion;
        self::$student->dob = date('Y-m-d',strtotime($request->dob));
        // image upload
        if ($request->file('image')) {
            if (file_exists(self::$student->image)) {
                unlink(self::$student->image);
            }
            self::$student->image = self::imageLink($request);
        } else {
            self::$imageUrl = self::$student->image;
        }

        self::$student->image = self::$imageUrl;
        self::$student->save();

        self::$assignStudent = AssignStudent::where(['id'=>$request->id, 'student_id'=>$id])->first();
        self::$assignStudent->year_id = $request->year_id;
        self::$assignStudent->class_id = $request->class_id;
        self::$assignStudent->shift_id = $request->shift_id;
        self::$assignStudent->group_id = $request->group_id;
        self::$assignStudent->save();

        self::$discount = DiscountStudent::where('assign_student_id',$request->id)->first();
        self::$discount->discount = $request->discount;
        self::$discount->save();
    }
    
    public static function stdPromotion($request, $id)
    {
        self::$student = User::where('id', $id)->first();
        self::$student->name = $request->name;
        self::$student->email = $request->email;
        self::$student->mobile = $request->mobile;
        self::$student->address = $request->address;
        self::$student->fname = $request->fname;
        self::$student->mname = $request->mname;
        self::$student->gender = $request->gender;
        self::$student->religion = $request->religion;
        self::$student->dob = date('Y-m-d',strtotime($request->dob));
        // image upload
        if ($request->file('image')) {
            if (file_exists(self::$student->image)) {
                unlink(self::$student->image);
            }
            self::$student->image = self::imageLink($request);
        } else {
            self::$imageUrl = self::$student->image;
        }

        self::$student->image = self::$imageUrl;
        self::$student->save();

        self::$assignStudent = new AssignStudent();
        self::$assignStudent->student_id = $id;
        self::$assignStudent->year_id = $request->year_id;
        self::$assignStudent->class_id = $request->class_id;
        self::$assignStudent->shift_id = $request->shift_id;
        self::$assignStudent->group_id = $request->group_id;
        self::$assignStudent->save();

        self::$discount = new DiscountStudent();
        self::$discount->assign_student_id = self::$assignStudent->id;
        self::$discount->fee_category_id = 1;
        self::$discount->discount = $request->discount;
        self::$discount->save();
    }

    public static function stdImage($request)
    {
        self::$image = $request->file('image');
        self::$imageName = rand(11111, 99999) . '.' . self::$image->getClientOriginalExtension();
        self::$directory = 'storage/upload/students_image/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }
    
}
