@props(['title','img_src','type'])

<div class="relative grid">
    <div class="absolute bottom-44 left-2 top-8 z-30"> 
        <div class=" text-white bold text-1xl font-body">{{$title}}</div>
    </div>
    <div class="bg-black rounded-[20px] z-20 relative 
    before:content-[url('')] before:absolute before:top-[12px] before:left-0 before:py-[20px] before:px-[140px] before:bg-blue-700 before:z-30
    before:rounded-tr-full before:rounded-br-full before:opacity-75">
        <img src="{{$img_src}}" alt="service-banner" 
        class="h-[250px] w-full overflow-cover shadow-lg rounded-[20px]  opacity-88 z-10">
    </div>
</div> 