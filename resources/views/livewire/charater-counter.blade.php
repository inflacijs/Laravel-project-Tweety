<div>

    <textarea 
    wire:model="name"
    name="body" 
    class="w-full"
    placeholder="What's up doc?"
    required
    rows="4"
></textarea>

    {{-- <input wire:model="name" type="text"> --}}

    <div style="float:right;color:grey">
    You have left {{256 - count(str_split($name)) > 0 ? 256 - count(str_split($name)) : 0}} charaters!
    </div>
</div>

