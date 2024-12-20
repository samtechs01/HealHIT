@props(['label','type'=>null, 'clickFunc'=>null])
<div>
    @if($type!==null)
        <x-mary-button label="{{$label}}" responsive type="{{$type}}"
        class="border-solid border-[3px]  border-blue-800  text-blue-800 rounded-2xl px-[20px] py-0 btn-ghost shadow-md hover:shadow-green-700 hover:border-solid hover:border-[3px] hover:border-blue-800  hover:text-blue-800 hover:bg-green-100"/>    
    @else
        <x-mary-button label="{{$label}}" responsive
        class="border-solid border-[3px]  border-blue-800  text-blue-800 rounded-2xl px-[20px] py-0 btn-ghost shadow-md hover:shadow-green-700 hover:border-solid hover:border-[3px] hover:border-blue-800  hover:text-blue-800 hover:bg-green-100"/>    
    @endif

</div>