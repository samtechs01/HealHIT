<div class="justify-self-start w-[70vw]">
    {{-- Only Assigns A Role To A User --}}
    <div class="pb-5 justify-self-center">
        <x-page-heading textA="HIT HUB" textB="Research Projects"/>
        <div class="grid justify-self-center">List Of The HIT HUB Projects In Progress</div>
    </div>
    <div>
        <x-mary-tabs wire:model.live="stagedProjects">
            <x-mary-tab name="incompleteProjects">
                <x-slot:label>
                    Projects In-progress
                </x-slot:label>
                <div>
                    <x-mary-table :headers="$stagedProductHeaders" :rows="$draftProductsMap" separator>
                        @scope('cell_product_src',$product)
                        <img src="/{{$product->product_src}}" alt="featured img" class="w-12 h-12 rounded-3xl">
                        @endscope
                        @scope('cell_custodian',$product)
                        <div>{{$product->productProposal->student->name}}</div> 
                        @endscope
                        @scope('cell_status',$product)
                        <div class="text-blue-600 bg-none">{{$product->to_market}}</div>
                        @endscope
                    </x-mary-table>
                </div>
            </x-mary-tab>

            <x-mary-tab name="unvalidatedProjects">
                <x-slot:label>
                    Completed Projects
                </x-slot:label>
                <div>
                    <x-mary-table :headers="$stagedProductHeaders" :rows="$completedProductsMap" separator>
                        @scope('cell_product_src',$product)
                        <img src="/{{$product->product_src}}" alt="featured img" class="w-12 h-12 rounded-3xl" link="project-blog/{{$product->id}}"/>
                        @endscope
                        @scope('cell_custodian',$product)
                        <div>{{$product->productProposal->student->name}}</div> 
                        @endscope
                        @scope('cell_status',$product)
                        <div class="text-blue-600 bg-none">{{$product->to_market}}</div>
                        @endscope
                        @scope('cell_action',$product)
                        <x-mary-button label="Publish" class="bg-blue-600 text-white rounded-3xl" wire:click="publishProduct({{$product->id}})"/>
                        @endscope
                    </x-mary-table>
                </div>
            </x-mary-tab>

            <x-mary-tab name="validatedProjects">
                {{--Admin validates completed Product and the student signs of for the market--}}
                <x-slot:label>
                    Products For Market
                </x-slot:label>
                <div>
                    <x-mary-table :headers="$stagedProductHeaders" :rows="$validatedProductsMap" separator>
                        @scope('cell_product_src',$product)
                        <a href="/dashboard/product/project-blog/{{$product->id}}" class="cursor-pointer">
                            <img src="/{{$product->product_src}}" alt="featured img" class="w-12 h-12 rounded-3xl"/>
                        </a>
                        @endscope
                        @scope('cell_custodian',$product)
                        <div>{{$product->productProposal->student->name}}</div> 
                        @endscope
                        @scope('cell_status',$product)
                        <div class="text-blue-600 bg-none">{{$product->to_market}}</div>
                        @endscope
                    </x-mary-table>
                </div>
            </x-mary-tab>
        </x-mary-tabs>

    </div>
</div>
  