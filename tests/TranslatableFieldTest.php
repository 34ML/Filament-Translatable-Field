<?php

use _34ML\FilamentTranslatableField\Tests\Fixtures\Http\Livewire\CreatePost;
use _34ML\FilamentTranslatableField\Tests\Fixtures\Http\Livewire\EditPost;
use _34ML\FilamentTranslatableField\Tests\Fixtures\Models\Post;
use Illuminate\Support\Facades\Config;
use Livewire\Livewire;

test('can create post with adding en and ar translation', function () {
    $livewire = Livewire::test(CreatePost::class);

    $livewire
        ->set('data.title.en', 'Post title EN')
        ->set('data.title.ar', 'Post title AR')
        ->call('submitForm')
        ->assertHasNoErrors();

    $this->assertDatabaseHas(Post::class, [
        "title" => "{\"en\":\"Post title EN\",\"ar\":\"Post title AR\"}"
    ]);
});

test('can update post with adding en and ar translation', function () {
    $post = Post::create([
        'title' => 'Test post',
    ]);

    $livewire = Livewire::test(EditPost::class, [
        'post' => $post,
    ]);

    $livewire
        ->set('data.title.en', 'Post title EN')
        ->set('data.title.ar', 'Post title AR')
        ->call('submitForm')
        ->assertHasNoErrors();

    $this->assertDatabaseHas(Post::class, [
        "title" => "{\"en\":\"Post title EN\",\"ar\":\"Post title AR\"}"
    ]);
});

test('can update post with adding en only', function () {
    $post = Post::create([
        'title' => 'Test post',
    ]);

    $livewire = Livewire::test(EditPost::class, [
        'post' => $post,
    ]);

    $livewire
        ->set('data.title.en', 'Post title EN')
        ->call('submitForm')
        ->assertHasNoErrors();

    $this->assertDatabaseHas(Post::class, [
        "title" => "{\"en\":\"Post title EN\",\"ar\":null}"
    ]);
});

test('can update post with adding ar only', function () {
    $post = Post::create([
        'title' => 'Test post',
    ]);

    $livewire = Livewire::test(EditPost::class, [
        'post' => $post,
    ]);

    $livewire
        ->set('data.title.ar', 'Post title AR')
        ->call('submitForm')
        ->assertHasNoErrors();

    $this->assertDatabaseHas(Post::class, [
        "title" => "{\"ar\":\"Post title AR\"}"
    ]);
});
