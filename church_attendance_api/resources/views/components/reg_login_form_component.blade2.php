<style>
#wrapper{
    background:white;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    padding:1em;
}
h4{
    text-align:center;
    margin:1em
}
   form span{
    display:block;
    padding-bottom:3px
   }
   #login{
            padding:2em;
        }
   @media (max-width:900px)  {
        #login{
            padding:3em;
        }
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div id="wrapper" class="{{ $spacing['outer-col-md'] }}">
            <h4>{{ $title }}</h4>
            
            <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
                @csrf
                @if (isset($FormFields))
               
                    @foreach ($FormFields as $fields)
                    
                        @foreach ($fields as $field)
                            <div class="row {{ $spacing['mt'] }}">
                                <div class="{{ $spacing['inner-col-md'] }} {{ $spacing['inner-offset'] }}">
                                    <span>{{ $field['label'] }}</span>
                                    @switch($field['input_type'])
                                        @case('input')
                                            @component('components.form.input',
                                                [
                                                'field'=>$field
                                                ])
                                            @endcomponent
                                            @break
                                        @case('password')
                                            @component('components.form.password',
                                                [
                                                'field'=>$field
                                                ])
                                            @endcomponent
                                            @break
                                        @case('checkbox')
                                            @component('components.form.checkbox',
                                                [
                                                'field'=>$field
                                                ])
                                            @endcomponent
                                            @break
                                        @case('File')
                                            @component('components.form.file',
                                                [
                                                'field'=>$field
                                                ])
                                            @endcomponent
                                            @break
                                        @case('select')
                                            @component('components.form.select',
                                                ['options'=>$field['options']])

                                            @endcomponent
                                            
                                            @break
                                        @case('radio')
                                            @foreach($field['options'] as $option)
                                                <input type="{{ $field['type'] }}"
                                                    name="{{ $field['name'] }}"
                                                    value="{{ $option }}" 
                                                > {{ $option }}<br>
                                            @endforeach
                                            @break
                                    @endswitch
                                    @error($field['id'])
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                    <div class="row {{ $spacing['mt'] }} {{ $spacing['mb'] }}">
                        <div class="{{ $spacing['inner-col-md'] }} {{ $spacing['inner-offset'] }}">
                            <button type="submit" class="btn btn-primary">
                                {{ $label }}
                            </button>
                        </div>
                    </div>
                @else
                    <div class="row mt-4 mb-4">
                        <div class="col-md-6 offset-md-3 text-center">
                            Form Object is not set
                        </div>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
