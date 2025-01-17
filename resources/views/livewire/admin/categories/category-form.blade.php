<div class="flex-1 flex justify-center overflow-y-hidden">
  <div class="card w-full max-w-xl">
    <div class="card-header">
      <p>{{ $buttonText }} Category</p>
    </div>
    <div class="card-body">
      <form wire:submit.prevent="submit" class="flex-none flex flex-col justify-between">
        <div class="overflow-y-auto">
          <section>
            <div class="input-group">
              <label for="name">Name</label>
              <input wire:model="name" wire:input="nameAdded" type="text" id="name" maxlength="80">
              @error('name') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
          </section>

          <section>
            <div class="input-group">
              <label for="slug">Slug </label>
              <input wire:model="slug" id="slug" pattern="^[a-z0-9-]+$" type="text">
              @error('slug') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
          </section>
        </div>

        <div>
          @if ($errors->any())
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded m-2">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ $errors->first() }}</span>
          </div>
          @endif
          <button type="submit" class="">{{ $buttonText }}</button>
        </div>
      </form>
    </div>
  </div>
</div>