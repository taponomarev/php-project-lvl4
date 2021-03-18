<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LabelControllerTest extends TestCase
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
        /** @phpstan-ignore-next-line */
        $this->actingAs($user);
    }

    public function testIndex(): void
    {
        $response = $this->get('/labels');

        $response->assertOk();
        $response->assertSee('Метки');
    }

    public function testCreate(): void
    {
        $response = $this->get('/labels/create');

        $response->assertOk();
        $response->assertSee('Создать метку');
        $response->assertSeeInOrder([
            'Имя',
            'Описание',
            'Создать'
        ]);
    }

    public function testEdit(): void
    {
        $response = $this->get('/labels/1/edit');

        $response->assertOk();
        $response->assertSee('Изменить метку');
        $response->assertSeeInOrder([
            'Имя',
            'Описание',
            'Обновить'
        ]);
    }

    public function testStore(): void
    {
        $requestData = [
            'name' => 'Тестовая метка',
            'description' => 'Описание метки',
        ];

        $response = $this->post('/labels', $requestData);
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertRedirect('/labels');
        $this->assertDatabaseHas('labels', $requestData);
    }

    public function testUpdate(): void
    {
        $requestData = [
            'name' => 'Тестовая метка (обновленная)',
        ];

        $response = $this->patch('/labels/1', $requestData);
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertRedirect('/labels');
        $this->assertDatabaseHas('labels', [
            'id' => 1,
            'name' => 'Тестовая метка (обновленная)',
        ]);
    }

    public function testDestroy(): void
    {
        $response = $this->delete('/labels/1');
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('flash_notification.0.level', 'success');
        $response->assertRedirect('/labels');
        $this->assertDatabaseMissing('labels', [
            'id' => 1
        ]);
    }
}
