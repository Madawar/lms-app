<div class="form-control">
    @if ($label)
        <label class="label">
            <span class="label-text">{{ $label }}</span>
        </label>
    @endif
    <input type="text" placeholder="{{ $placeholder }}" wire:model="{{ $name }}"
        class="input input-bordered @error($name) input-error  @enderror" {{ $attributes }}>
    @error($name)
        <label class="label">
            <span class="label-text-alt">{{ $message }}</span>
        </label>
    @enderror
</div>
