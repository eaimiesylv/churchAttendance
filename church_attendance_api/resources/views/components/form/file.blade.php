<input
	id="{{ $field['id']}}" 
    type="file"
    class="{{ $field['attributes']['class'] }} @error($field['name']) is-invalid @enderror" 
    name="{{ $field['name'] }}" 
   value="{{ $field['value'] }}" {{ $field['attributes']['required'] }}
 >