<div>
    <form wire:submit.prevent="show">
        <textarea wire:model="domain" cols="30" rows="10">{{ old('domain') }}</textarea>
        @error('domain')
        <p>{{ $message }}</p>
        @enderror
        <button type="submit">Check</button>
    </form>
    @if($domains)
        <table>
            <tr>
                <th>Domain</th>
                <th>Expiration Date</th>
            </tr>
            @foreach($domains as $key => $item)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $item }}</td>
                </tr>
            @endforeach
        </table>
    @endif
</div>
