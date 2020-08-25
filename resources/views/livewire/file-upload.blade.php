<div>
    @error('file')
    <div class="alert-danger">
        {{ $message }}
    </div>
    @enderror

    @if ($file)
        Photo Preview:
        <img src="{{ $file->temporaryUrl() }}">
    @endif

    <div
        x-data="{ isUploading: false, progress: 0 }"
        x-on:livewire-upload-start="isUploading = true"
        x-on:livewire-upload-finish="isUploading = false"
        x-on:livewire-upload-error="isUploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress"
    >

    <input type="file" wire:model="file"/>
    <button wire:click.prevent="save">Save</button>

        <!-- Progress Bar -->
        <div x-show="isUploading">
            <progress max="100" x-bind:value="progress"></progress>
        </div>
    </div>

    <div wire:loading wire:target="file">Uploading...</div>
    <div wire:loading wire:target="save">amaa...</div>

</div>
