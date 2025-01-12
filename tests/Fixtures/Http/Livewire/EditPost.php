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

class EditPost extends Component implements HasForms
{
    use InteractsWithForms;

    public array $data = [];

    public Post $post;

    public function mount(): void
    {
        $this->form->fill([
            'title' => $this->post['title'],
        ]);
    }

    public function render(): View
    {
        return view('livewire.edit-post');
    }

    public function submitForm()
    {
        $this->post->update(
            $this->form->getState(),
        );
    }

    protected function getFormModel(): Model|string|null
    {
        return $this->post;
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
}
