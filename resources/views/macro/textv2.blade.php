<!-- call include('macro.text_edit', 0_label, 1_field, 2_value, 3_placeholder, 4_has_field, 5_has_field_value ) -->

<div class="form-group {{ $data[4] ? '' : (empty( old($data[1]) ) ? 'has-success' : 'has-error') }}">
	<label for="{{ $data[1] }}">{{ $data[0] }}</label>
	<input class="form-control input-sm"  value="{{ empty($data[5]) ? old($data[1]) : $data[2] }}" name="{{ $data[1] }}" placeholder="{{ $data[3] ?? '' }}" type="text" style="color: #000 !important;" >
	@if($data[4])
		<span class="help-block">{{ $data[5] }}</span>
	@endif
</div>
