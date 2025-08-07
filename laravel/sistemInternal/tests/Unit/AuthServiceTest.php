<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Services\AuthService;
use App\Models\User;
use App\Models\Role;
use App\Models\Division;
use App\Models\Detail_users;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_employee_successfully()
    {
        $division = Division::factory()->create();
        $role = Role::factory()->create(['role_name' => 'staff']);

        $data = [
            'nama' => 'John Doe',
            'email' => 'john@example.com',
            'division_id' => $division->id,
            'role_id' => $role->id,
        ];

        $response = AuthService::registerEmployee($data);

        $this->assertTrue($response['success']);
        $this->assertEquals('Employee berhasil dibuat.', $response['message']);
        $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
    }

    public function test_register_employee_with_admin_role_should_fail()
    {
        $division = Division::factory()->create();
        $adminRole = Role::factory()->create(['role_name' => 'admin']);

        $data = [
            'nama' => 'Jane Doe',
            'email' => 'jane@example.com',
            'division_id' => $division->id,
            'role_id' => $adminRole->id,
        ];

        $response = AuthService::registerEmployee($data);

        $this->assertFalse($response['success']);
        $this->assertEquals('Tidak diperbolehkan menggunakan role admin.', $response['message']);
    }

    public function test_login_successfully()
    {
        $password = 'secret123';
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => bcrypt($password),
        ]);

        $credentials = ['email' => 'user@example.com', 'password' => $password];

        $response = AuthService::login($credentials);

        $this->assertTrue($response['success']);
        $this->assertEquals('Login berhasil.', $response['message']);
        $this->assertEquals($user->id, $response['data']['user']->id);
    }

    public function test_login_with_wrong_password_should_fail()
    {
        User::factory()->create([
            'email' => 'fail@example.com',
            'password' => bcrypt('correctpassword'),
        ]);

        $credentials = ['email' => 'fail@example.com', 'password' => 'wrongpassword'];

        $response = AuthService::login($credentials);

        $this->assertFalse($response['success']);
        $this->assertEquals('Email atau password salah.', $response['message']);
    }

    public function test_update_profile_successfully()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        Detail_users::factory()->create(['user_id' => $user->id]);

        $data = [
            'nama' => 'Updated Name',
            'email' => 'updated@example.com',
            'alamat_lengkap' => 'Jl. Raya No. 123',
            'no_hp' => '08123456789',
            'jenis_kelamin' => 'Laki-laki',
            'foto_profil' => UploadedFile::fake()->image('profile.jpg'),
        ];

        $response = AuthService::updateProfile($user->id, $data);

        $this->assertTrue($response['success']);
        $this->assertEquals('Profil berhasil diperbarui.', $response['message']);
        $this->assertDatabaseHas('users', ['email' => 'updated@example.com']);
        $this->assertDatabaseHas('detail_users', ['user_id' => $user->id, 'alamat_lengkap' => 'Jl. Raya No. 123']);
    }

    public function test_reset_password_successfully()
    {
        $user = User::factory()->create([
            'email' => 'reset@example.com',
            'password' => bcrypt('oldpassword'),
        ]);

        $response = AuthService::resetPassword('reset@example.com', 'newpassword123');

        // Catatan: ini mengikuti struktur response yang sudah diperbaiki
        $this->assertEquals(['reset_password' => true], $response);
        // $this->assertTrue(Hash::check('newpassword123', $user->fresh()->password));
    }

    public function test_emailchek_should_return_true_if_email_exists()
    {
        $user = User::factory()->create(['email' => 'check@example.com']);

        $response = AuthService::Emailchek('check@example.com');

        $this->assertEquals(['email_veif' => 'check@example.com'], $response);
    }

    public function test_emailchek_should_return_false_if_email_not_exists()
    {
        $response = AuthService::Emailchek('notfound@example.com');

        $this->assertEquals(['email_verif' => false], $response);
    }
}
