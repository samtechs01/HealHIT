<div class="justify-self-start w-[70vw]">
    {{-- Only Assigns A Role To A User --}}
    <div class="pb-5 justify-self-center">
        <x-page-heading textA="HIT HUB" textB="Research Pool"/>
        <div class="grid justify-self-center">List Of The HIT HUB Product Proposal</div>
    </div>
    <div>
        <x-mary-tabs wire:model.live="selectedProposalSeq">
            <x-mary-tab name="allProposals">
                <x-slot:label>
                    Student Proposals
                </x-slot:label>
                <div>
                    <x-mary-table :headers="$studentHeaders" :rows="$studentsMap" separator/>
                </div>
            </x-mary-tab>

            <x-mary-tab name="unverifiedProposals">
                <x-slot:label>
                    Unverified Proposals
                </x-slot:label>
                <div>
                    <x-mary-table :headers="$proposalsHeaders" :rows="$unverifiedProposalsMap" separator>
                        @scope('cell_form',$proposal)
                        <a href="/{{$proposal['form']}}" target="_blank" class="text-blue-600">View</a> 
                        @endscope

                        @scope('cell_status',$proposal)
                        <x-mary-button label="Validate" class="bg-blue-600 text-white rounded-3xl" wire:click="validateProposal({{$proposal['id']}})"/>
                        @endscope
                    </x-mary-table>
                </div>
            </x-mary-tab>

            <x-mary-tab name="VerifiedProposals">
                <x-slot:label>
                    Verified Proposals
                </x-slot:label>
                <div>
                    <x-mary-table :headers="$proposalsHeaders" :rows="$verifiedProposalsMap" separator>
                        @scope('cell_form',$proposal)
                        <a href="/{{$proposal['form']}}" target="_blank" class="text-blue-600">View</a> 
                        @endscope
                    </x-mary-table>
                </div>
            </x-mary-tab>
        </x-mary-tabs>

    </div>
</div>
  