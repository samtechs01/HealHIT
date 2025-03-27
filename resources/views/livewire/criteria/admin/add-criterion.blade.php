<div class="justify-self-start w-[70vw]">
    {{--For Criterion Management --}}
    <div class="pb-5 justify-self-center">
        <x-page-heading textA="Criteria" textB="Management"/>
        <div>Use this form to manage your product criteria</div>
    </div>
    <div>
        <x-mary-tabs wire:model.live="selectedTab">
            <x-mary-tab name="addCriteria">
                <x-slot:label>
                    Add New Criteria 
                </x-slot:label>
                <div> 
                    <x-mary-form wire:submit="submitCriteria" class="w-[25vw] justify-self-center">
                        <x-mary-input label="Criterion No."  wire:model="criterionNumber" type="text"
                        class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>
                        
                        <x-mary-input label="Criterion Description"  wire:model="criterionDescription" type="text"
                        class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>
                        
                        <div>
                            <x-heal-hit-button label="Add Criterion" type="submit"/>
                        </div>
                    </x-mary-form>
                </div>
            </x-mary-tab>
            <x-mary-tab name="viewCriteria">
                <x-slot:label>
                    View Criteria
                </x-slot:label>
                <div>
                    @if(count($criteriaMap)!==0)
                        <x-mary-table :headers="$headers" :rows="$criteriaMap" separator>
                        </x-mary-table>
                    @else
                    <x-mary-table :headers="$headers" :rows="$criteriaMap" separator/>
                    <div>No Criterias Added</div>
                    @endif
                </div>
            </x-mary-tab>
        </x-mary-tabs>

    </div>

    

</div>
  