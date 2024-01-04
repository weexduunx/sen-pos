<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use Exception;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    use WithFileUploads;
    public User $user;
    public $image, $name, $email, $password, $phone, $location, $about;
    public $showSuccesNotification  = false;


    protected $rules = [
        'name' => 'max:40|min:3',
        'email' => 'email:rfc,dns',
        'password' => 'max:8|min:4',
        'phone' => 'max:13|min:9',
        'about' => 'max:200',
        'image' => 'image|max:2048|mimes:jpeg,png,jpg,gif,svg',
        'location' => 'min:3'
    ];

    public function mount()
    {
        $this->user = auth()->user();
    }
    /////////////////////////////////// Les Alertes
    public function alertSuccess($successMessage = null)
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => $successMessage . ' ' . 'successfully!'
        ]);
    }

    protected function alertError($errorMessage = null)
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'error',
            'message' => $errorMessage ?? 'An error occurred.'
        ]);
    }

    public function alertInfo()
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'info',
            'message' => 'Going Well!'
        ]);
    }
    ////////////////////////////////////Fin des Alertes


    // public function save()
    // {

    //     $this->validate();
    //     // Stockage de l'image
    //     if ($this->image) {
    //         // Nom unique pour éviter les conflits
    //         $imageName = time() . '.' . $this->image->getClientOriginalExtension();

    //         // Stockage de l'image dans le répertoire 'public/profiles'
    //         $this->image->storeAs('public/profiles', $imageName);

    //         // Mettez à jour le chemin de l'image dans la base de données
    //         $this->user->image = 'profiles/' . $imageName;
    //     }

    //     $this->user->save();
    //     // $this->showSuccesNotification = true;
    //     dd('User saved successfully', $this->user);
    // }

    public function update()
    {
        try {
            if ($this->image instanceof UploadedFile) {
                $this->validate();
            }
            // Trouvez le produit par id
            $user = User::find($this->user->id);
            // Gérer la mise à jour de l'image
            if ($this->image instanceof UploadedFile) {
                // Supprimer l'image précédente
                // Storage::disk('public')->delete($user->image);

                // Stocker la nouvelle image
                $imagePath = $this->image->store('profiles', 'public');
            } else {
                $imagePath = $user->image;
            }


            // Mettre à jour les détails du profil
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => ($this->password) ? Hash::make($this->password) : $user->password,
                'image' => $imagePath,
                'phone' => $this->phone,
                'location' => $this->location,
                'about' => $this->about,
                'updated_at' => now(),

            ]);
            // $this->showSuccesNotification = true;

            $successMessage = 'Profil updated ';
            $this->alertSuccess($successMessage);
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            $this->alertError($errorMessage);
        }
    }
    public function render()
    {
        return view('livewire.profile');
    }
}
