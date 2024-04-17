<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Services\EventService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventServiceTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected EventService $eventService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->eventService = new EventService();
    }

    /** @test */
    public function it_can_list_events()
    {
        Event::factory()->count(5)->create();
        $events = $this->eventService->list();
        $this->assertCount(5, $events);
    }

    /** @test */
    public function it_can_store_an_event()
    {
        $data = [
            'name' => $this->faker->name(),
            'date' => $this->faker->date(),
            'description' => $this->faker->text(23),
            'race_coordinator' => 1,
            'circuit_id' => 1,
        ];

        $event = $this->eventService->store($data);

        $this->assertInstanceOf(Event::class, $event);
        $this->assertDatabaseHas('events', $data);
    }

    /** @test */
    public function it_can_find_an_event_by_id()
    {
        $event = Event::factory()->create();
        $foundEvent = $this->eventService->find($event->uuid);
        $this->assertEquals($event->id, $foundEvent->id);
    }

    /** @test */
    public function it_can_update_an_event()
    {
        $event = Event::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'date' => $this->faker->date(),
            'description' => $this->faker->text(23),
            'race_coordinator' => 1,
            'circuit_id' => 1,
        ];

        $this->eventService->update($event->id, $data);
        $this->assertDatabaseHas('events', $data);
    }

    /** @test */
    public function it_can_destroy_an_event()
    {
        $event = Event::factory()->create();
        $this->eventService->destroy($event->id);
        $this->assertDatabaseMissing('events', ['id' => $event->id]);
    }
}
