<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskStatusControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var bool
     */
    protected $seed = true;

    public function setUp(): void
    {
        parent::setUp();

        /* @phpstan-ignore-next-line */
        $user = User::find(1);
        $this->actingAs($user);
    }

    public function testIndex(): void
    {
        $response = $this->get('task_statuses');
        $response->assertStatus(200);
        $response->assertSeeText('Статусы');
    }

    public function testCreate(): void
    {
        $response = $this->get('/task_statuses/create');
        $response->assertStatus(200);
        $response->assertSeeText('Создать');
    }

    public function testStore(): void
    {
        $requestData = ['name' => 'Тестовый статус'];
        $response = $this->post('/task_statuses', $requestData);
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertRedirect('/task_statuses');
        $this->assertDatabaseHas('task_statuses', $requestData);
    }

    public function testEdit(): void
    {
        $response = $this->get('/task_statuses/1/edit');
        $response->assertStatus(200);
        $response->assertSeeText('Изменение статуса');
    }

    public function testUpdate(): void
    {
        $requestData = ['name' => 'Обновленный статус'];

        $response = $this->patch('/task_statuses/1', $requestData);
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertRedirect('/task_statuses');
        $this->assertDatabaseHas('task_statuses', [
            'id' => 1,
            'name' => 'Обновленный статус'
        ]);
    }

    public function testDestroy(): void
    {
        $response = $this->delete('/task_statuses/1');
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertRedirect('/task_statuses');
        $this->assertDatabaseMissing('task_statuses', [
            'id' => 1
        ]);
    }
}
