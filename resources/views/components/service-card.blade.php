@props(['title','img_src','type'])

<div class="relative grid">
    <div class="absolute bottom-44 left-2 top-8 z-30"> 
        <div class=" text-white bold text-1xl font-body">{{$title}}</div>
    </div>
    <div class=" rounded-[20px] z-20 relative 
    before:content-[url('')] before:absolute before:top-[15px] before:left-1 before:py-[20px] before:px-[150px] before:bg-blue-700 before:z-30
    before:rounded-tr-full before:rounded-br-full before:opacity-75 before:bg-blue">
        <img src="{{$img_src}}" alt="service-banner" 
        class="h-[300px] w-full overflow-cover shadow-lg rounded-[20px]  opacity-88 z-10">
    </div>
</div> 