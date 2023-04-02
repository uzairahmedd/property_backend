<div class="form-group">
	<label for="{{ $id }}" class="d-flex">{{ $title }}</label>
	<input type="{{ $type }}" @if(!empty($step)) step="{{ $step }}"  @endif placeholder="{{ $placeholder }}" name="{{ $name }}" class="form-control" id="{{ $id }}" @if($required == true) required @endif value="{{ $value }}" autocomplete="off" minlength="{{ $min_input }}" maxlength="{{ $max_input }}">
</div>
