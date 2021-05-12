<div class="form-control">
    @if($label)
    <label class="label">
        <span class="label-text">{{ $label }}</span>
    </label>
    @endif
    <select wire:model="{{ $name }}" class="select select-bordered  w-full @error($name) select-error @else select-primary  @enderror"
        name="{{ $name }}" {{ $attributes }}>
        @if ($value == '')
            <option disabled="disabled" value='' selected>{{ $placeholder}}</option>
        @else
            <option disabled="disabled" value='' >{{ $label }}</option>
        @endif
        @foreach ($options as $key => $option)
            <option {{ $isSelected($key) ? 'selected="selected"' : '' }} value="{{ $key }}">
                {{ $option }}</option>
        @endforeach
    </select>
    @error($name)
        <label class="label">
            <span class="label-text-alt">{{ $message }}</span>
        </label>
    @enderror
</div>
