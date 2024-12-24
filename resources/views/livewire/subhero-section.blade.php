@props(['title'])
<div class="w-full justify-self-center">

    <div class="grid grid-flow-row h-[420px] w-full bg-no-repeat bg-cover bg-center bg-green-50" style="background-image: url('/site-imgs/card-gradient-bg.png');">
        <div class="grid grid-flow-row gap-0 text-6xl justify-self-center pt-28 w-full h-[20vw]">
            <div class="justify-self-center font-heroText">
                <span class="text-blue-800 uppercase">{{$title}}</span>
            </div>
        </div>
    </div>
</div>