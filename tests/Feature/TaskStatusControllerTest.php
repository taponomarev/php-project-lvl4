<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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

        $user = User::find(1);
        $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->get('task_statuses');
        $response->assertStatus(200);
        $response->assertSeeText('Статусы');
    }

    public function testCreate()
    {
        $response = $this->get('/task_statuses/create');
        $response->assertStatus(200);
        $response->assertSeeText('Добавить статус');
    }

    public function testStore()
    {
        $requestData = ['name' => 'Тестовый статус'];
        $response = $this->post('/task_statuses', $requestData);
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertRedirect('/task_statuses');
        $this->assertDatabaseHas('task_statuses', $requestData);
    }

    public function testEdit()
    {
        $response = $this->get('/task_statuses/1/edit');
        $response->assertStatus(200);
        $response->assertSeeText('Изменить статус');
    }

    public function testUpdate()
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

    public function testDestroy()
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
