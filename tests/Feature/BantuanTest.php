<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Bantuan;

class BantuanTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the form page is accessible and registers correct content.
     */
    public function test_form_page_is_accessible(): void
    {
        $response = $this->get('/bantuan?kategori=bullying');
        $response->assertStatus(200);
        $response->assertSee('Pusat Bantuan Pelajar');
        $response->assertSee('Bullying & Perundungan', false);
    }

    /**
     * Test validation fails on invalid submissions.
     */
    public function test_form_submission_validation_fails(): void
    {
        $response = $this->post('/bantuan', [
            'kategori_masalah' => 'Invalid Category',
            'tingkat_sekolah' => 'SMP / MTs',
            'email' => 'not-an-email',
            'asal_ranting' => '',
            'message' => '',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['kategori_masalah', 'email', 'asal_ranting', 'message']);
    }

    /**
     * Test successful form submission.
     */
    public function test_form_submits_successfully(): void
    {
        $response = $this->post('/bantuan', [
            'kategori_masalah' => 'Kekerasan Seksual & Pelecehan',
            'tingkat_sekolah' => 'SMA / SMK / MA',
            'email' => 'ipmawati@example.com',
            'asal_ranting' => 'Ranting SMA Muhammadiyah',
            'message' => 'Saya butuh bantuan khusus remaja putri.',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('bantuans', [
            'kategori_masalah' => 'Kekerasan Seksual & Pelecehan',
            'email' => 'ipmawati@example.com',
            'asal_ranting' => 'Ranting SMA Muhammadiyah',
        ]);
    }

    /**
     * Test admin page requires authentication.
     */
    public function test_admin_page_requires_authentication(): void
    {
        $response = $this->get('/admin/bantuan');
        $response->assertRedirect('/login');
    }

    /**
     * Test authenticated admin can see submissions and delete them.
     */
    public function test_admin_can_view_and_delete_submissions(): void
    {
        // Create an admin user
        $admin = User::create([
            'name' => 'Admin Test',
            'email' => 'admin-test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Create a dummy submission
        $submission = Bantuan::create([
            'kategori_masalah' => 'Bullying & Perundungan',
            'tingkat_sekolah' => 'Lainnya',
            'email' => null,
            'asal_ranting' => 'Ranting Cileungsi',
            'message' => 'Laporan anonim mengenai bullying.',
        ]);

        // Access index as admin
        $response = $this->actingAs($admin)->get('/admin/bantuan');
        $response->assertStatus(200);
        $response->assertSee('Laporan anonim mengenai bullying.');

        // Delete the submission
        $response = $this->actingAs($admin)->delete('/admin/bantuan/' . $submission->id);
        $response->assertStatus(302);
        $response->assertRedirect('/admin/bantuan');
        $response->assertSessionHas('success', 'Laporan berhasil dihapus.');

        $this->assertDatabaseMissing('bantuans', [
            'id' => $submission->id,
        ]);
    }
}
