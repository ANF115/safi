[LocalStorage](https://laravel.com/docs/9.x/filesystem#the-public-disk)
```
php artisan storage:link
```
```
'links' => [
    public_path('storage') => storage_path('app/public'),
    public_path('images') => storage_path('app/images'),
],
```
```
use Illuminate\Support\Facades\Storage;
```
```
Storage::disk('local')->put('example.txt', 'Contents');
```

[Componente](https://laravel-livewire.com/docs/2.x/file-uploads)
```
use Livewire\WithFileUploads;
```
```
class UploadPhoto extends Component
{
    use WithFileUploads;
 
    public $photo;
 
    public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
 
        $this->photo->store('photos');
    }
}
```
```
<form wire:submit.prevent="save">
    <input type="file" wire:model="photo">
 
    @error('photo') <span class="error">{{ $message }}</span> @enderror
 
    <button type="submit">Save Photo</button>
</form>
```
 

