<div class="form-control">
    <label class="label">
        <span class="label-text">{{ $label }}</span>
    </label>
    <textarea class="textarea h-24 textarea textarea-bordered @error($name) input-error   @enderror"
        name="{{ $name }}" placeholder="{{ $placeholder }}">
    @if (isset($value))
        {{ $value }}
        @endif
    </textarea>
    @error($name)
        <label class="label">
            <span class="label-text-alt">{{ $message }}</span>
        </label>
    @enderror
</div>
