
<div class="space-y-4">

    <label>Single</label>
    <input id="singleFile" wire:model="file" type="file" />

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

    <div wire:ignore>
        <script>
            window.onload = () => {
                window.addEventListener('paste', e => {
                    let clipboardData = e.clipboardData

                    if (!clipboardData) {
                        return
                    }

                    if (clipboardData.files.length === 0) {
                        return
                    }

                    @this.upload('file', clipboardData.files[0])
                });
            }
        </script>
    </div>
</div>
