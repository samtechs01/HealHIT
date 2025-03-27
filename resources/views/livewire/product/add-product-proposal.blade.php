<div class="justify-self-start w-[70vw]">
    {{-- Only Assigns A Role To A User --}}
    <div class="pb-5 justify-self-center">
        <x-page-heading textA="Cast Product" textB="To HUB"/>
        <div>Use this form to add and submit your product proposal</div>
    </div>
    <div>
        <x-mary-tabs wire:model.live="selectedProposalSeq">
            <x-mary-tab name="proposalSubmission">
                <x-slot:label>
                    Proposal Submission
                </x-slot:label>
                <div> 
                    <x-mary-form wire:submit="submitProposal" class="w-[25vw] justify-self-center">
                        <x-mary-input label="Project Name"  wire:model="productName" type="text"
                        class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>
                        
                        <x-mary-file label="Attach Proposal Form" wire:model.live="proposalForm" accept="application/pdf" hint="attach only pdf"
                        class="border-none rounded-md text-zinc-400">
                        </x-mary-file>    
                        
                        <x-mary-select label="Select Assigned Supervisor" :options="$supervisorsMap" wire:model="selectedSupervisor" type="text"
                        class="bg-gray-50 border-none hover:border-blue-800 rounded-md text-zinc-400"/>
                        <div>
                            <x-heal-hit-button label="Submit For Approval" type="submit"/>
                        </div>
                    </x-mary-form>
                </div>
            </x-mary-tab>
            <x-mary-tab name="unverifiedProposals">
                <x-slot:label>
                    My Unverified Proposal
                </x-slot:label>
                <div>
                    <x-mary-table :headers="$headers" :rows="$unverifiedProposalsMap" separator>
                        @scope('cell_form',$proposal)
                        <a href="/{{$proposal['form']}}" target="_blank" class="text-blue-600">View</a> 
                        @endscope
                    </x-mary-table>
                </div>
            </x-mary-tab>
            <x-mary-tab name="VerifiedProposals">
                <x-slot:label>
                    My Verified Proposal
                </x-slot:label>
                <div>
                    <x-mary-table :headers="$verifiedProposalHeaders" :rows="$verifiedProposalsMap" separator>
                        @scope('cell_form',$proposal)
                            <a href="/{{$proposal['form']}}" target="_blank" class="text-blue-600">View</a> 
                        @endscope
                        @scope('cell_activation',$proposal)
                            @if($proposal['productCount'] === 0)
                                <x-mary-button label="Initiate" class="bg-blue-600 text-white rounded-3xl" wire:click="initiateProject({{$proposal['id']}})"/>
                            @else
                                <x-mary-button label="Initiated" class="bg-green-600 text-white rounded-3xl" wire:click="initiatedProjectAlert"/>
                            @endif
                        @endscope
                    </x-mary-table>
                </div>
            </x-mary-tab>
        </x-mary-tabs>

    </div>

    

</div>
  