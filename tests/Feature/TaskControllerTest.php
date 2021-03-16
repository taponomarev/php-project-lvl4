<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class TaskControllerTest extends TestCase
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
        $response = $this->get('/tasks');

        $response->assertOk();
        $response->assertSee('Задачи');
    }

    public function testShow(): void
    {
        $response = $this->get('/tasks/1');

        $response->assertOk();
        $response->assertSee('Просмотр задачи: Тестовая задача');
        $response->assertSee('Имя: Тестовая задача');
        $response->assertSee('Статус: новый');
        $response->assertSee('Описание: Описание');
    }

    public function testCreate(): void
    {
        $response = $this->get('/tasks/create');

        $response->assertOk();
        $response->assertSee('Создать задачу');
        $response->assertSeeInOrder([
            'Имя',
            'Описание',
            'Статус',
            'Исполнитель',
            'Создать'
        ]);
    }

    public function testEdit(): void
    {
        $response = $this->get('/tasks/1/edit');

        $response->assertOk();
        $response->assertSee('Изменение задачи');
        $response->assertSeeInOrder([
            'Имя',
            'Описание',
            'Статус',
            'Исполнитель',
            'Обновить'
        ]);
    }

    public function testStore(): void
    {
        $requestData = [
            'name' => 'Тестовая задача 1',
            'description' => 'Описание задачи',
            'status_id' => 1,
            'created_by_id' => 1,
            'assigned_to_id' => null
        ];

        $response = $this->post('/tasks', ['task' => $requestData]);
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertRedirect('/tasks');
        $this->assertDatabaseHas('tasks', $requestData);
    }

    public function testUpdate(): void
    {
        $requestData = [
            'name' => 'Тестовая задача (обновленная)',
            'status_id' => 2
        ];

        $response = $this->patch('/tasks/1', ['task' => $requestData]);
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertRedirect('/tasks');
        $this->assertDatabaseHas('tasks', [
            'id' => 1,
            'name' => 'Тестовая задача (обновленная)',
            'status_id' => 2
        ]);
    }

    public function testDestroy(): void
    {
        $response = $this->delete('/tasks/1');
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertRedirect('/tasks');
        $this->assertDatabaseMissing('tasks', [
            'id' => 1
        ]);
    }

    public function testStoreWithLabels(): void
    {
        $requestData = [
            'name' => 'Тестовая задача 2',
            'description' => 'Описание задачи',
            'status_id' => 1,
            'created_by_id' => 1,
            'assigned_to_id' => null,
            'labels' => [1, 2]
        ];

        $response = $this->post('/tasks', ['task' => $requestData]);
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertRedirect('/tasks');
        $this->assertDatabaseHas('label_task', [
            'task_id' => 2,
            'label_id' => [1, 2]
        ]);
    }
}
