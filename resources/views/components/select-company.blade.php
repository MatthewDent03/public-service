@props(['privateCompanies', 'field' => '','selected' => null])

<select {{ $attributes->merge(['class' => 'form-select']) }}>
    @foreach ($privateCompanies as $privateCompany)
        <option value="{{ $privateCompany->id }}" {{ $selected = $privateCompany->id ? 'selected' : '' }}>
            {{ $privateCompany->name }}
        </option>
    @endforeach
</select>

@error($field)
<div class="text-red-600 text-sm">{{ $message }}</div>
@enderror