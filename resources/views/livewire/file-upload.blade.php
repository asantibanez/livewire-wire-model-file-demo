
<div class="space-y-4">

    <label>Single</label>
    <input wire:model="file" type="file" />

    <label>Multiple</label>
    <input wire:model="files" type="file" multiple />

    <div>
        Files count: {{ $savedFiles->count() }}
    </div>

    <ul>
        @foreach($savedFiles as $savedFile)
            <li>
                {{ $savedFile }}
            </li>
        @endforeach
    </ul>
</div>
