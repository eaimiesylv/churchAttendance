@if(isset($options))
	<select  class="form-control">

			@foreach($options as $option)
			   <option>{{$option}}</option>
			@endforeach

	 </select>
 @endif
                                        
                                       