## 1. Conventions
### 1.1. Naming Conventions
Controllers: PascalCase for controller names. For example, UserController, ProfileController.
Models: Use PascalCase for model names. For example, User, Profile.
Views: snake_case for view filenames. For example, user_profile.blade.php.
Variables and Methods:camelCase for variables and method names. For example, $userName, getUserProfile().
Database Tables: snake_case and plural names for database tables. For example, users, user_profiles.
Route Names: Use snake_case for route names. For example, admin_dashboard, user_profile.
### 1.2. Commenting
Single-Line Comments:// for single-line comments. Place these above the line of code they describe.

Multi-Line Comments: /* */ for multi-line comments, especially for documenting methods or complex logic.

DocBlocks:  PHPDoc for documenting classes, methods, and properties. This helps with IDE autocompletion and API documentation generation.

## 2. Code Examples
### 2.1. Controllers
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function showProfile()
    {
        $user = auth()->user();
        return view('user.profile', compact('user'));
    }

    /**
     * Update the user's profile.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $user->update($request->all());
        return redirect()->back()->with('status', 'Profile updated!');
    }
}
## 2.2. Models
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    /**
     * Get the user's profile.
     */
    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    /**
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
## 2.3. Views
@extends('layouts.app')

@section('content')
    <x-header title="User Profile" />

    <div class="container">
        @include('partials.profile-card', ['user' => $user])

        <form action="{{ route('user.profile.update') }}" method="POST">
            @csrf
            <x-input label="Name" name="name" :value="$user->name" />
            <x-input label="Email" name="email" :value="$user->email" />

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
@endsection
## 3. Testing Standards
Unit Testing
Feature Testing
Test Coverage
// Good Example: A basic unit test for User model.
namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function it_checks_if_user_is_active()
    {
        $user = User::factory()->create(['is_active' => true]);
        $this->assertTrue($user->is_active);
    }
}