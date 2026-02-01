<?php

namespace _34ML\FilamentTranslatableField\Tests\Fixtures\Http\Livewire;

use _34ML\FilamentTranslatableField\FilamentTranslatableField;
use _34ML\FilamentTranslatableField\Tests\Fixtures\Models\Post;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Illuminate\Contracts\View\View;
use Illuminate\Support\MessageBag;
use Livewire\Component;

class CreatePost extends Component implements HasForms
{
    use InteractsWithForms;

    public array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function getErrorBag()
    {
        $errorBag = parent::getErrorBag();
        return $errorBag ?: new MessageBag();
    }

    public function render(): View
    {
        return view('livewire.create-post');
    }

    public function submitForm(): void
    {
        $post = Post::create($this->form->getState());

        $this->form->model($post)->saveRelationships();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                ...FilamentTranslatableField::make(
                    'title',
                    TextInput::class,
                    'Product Title',
                ),
            ])
            ->statePath('data')
            ->model(Post::class);
    }
}
