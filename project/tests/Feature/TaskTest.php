<?php

namespace Tests\Feature;

use App\Task;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_will_show_all_tasks()
    {
        $tasks = factory(Task::class, 10)->create();

        $response = $this->get(route('tasks.index'));

        $response->assertStatus(200);
        $response->assertJson($tasks->toArray());
    }

    /** @test */
    public function it_will_create_tasks()
    {
        $data = [
            'title'       => 'This is a title',
            'description' => 'This is a description'
        ];

        $response = $this->post(route('tasks.store'), $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('tasks', [
            'title' => 'This is a title'
        ]);

        $response->assertJsonStructure([
            'title',
            'description',
            'updated_at',
            'created_at',
            'id'
        ]);
    }

    /** @test */
    public function it_will_show_a_task()
    {
        $this->post(route('tasks.store'), [
            'title'       => 'This is a title',
            'description' => 'This is a description'
        ]);

        $task = Task::all()->first();

        $response = $this->get(route('tasks.show', $task->id));

        $response->assertStatus(200);

        $response->assertJson($task->toArray());
    }

    /** @test */
    public function it_will_update_a_task()
    {
        $data = [
            'title'       => 'This is a title',
            'description' => 'This is a description'
        ];

        $this->post(route('tasks.store'), $data);

        $task = Task::all()->first();

        $response = $this->patch(route('tasks.update', $task->id), [
            'title' => 'This is the updated title'
        ]);

        $response->assertStatus(202);

        $task = $task->fresh();

        $this->assertEquals($task->title, 'This is the updated title');

        $response->assertJsonStructure([
            'title',
            'description',
            'updated_at',
            'created_at',
            'id'
        ]);
    }

    /** @test */
    public function it_will_delete_a_task()
    {
        $data = [
            'title'       => 'This is a title 1',
            'description' => 'This is a description 1'
        ];

        $this->post(route('tasks.store'), $data);

        $task = Task::all()->first();

        $response = $this->delete(route('tasks.destroy', $task->id));

        $task = Task::all()->first();

        $response->assertStatus(204);
        $this->assertNull($task);
    }
}
