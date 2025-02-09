<?php

namespace _34ML\FilamentTranslatableField\Tests\Fixtures\Http\Livewire;

use _34ML\FilamentTranslatableField\FilamentTranslatableField;
use _34ML\FilamentTranslatableField\Tests\Fixtures\Models\Post;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class CreatePost extends Component implements HasForms
{
    use InteractsWithForms;

    public array $data = [];

    public function mount(): void
    {
        $this->form->fill();
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

    protected function getFormSchema(): array
    {
        return [
            ...FilamentTranslatableField::make(
                'title',
                TextInput::class,
                'Product Title',
            ),
        ];
    }

    protected function getFormStatePath(): ?string
    {
        return 'data';
    }

    protected function getFormModel(): Model|string|null
    {
        return Post::class;
    }
}
